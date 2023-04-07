<?php
/**
 * Template name: Contact Page
 * @author : Hy Hý
 */
get_header();
while ( have_posts() ):
	the_post();
	?>
	<?php get_template_part( 'patch/breadcrumb2' ) ?>
    <!--container-->
    <div id="container">
        <!--wrap-->
        <div class="wrap">
            <h3><?php the_title() ?></h3>
            <div class="brochure__wrap">
                <div class="row">
					<?php
					if ( ! empty( get_field( 'mona_cf7' ) ) ) {
						?>
                        <div class="col-md-12">
                            <div class="brochure">

                                <div class="contact__form">
                                    <div class="row">
                                        <div class="col-md-5">
											<?php the_content() ?>
											<?php the_field( 'mona_contact' ) ?>
                                        </div>
                                        <div class="col-md-7">
											<?php
											$short = get_field( 'mona_cf7' );
											if ( $short != '' ) {
												echo do_shortcode( $short );
											}
											?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<?php
					}
					?>
					<?php
					$mona_contact_list_brochure = get_field( 'mona_contact_list_brochure' );
					?>
					<?php
					if ( ! empty( $mona_contact_list_brochure ) && is_array( $mona_contact_list_brochure ) ) {
						?>
						<?php
						foreach ( $mona_contact_list_brochure as $key_brochure => $item_brochure ) {
							?>
                            <div class="col-md-12">
                                <div class="brochure-download">
									<?php
									if ( ! empty( $item_brochure['title'] ) ) {
										?>
                                        <h4><?php echo $item_brochure['title'] ?></h4>
										<?php
									}
									?>
                                    <div class="download-box">
                                        <a target="_blank" download="" href="<?php echo $item_brochure['file']; ?>">
                                            <div class="box">
                                                <span class="dashicons dashicons-media-document"></span>
                                                <span class="txt"><?php echo $item_brochure['subtitle']; ?></span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
							<?php
						}
						?>
						<?php
					}
					?>
                </div>
            </div>
			<?php get_template_part( 'patch/banner', 'ads' ) ?>
        </div>
        <!--//wrap-->
    </div>
    <!--//container-->

<?php
endwhile;
get_footer();
?>

