<?php
/**
 * Template name: Contact Page
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
            <div class="brochure__wrap">
                <div class="row">
                    <div class="col-md-12">
                        <div class="brochure">
                            
                            <div class="contact__form">
                                <div class="row">
                                    <div class="col-md-5">
									<?php the_content() ?>
                                        <?php the_field('mona_contact') ?>
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
                    <div class="col-md-12">
                        <div class="brochure-download">
                            <h4><?php the_field('mona_contact_title') ?></h4>
                            <div class="download-box">
                                <a target="_blank" download="" href="<?php the_field('mona_contact_file') ?>">
                                    <div class="box">
                                        <span class="dashicons dashicons-media-document"></span>
                                        <span class="txt"><?php the_field('mona_contact_subtitle') ?></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<?php get_template_part('patch/banner', 'ads') ?>
        </div>
        <!--//wrap-->
    </div>
    <!--//container-->

    <?php
endwhile;
get_footer();
?>

