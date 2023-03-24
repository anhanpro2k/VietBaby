<?php
/**
 * Template name: Summary Page
 * @author : Hy Hý
 */
get_header();
while (have_posts()):
    the_post();
    $sum = get_field('mona_summary');
    ?>
    <?php get_template_part('patch/breadcrumb') ?>

    <!--container-->
    <div id="container">

        <div class="wrap">
            <h3><?php the_title() ?></h3>
            <!--last_eh-->
            <div class="gallery__wrap">
                <div class="gallery-category">

                    <div class="categories_list">
                        <?php
                        $class = 'active';
                        if (is_array($sum)) {
                            foreach ($sum as $i => $item) {
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
                        if (is_array($sum)) {
                            foreach ($sum as $i => $item) {
                                ?>
                                <div class="tab-panel <?php echo $class ?>" id="category-<?php echo $i + 1 ?>">
                                    <div class="last_eh">
                                        <?php echo $item['content']; ?>

                                        <!--num_info-->
                                        <div class="num_info">
                                            <div class="line"></div>
                                            <?php echo $item['content_2']; ?>
                                        </div>
                                        <!--//num_info-->

                                        <!--popup-gallery-->
                                        <ul class="ph_gallery" id="gallery-lightbox">
                                            <?php
                                            $gal = $item['gal'];
                                            if (is_array($gal)) {
                                                foreach ($gal as $item) {
                                                    ?>
                                                    <li data-src="<?php echo wp_get_attachment_image_url($item['ID'], 'full'); ?>">
                                                        <div class="box" >
                                                            <?php echo wp_get_attachment_image($item['ID'], '340x226'); ?>
                                                        </div>

                                                    </li>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </ul>
                                        <!--//popup-gallery-->
										<div class="i_con">
										<?php //echo $item['content_3']; ?>
										</div>
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

