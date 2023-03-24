<?php
/**
 * Template name: Exhibitor Page
 * @author : Hy Hý
 */
get_header();
while (have_posts()):
    the_post();
    ?>
<?php get_template_part('patch/breadcrumb2') ?>
    <!--container-->
    <div id="container">
        <!--wrap-->
        <div class="wrap">
            <h3><?php the_title() ?></h3>
            <div class="exhibitor__wrap">
                <div class="search__container">
                    <form method="get" action="">
                        <div class="filter-form">
                            <div class="row">
                                <div class="col-sm-6 col-lg-3">
                                    <select class="custom-select" name="ex-category" id="ex-category" class="f-control select2">
                                        <option value=""><?php _e('Ngành', 'monamedia'); ?></option>
                                        <?php
                                        $cates = get_terms(array('taxonomy' => 'exhibition_category', 'parent' => 0,));
                                        if ($cates) {
                                            foreach ($cates as $cat) {
                                                echo '<option ' . selected(@$_GET['ex-category'], $cat->slug, false) . ' value="' . $cat->slug . '">' . $cat->name . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>

                                </div>
                                <div class="col-sm-6 col-lg-3">
                                    <select class="custom-select" name="ex-area" id="ex-area" class="f-control select2">
                                        <option value=""><?php _e('Danh mục triển lãm', 'monamedia'); ?></option>
                                        <?php
                                        if (@$_GET['ex-area'] != '') {
                                            $term = get_term_by('slug', $_GET['ex-area'], 'exhibition_category');
                                            if ($term->parent != 0 && $term->parent != '') {
                                                $child = get_term_children($term->parent, 'exhibition_category');
                                                if (count($child) > 0) {
                                                    foreach ($child as $itm) {
                                                        $itm = get_term($itm, 'exhibition_category');
                                                        $select = '';
                                                        if ($itm->slug == $_GET['ex-area']) {
                                                            $select = 'selected';
                                                        }
                                                        echo '<option ' . $select . ' value="' . $itm->slug . '">' . $itm->name . '</option>';
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </select>

                                </div>
                                <div class="col-sm-6 col-lg-3">
                                    <select class="custom-select" name="ex-year" id="ex-year" class="f-control select2">
                                        <option value=""><?php _e('Năm', 'monamedia'); ?></option>
                                        <?php
                                        $cates = get_terms(array('taxonomy' => 'exhibition_year'));
                                        if ($cates) {
                                            foreach ($cates as $cat) {
                                                echo '<option ' . selected(@$_GET['ex-year'], $cat->slug, false) . ' value="' . $cat->slug . '">' . $cat->name . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-6 col-lg-3">
                                    <select class="custom-select" name="ex-nation" id="ex-nation" class="f-control select2">
                                        <option value=""><?php _e('Quốc gia', 'monamedia'); ?></option>
                                        <?php
                                        $cates = get_terms(array('taxonomy' => 'exhibition_nation'));
                                        if ($cates) {
                                            foreach ($cates as $cat) {
                                                echo '<option ' . selected(@$_GET['ex-nation'], $cat->slug, false) . ' value="' . $cat->slug . '">' . $cat->name . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>

                                </div>
								
								<div class="col-sm-6 col-lg-3">
                                    <select class="custom-select" name="ex-district" id="ex-district" class="f-control select2">
                                        <option value=""><?php _e('Địa điểm tổ chức', 'monamedia'); ?></option>
                                        <?php
                                        $cates = get_terms(array('taxonomy' => 'exhibition_district'));
                                        if ($cates) {
                                            foreach ($cates as $cat) {
                                                echo '<option ' . selected(@$_GET['ex-district'], $cat->slug, false) . ' value="' . $cat->slug . '">' . $cat->name . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>

                                </div>
                                <div class="col-12">
                                    <div class="search-control">
                                        <div class="f-group">
                                            <input type="text" name="key-title" value="<?php echo @$_GET['key-title']; ?>" class="f-control" placeholder="<?php _e('Tìm kiếm đơn vị...', 'monamedia'); ?>">

                                        </div>
                                        <button type="submit" class="search-btn mona-fix-search"><span class="dashicons dashicons-search"></span></button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="filter-letter">
                            <?php
                            $sql = "SELECT DISTINCT (`mona_prex_postmeta`.`meta_value`) FROM `mona_prex_postmeta` INNER JOIN `mona_prex_posts` ON `mona_prex_posts`.`ID` = `mona_prex_postmeta`.`post_id` WHERE `meta_key` = 'mona_single_exhibition_key' AND `meta_value` <> '' AND `mona_prex_posts`.`post_status`='publish' AND `mona_prex_posts`.`post_type` ='mona_exhibition' ORDER BY `meta_value` ASC";
                            global $wpdb;
                            $get = $wpdb->get_results($sql, ARRAY_A);
                            foreach ($get as $item) {
                                $class = '';
                                if (@$_GET['key-filter'] == $item['meta_value']) {
                                    $class = 'active';
                                }
                                echo '<li class="' . $class . '"><a href="' . get_the_permalink() . '?key-filter=' . $item['meta_value'] . '" class="letter-key">' . $item['meta_value'] . '</a></li>';
                            }
                            ?>
                        </div>
                    </form>
                </div>
                <?php
                $page = max(1, get_query_var('paged'));
                $ofset = ($page - 1) * 21;
                $args = array(
                    'post_type' => 'mona_exhibition',
                    'paged' => $page,
                    'offset' => $ofset,
                    'meta_key' => 'mona_single_exhibition_key',
                    'orderby' => 'meta_value',
                    'order' => 'ASC',
                    'posts_per_page' => 21,
                    'tax_query' => array(
                        'relation' => 'AND',
                    ),
                    'meta_query' => array(
                        'relation' => 'AND',
                    )
                );
                if (@$_GET['key-filter'] && @$_GET['key-filter'] != '') {
                    $args['meta_query'][] = array(
                        'key' => 'mona_single_exhibition_key',
                        'value' => $_GET['key-filter'],
                        'compare' => '='
                    );
                }
                if (@$_GET['key-title'] && @$_GET['key-title'] != '') {
                    $args['s'] = $_GET['key-title'];
                    //  $args['exact'] = true;
                }
                if (@$_GET['ex-category'] && @$_GET['ex-category'] != '') {
                    $args['tax_query'][] = array(
                        'taxonomy' => 'exhibition_category',
                        'field' => 'slug',
                        'terms' => array($_GET['ex-category']),
                        'include_children' => false,
                        'operator' => 'IN'
                    );
                }
                if (@$_GET['ex-area'] && @$_GET['ex-area'] != '') {
                    $args['tax_query'][] = array(
                        'taxonomy' => 'exhibition_category',
                        'field' => 'slug',
                        'terms' => array($_GET['ex-area']),
                        'include_children' => false,
                        'operator' => 'IN'
                    );
                }
                if (@$_GET['ex-year'] && @$_GET['ex-year'] != '') {
                    $args['tax_query'][] = array(
                        'taxonomy' => 'exhibition_year',
                        'field' => 'slug',
                        'terms' => array($_GET['ex-year']),
                        'include_children' => false,
                        'operator' => 'IN'
                    );
                }
                if (@$_GET['ex-nation'] && @$_GET['ex-nation'] != '') {
                    $args['tax_query'][] = array(
                        'taxonomy' => 'exhibition_nation',
                        'field' => 'slug',
                        'terms' => array($_GET['ex-nation']),
                        'include_children' => false,
                        'operator' => 'IN'
                    );
                }
				if (@$_GET['ex-district'] && @$_GET['ex-district'] != '') {
                    $args['tax_query'][] = array(
                        'taxonomy' => 'exhibition_district',
                        'field' => 'slug',
                        'terms' => array($_GET['ex-district']),
                        'include_children' => false,
                        'operator' => 'IN'
                    );
                }
                $my_query = new WP_Query($args);
                ?>
                <div class="exhibitor__list">
                    <?php
                    if (!$my_query->have_posts()) {
                        echo '<p class="none-post">'._e('Không có tin phù hợp với tìm kiếm', 'monamedia').'</p>';
                    } else {
                        $output = [];
                        while ($my_query->have_posts()) {
                            $my_query->the_post();
                            $key = trim(get_field('mona_single_exhibition_key'));
                            if (!isset($output[$key])) {
                                $output[$key] = [];
                            }
                            $output[$key][] = '<div class="col-md-6 col-lg-4">
                                        <div class="exhibitor-item">
                                            <div class="ex-head">
                                                <div class="ex-img">
                                                  ' . get_the_post_thumbnail(get_the_ID(), 'full') . '
                                                </div>
                                                <div class="ex-booth">
                                                   ' . get_field('mona_single_exhibition_name') . '
                                                </div>
                                            </div>
                                            <div class="ex-body">
                                                <p class="title">' . get_the_title() . '</p>
                                                <p class="content">' . get_the_excerpt() . '</p>
                                            </div>
                                            <a href="' . get_the_permalink() . '" class="link"></a>
                                        </div>
                                    </div>';
                        }
                        wp_reset_query();
                        ksort($output);
                        foreach ($output as $k => $item) {
                            ?>
                            <div class="exhibitor-box">
                                <h2 class="letter-title"><span><?php echo $k; ?></span></h2>
                                <div class="row">
                                    <?php echo implode('', $item); ?>
                                </div>
                            </div>
                        <?php }
                    }
                    ?>
                </div>
            <?php mona_page_navi($my_query) ?>
            </div>
    <?php get_template_part('patch/banner', 'ads') ?>

        </div>
        <!--//wrap-->
    </div>
    <!--//container-->

    <?php
endwhile;
get_footer();
$input = [];
$cates = get_terms(array('taxonomy' => 'exhibition_category', 'parent' => 0,));
foreach ($cates as $item) {
    $child = get_term_children($item->term_id, 'exhibition_category');
    if (!isset($input[$item->slug])) {
        $input[$item->slug] = array();
    }
    $input[$item->slug][] = ['slug' => '', 'name' => __('Chọn Danh mục triển lãm', 'monamedia')];
    if (count($child) > 0) {
        foreach ($child as $itm) {
            $itm = get_term($itm, 'exhibition_category');
            $input[$item->slug][] = ['slug' => $itm->slug, 'name' => $itm->name];
        }
    }
}
?>
<script>
    jQuery(document).ready(function ($) {
        var $lists = $.parseJSON('<?php echo json_encode($input); ?>');

        $('#ex-category').on('change', function () {
            var $id = $(this).find(':selected').val();
            if ($lists[$id].length) {
                var $html = '';
                $.each($lists[$id], function (i, e) {
                    $html += '<option value="' + e.slug + '">' + e.name + '</option>';
                });
                $('#ex-area').html($html);
            }

        });
    });
</script>
