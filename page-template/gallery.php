<?php
/**
 * Template name: Gallery Page
 * @author : Hy Hý
 */
get_header();
while (have_posts()):
    the_post();
    $gal = get_field('mona_gallery');
    ?>
<?php get_template_part('patch/breadcrumb2') ?>
    <!--container-->
    <div id="container">
        <!--wrap-->
        <div class="wrap">
            <h3><?php the_title() ?></h3>
            <div class="gallery__wrap">
                <div class="gallery-category">

                    <div class="categories_list">
                        <?php
                        $class = 'active';
                        if (is_array($gal)) {
                            foreach ($gal as $i => $item) {
                                ?>
                                <div class="cat-title <?php echo $class ?>" data-id="category-<?php echo $i + 1 ?>">
                                    <span><?php echo $item['title'] ?></span>
                                </div>          
                                <?php
                                $class = '';
                            }
                        }
                        ?>
                    </div>
                    <div class="image-list">
                        <?php
                         $class = 'open';
                        if (is_array($gal)) {
                            foreach ($gal as $i => $item) {
                                ?>
                                <div class="tab-panel <?php echo $class ?>" id="category-<?php echo $i + 1 ?>">
                                    <div class="description">
                                        <p><?php echo $item['subtitle'] ?></p>
                                    </div>
                                    <div class="list-images row ">
                                        <?php
                                        $ga = $item['gallery'];
                                        if (is_array($ga)) {
                                            foreach ($ga as $item) {
                                                ?>
                                                <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 image"
                                                     data-src="<?php echo wp_get_attachment_image_url($item['ID'], 'full'); ?>">
                                                <?php echo wp_get_attachment_image($item['ID'], 'full'); ?>
                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>         
                                <?php
                                $class = '';
                            } 
                        }
                        ?>
                    </div>
                </div>
            </div>

        </div>
        <!--//wrap-->
    </div>
    <!--//container-->

    <?php
endwhile;
get_footer();
?>

