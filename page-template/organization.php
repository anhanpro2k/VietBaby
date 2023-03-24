<?php
/**
 * Template name: Organization Page
 * @author : Hy Hý
 */
get_header();
while (have_posts()):
    the_post();
    ?>
    <?php get_template_part('patch/breadcrumb') ?>
    <!--container-->
    <div id="container">
        <!--wrap-->
        <div class="wrap">
            <div class="orga__wrap">
                <div class="orga__summary row">
                    <div class="orga__summary-text col-12 col-md-4 col-lg-3">
                        <h1 class="page-title"><?php the_title() ?></h1>
                        <div class="summary">
                            <p><?php the_content(); ?></p></div>
                        <a href="<?php the_field('mona_organ_url') ?>" class="btn btn-primary"><?php the_field('mona_organ_button') ?></a>
                    </div>
                    <div class="orga__summary-logo col-12 col-md-8 col-lg-9">
                        <div class="row">
                            <?php
                            $org = get_field('mona_organ');
                            if (is_array($org)) {
                                foreach ($org as $item) {
                                    ?>
                                    <div class="col-12 col-sm-6 orga__box-container" ontouchstart="this.classList.toggle('hover');">
                                        <div class="orga__box" >
                                            <div class="company__logo front">
                                                <div class="overlay-logo"></div>
                                                <?php
                                                $image = $item['img'];
                                                $size = 'full';
                                                echo wp_get_attachment_image($image, $size);
                                                ?>
                                            </div>
                                            <div class="company__info back">
                                                <img src="<?php
                                                echo wp_get_attachment_image_url($image, $size);
                                                ?>" class="logo-overlay" alt="logo">
                                                <div class="company__info-summary">
                                                    <?php echo $item['info'] ?> 
                                                </div>
                                                <div class="company__info-link">
                                                    <a href="<?php echo $item['url'] ?> " class="btn btn-primary icon-link"><span class="dashicons dashicons-paperclip"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>           
                                    <?php
                                }
                            }
                            ?>
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
            </div>
        </div>
        <!--//wrap-->
    </div>
    <!--//container-->

    <?php
endwhile;
get_footer();
?>

