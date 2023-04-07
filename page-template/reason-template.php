<?php
/**
 * Template name: Reason Template
 * @author : Tran Phuoc An
 */
get_header();
while ( have_posts() ):
	the_post();
	?>

    <main class="mona-reason">
		<?php get_template_part( 'patch/breadcrumb2' ) ?>
        <div id="container">
            <div class="wrap">
				<?php
				$mona_reason_title = get_field( 'mona_reason_title' );
				?>
                <h3>
					<?php
					if ( empty( $mona_reason_title ) ) {
						echo get_the_title();
					} else {
						echo $mona_reason_title;
					}
					?>
                </h3>

                <div class="gen-info sec">
                    <div class="container-cust">
						<?php
						$mona_reasion_info_table = get_field( 'mona_reasion_info_table' );
						?>
						<?php
						if ( content_exists( $mona_reasion_info_table ) ) {
							?>
                            <div class="gen-info">
                                <div class="gen-info__table">
                                    <div class="table-main">
                                        <table>
                                            <tbody>
											<?php
											foreach ( $mona_reasion_info_table as $key => $item ) {
												?>
                                                <tr>
                                                    <th>
														<?php
														if ( $item['is_image'] ) { ?>
															<?php
															if ( ! empty( $item['image'] ) ) {
																?>
                                                                <div class="img">
																	<?php echo wp_get_attachment_image( $item['image'], '350x250', '', [ 'class' => '' ] ); ?>
                                                                </div>
																<?php
															}
															?>
															<?php
														} else { ?>
															<?php
															if ( ! empty( $item['title'] ) ) {
																?>
                                                                <div class="tt"><?php echo $item['title']; ?></div>
																<?php
															}
															?>
															<?php
														}
														?>

                                                    </th>
                                                    <td>
														<?php
														if ( ! empty( $item['description'] ) ) {
															?>
                                                            <div class="detail mona-content">
																<?php echo $item['description']; ?>
                                                            </div>
															<?php
														}
														?>
                                                    </td>
                                                </tr>
												<?php
											}
											?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
							<?php
						}
						?>
                        <div class="mona-content">
							<?php
							the_content();
							?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php
endwhile;
get_footer();
?>