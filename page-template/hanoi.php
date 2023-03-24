<?php
/**
 * Template name: Hanoi Page
 * @author : Hy Hý
 */
get_header();
while (have_posts()):
    the_post();
    $vi = get_field('mona_city_video');
    ?>
    <?php get_template_part('patch/breadcrumb') ?>
    <!--container-->
    <div id="container">
        <!--wrap-->
        <div class="wrap">
            <h3><?php the_field('mona_city_title_1') ?></h3>
            <!--fair_info-->
            <div class="fair_info st02 ty_t">
                <?php the_field('mona_city_info_1') ?>
            </div>
            <!--//fair_info-->

            <h3 id="char" class=""><?php the_field('mona_city_title_2') ?><span class="t_sc01_02"></span></h3>

            <!--fair_info-->
            <div class="fair_info st02 ty_t">
                <?php the_field('mona_city_info_2') ?>
            </div>
            <!--//fair_info-->

            <h3 id="char" class=""><?php the_field('mona_city_title_3') ?><span class="t_sc01_02"></span></h3>
            <!--ph_gallery-->

            <div class="gallery__wrap">
                <div class="pu_bg"></div>
                <div class="video__gallery">
                    <div class="gallery-video">
                        <?php
                        if (is_array($vi)) {
						
                            $avideo = $vi[0]['url'];
						echo str_replace('<iframe', '<iframe id="iframe-youtube"', wp_oembed_get($vi[0]['url']));
                           
                        }
                        ?>
                        <!-- Add Arrows -->
                    </div>
                    <div class="swiper-container gallery-video-thumbs">
                        <div class="swiper-wrapper">
                            <?php
                            if (is_array($vi)) {
                                foreach ($vi as $item) {
                                    ?>
                                    <div class="swiper-slide" data-src="<?php echo $item['url'] ?>"><span class="title"><?php echo $item['title'] ?></span></div>             
                                    <?php
                                }
                            }
                            ?>     
                        </div>
                        <div class="swiper-button-next swiper-button-white"></div>
                        <div class="swiper-button-prev swiper-button-white"></div>
                    </div>
                </div>
                <ul class="ph_gallery" id="gallery-lightbox">
                    <?php
                    $gal = get_field('mona_city_gallery');
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
            </div>

            <!--//ph_gallery-->

        </div>
        <!--//wrap-->
    </div>
    <!--//container-->

    <?php
endwhile;
get_footer();
?>

