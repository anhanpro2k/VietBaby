<?php
/**
 * Template name: Partner Media Page
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
            <div class="orga__wrap">
                <div class="orga__summary row">
                    <div class="orga__summary-text col-12">
                        <div class="summary">
                            <p><?php the_field('mona_partner_title'); ?></p></div>
                    </div>
                    <div class="orga__summary-logo col-12 ">
                        <div class="row">
                            <?php
                            $par = get_field('mona_partner');
                            if (is_array($par)) {
                                foreach ($par as $item) {
                                    ?>
                                    <div class="col-12 col-sm-6 col-lg-4 partner-container">
                                        <div class="partner__box" >
                                            <a href="<?php echo $item['url'] ?>">
                                                <div class="box-icon">
                                                    <span class="icon"><?php
                                                        $image = $item['img'];
                                                        $size = 'full';
                                                        echo wp_get_attachment_image($image, $size);
                                                        ?>
                                                    </span>
                                                    <p class="name"><?php echo $item['title'] ?></p>
                                                </div>
                                                <div class="box-summary">
                                                    <p><?php echo $item['info'] ?></p></div>
                                            </a>
                                        </div>
                                    </div>           
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php get_template_part('patch/banner', 'ads') ?>
            <div class="brochure__wrap">
                <div class="brochure">
                    <h3 class="big-title"><?php _e('Liên hệ hợp tác','monamedia');?></h3>
                    <div class="contact__form">
                        <div class="row">
                            <div class="col-md-5">
                                <?php the_content() ?>
                            </div>
                            <div class="col-md-7">
                                <?php
                                $short = get_field('mona_cf7');
                                if ($short != '') {
                                    echo do_shortcode($short);
                                }
                                ?>
                            </div>
                        </div>
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

