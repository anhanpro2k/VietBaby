<!--spon-->
<!--<div class="spon">-->
<!--    <div class="wrap">-->
<!--        <div class="swiper-container">-->
<!--            <div class="swiper-wrapper">-->
<!--				--><?php
//				if ( is_array( $lg ) ) {
//					foreach ( $lg as $item ) {
//						?>
<!--                        <div class="swiper-slide">-->
<!--                            <a href="--><?php //echo $item['url'] ?><!--">-->
<!--								--><?php
//								$image = $item['img'];
//								$size  = 'full';
//								echo wp_get_attachment_image( $image, $size );
//								?>
<!--                            </a>-->
<!--                        </div>-->
<!--						--><?php
//					}
//				}
//				?>
<!--            </div>-->
<!--        </div>-->
<!--        <div class="swiper-button-next"></div>-->
<!--        <div class="swiper-button-prev"></div>-->
<!--    </div>-->
<!--</div>-->
<!--//spon-->
<?php
if ( is_page( 13388 ) ) { ?>
    <!--footer-->
    <div class="fter">
        <div class="container-cust">
            <div class="fter-row row">
                <div class="col col-12">
                    <div class="fter-logo">
                        <div class="logo-box">
							<?php
							$footer_logo = mona_get_option( 'mona_footer_logo' );
							?>
                            <a href="<?php echo get_home_url(); ?>">
								<?php ?>
                                <img
                                        src="<?php echo $footer_logo; ?>" alt=""/>
                            </a>
                        </div>
                    </div>

                </div>
                <div class="col col-4">
                    <div class="fter-col">
						<?php
						$mona_footer_social = get_field( 'mona_footer_social' );
						?>
						<?php
						if ( ! empty( $mona_footer_social ) ) {
							?>
                            <div class="fter-social">
                                <div class="fter-subtitle"><?php echo $mona_footer_social['social_title']; ?></div>
								<?php
								if ( content_exists( $mona_footer_social['social_list'] ) ) {
									?>
                                    <div class="social-list">
										<?php
										foreach ( $mona_footer_social['social_list'] as $key => $item ) {
											?>
                                            <a href="<?php echo esc_url( $item['link'] ); ?>" target="_blank"
                                               class="social-link"
                                            >
												<?php echo wp_get_attachment_image( $item['icon'], 'full', '', [ 'class' => '' ] ); ?>
                                            </a>
											<?php
										}
										?>
                                    </div>
									<?php
								}
								?>
                            </div>
                            <div class="fter-contact">
                                <div class="fter-subtitle">Liên hệ</div>
                                <div class="fter-contact-links">
                                    <div class="fter-contact-title">Việt Nam: Ms. Khue</div>
                                    <a href="tel:+84-901-534-565" class="fter-contact-link">Tel: +84-901-534-565 </a>
                                    <a href="mailto:minhkhue@coex.vn" class="fter-contact-link">Email:
                                        minhkhue@coex.vn </a>
                                    <div class="fter-contact-title">Hàn Quốc: Ms. Sunny</div>
                                    <a href="tel:+82 10 5126 6059" class="fter-contact-link">Tel: +82 10 5126 6059 </a>
                                    <a href="mailto:overseas.segefairs@gmail.com" class="fter-contact-link">Email:
                                        overseas.segefairs@gmail.com </a>

                                </div>
                            </div>
                            <!--                            <div class="fter-contact">-->
                            <!--								--><?php
//								$mona_footer_email = get_field( 'mona_footer_email' );
//								?>
                            <!--								--><?php
//								if ( content_exists( $mona_footer_email ) ) {
//									?>
                            <!--                                    <div class="fter-subtitle">--><?php //echo $mona_footer_email['email_title']; ?><!--</div>-->
                            <!--                                    <div class="fter-contact-links">-->
                            <!--										--><?php
//										foreach ( $mona_footer_email['list_contact'] as $key_email => $item_email ) {
//											?>
                            <!--                                            <a href="--><?php //echo 'mailto:' . $item_email['link']; ?><!--"-->
                            <!--                                               class="fter-contact-link"-->
                            <!--                                            >--><?php //echo $item_email['label']; ?><!-- - --><?php //echo $item_email['link']; ?><!--</a-->
                            <!--                                            >-->
                            <!--											--><?php
//										}
//										?>
                            <!--                                    </div>-->
                            <!--									--><?php
//								}
//								?>
                            <!--                            </div>-->
							<?php
						}
						?>

                    </div>
                </div>
				<?php
				$mona_footer_menu2 = get_field( 'mona_footer_menu2' );
				?>
                <div class="col col-4">
                    <div class="fter-col">
						<?php
						if ( content_exists( $mona_footer_menu2 ) ) {
							?>
                            <div class="fter-title"><?php echo $mona_footer_menu2['menu2_title']; ?></div>
							<?php
							if ( content_exists( $mona_footer_menu2['menu2_list'] ) ) {
								?>
                                <ul class="fter-links">
									<?php
									foreach ( $mona_footer_menu2['menu2_list'] as $key_menu => $item_menu ) {
										?>
                                        <li class="fter-link">
                                            <a href="<?php echo $item_menu['link']['url'] ?>"
                                               class="link"><?php echo $item_menu['link']['title']; ?></a>
                                        </li>
										<?php
									}
									?>
                                </ul>
								<?php
							}
							?>
							<?php
						}
						?>
                    </div>
                </div>
				<?php
				$mona_footer_menu3 = get_field( 'mona_footer_menu3' );
				?>
                <div class="col col-4">
                    <div class="fter-col">
						<?php
						if ( content_exists( $mona_footer_menu3 ) ) {
							?>
                            <div class="fter-title"><?php echo $mona_footer_menu3['menu3_title']; ?></div>
							<?php
							if ( content_exists( $mona_footer_menu3['menu3_list'] ) ) {
								?>
                                <ul class="fter-links">
									<?php
									foreach ( $mona_footer_menu3['menu3_list'] as $key_menu => $item_menu ) {
										?>
                                        <li class="fter-link">
                                            <a href="<?php echo $item_menu['link']['url'] ?>"
                                               class="link"><?php echo $item_menu['link']['title']; ?></a>
                                        </li>
										<?php
									}
									?>
                                </ul>
								<?php
							}
							?>
							<?php
						}
						?>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<?php
} else {
	?>
    <!--footer-->
    <div id="footer">
        <!--wrap-->
        <div class="wrap">
            <div class="logo">
				<?php
				$footer_logo = mona_get_option( 'mona_footer_logo' );
				if ( isset( $footer_logo ) && $footer_logo != '' ) {
					echo '<a href="' . get_home_url() . '" class="ft-logo"><img src="' . $footer_logo . '" alt=""></a>';
				}
				?>
            </div>
            <div class="info">
                <div class="d_info">
					<?php mona_option( 'mona_footer_info' ) ?>
                </div>
                <div class="copy"><?php mona_option( 'mona_coppyright' ) ?>
                    <p style="position: fixed; left: 110%; top: 80%;"><a
                                href="https://mona.media/thiet-ke-website-tai-hcm/">Thiết kế website</a> bời <a
                                href="https://mona.media">Mona Media</a></p>
                </div>
            </div>
            <a href="#" class="bt_go_top">맨 위로</a>
        </div>
        <!--//wrap-->
    </div>
	<?php
} ?>
<!--//footer-->
</div>
<span class="scroll-top"><i class="fa fa-angle-up"></i></span>
<script src='<?php echo site_url(); ?>/template/js/jquery-1.9.1.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script src="<?php echo site_url(); ?>/template/js/swiper/js/swiper.min.js"></script>
<script src='<?php echo site_url(); ?>/template/js/respond68b3.js'></script>
<script src='<?php echo site_url(); ?>/template/js/jquery.scrolling-tabsaead.js'></script>
<script src='<?php echo site_url(); ?>/template/js/jquery.magnific-popup.minaead.js'></script>
<script src='<?php echo site_url(); ?>/template/js/bootstrap.minaead.js'></script>
<script src='<?php echo site_url(); ?>/template/js/zepto.minaead.js'></script>
<script src='<?php echo site_url(); ?>/template/js/layoutaead.js'></script>
<script src='<?php echo site_url(); ?>/template/js/wp-embed.minaead.js'></script>
<script src='<?php echo site_url(); ?>/template/js/lightGallery/js/lightgallery-all.min.js'></script>
<script src="<?php echo site_url(); ?>/template/js/sweetalert/sweetalert.min.js"></script>
<script src="<?php echo site_url(); ?>/template/js/main.js"></script>
<?php wp_footer(); ?>
</body>
</html>