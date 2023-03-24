<?php
/**
 * Template name: Event Page
 * @author : Hy Hý
 */
get_header();
while (have_posts()):
    the_post();
$postid = get_the_ID();
    ?>
<?php get_template_part('patch/breadcrumb2') ?>
    <!--container-->
    <div id="container">
        <!--wrap-->
        <div class="wrap">
            <h3><?php the_title() ?></h3>
            <div class="events__list">
                <h4><?php _e('Hồ Chí Minh : ','monamedia');?></h4>
                <div class="blog-list row">
                     <?php $args = array(
                                    'post_type' => 'event',
                                    'posts_per_page' => 6,
                                    'paged' => get_query_var('paged'),
                                    'tax_query' => array(
                                        'relation' => 'AND',
                                        array(
                                            'taxonomy' => 'event-address',
                                            'field' => 'id',
                                            'terms' => 33,
                                        )
                                    )
                                );
                                $my_query = new WP_Query($args);
                            while ($my_query->have_posts()) {
                                $my_query->the_post();
                                ?>

                        <div class="blog-item col-sm-6 col-lg-4">
                            <div class="blog">
                                <a href="<?php the_permalink() ?>">
                                    <div class="blog-image">
                                        <?php the_post_thumbnail() ?>
                                        <div class="img-caption">
                                            <div class="box-holder"></div>
                                        </div>
                                    </div>
                                </a>
                                <div class="blog-content">
                                    <h2 class="title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
                                    <div class="summary">
                                        <p class="line-clamp"><?php echo get_the_excerpt() ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>  
                        <?php
                    }
                    wp_reset_query();
                    ?>
                </div>
                <?php mona_page_navi($my_query) ?>
            </div>
            <div class="events__list">
                <h4><?php _e('Hà Nội : ','monamedia');?></h4>
                <div class="blog-list row">
                     <?php $args = array(
                                    'post_type' => 'event',
                                    'posts_per_page' => 6,
                                    'paged' => max(1, @$_GET['phantrang']),
                                    'tax_query' => array(
                                        'relation' => 'AND',
                                        array(
                                            'taxonomy' => 'event-address',
                                            'field' => 'id',
                                            'terms' => 34,
                                        )
                                    )
                                );
                                $my_query = new WP_Query($args);
                            while ($my_query->have_posts()) {
                                $my_query->the_post();
                                ?>

                        <div class="blog-item col-sm-6 col-lg-4">
                            <div class="blog">
                                <a href="<?php the_permalink() ?>">
                                    <div class="blog-image">
                                        <?php the_post_thumbnail() ?>
                                        <div class="img-caption">
                                            <div class="box-holder"></div>
                                        </div>
                                    </div>
                                </a>
                                <div class="blog-content">
                                    <h2 class="title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
                                    <div class="summary">
                                        <p class="line-clamp"><?php echo get_the_excerpt() ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>  
                        <?php
                    }
                    wp_reset_query();
                    ?>
                </div>
                <?php mona_page_navi_custom($my_query) ?>
            </div>
        </div>
        <!--//wrap-->
    </div>
    <!--//container-->

    <?php
endwhile;
get_footer();
?>

