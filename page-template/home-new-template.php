<?php
/**
 * Template name: Home Page New
 * @author : Hy Hý
 */
get_header();
while ( have_posts() ):
	the_post();
	?>

    <main id="wrap">
        <!--main_contents-->
        <div id="main_contents">
			<?php
			$mona_home_section_banner = get_field( 'mona_home_section_banner' );
			?>
            <!--wrap-->
            <div class="bner-wrap">
                <div>
					<?php
					if ( content_exists( $mona_home_section_banner ) ) {
						?>
                        <div class="bner">
                            <div class="bner-bg">
								<?php
								if ( ! empty( $mona_home_section_banner['banner_image'] ) ) {
									?>
									<?php echo wp_get_attachment_image( $mona_home_section_banner['banner_image'], '1300x800', '', [ 'class' => '' ] ); ?>
									<?php
								}
								?>
                            </div>
							<?php
							if ( content_exists( $mona_home_section_banner['banner_list_button'] ) ) {
								?>
                                <div class="bner-buttons">
									<?php
									foreach ( $mona_home_section_banner['banner_list_button'] as $key => $item ) {
										?>
                                        <a href="<?php echo $item['link']['url']; ?>"
                                           class="bner-btn"><?php echo $item['link']['title']; ?></a>
										<?php
									}
									?>
                                </div>
								<?php
							}
							?>
                        </div>
						<?php
					}
					?>
                </div>
            </div>

			<?php
			$mona_home_section_video = get_field( 'mona_home_section_video' );
			?>
            <div class="container-cust"></div>
            <div class="wrap h-wrap">
				<?php
				if ( content_exists( $mona_home_section_video ) ) {
					?>
                    <div class="h-head">
                        <div class="m_img">
                            <iframe
                                    width="1268"
                                    height="713"
                                    src="<?php echo esc_url( $mona_home_section_video['video_url'] ); ?>"
                                    title="Vietbaby video teaser"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen
                            ></iframe>
                        </div>
                        <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fvietbabyfair%2F&tabs=timeline&width=340&height=400&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=false&appId=538498843471899"
                                width="340" height="400" style="border:none;overflow:hidden" scrolling="no"
                                frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                    </div>
					<?php
				}
				?>

				<?php
				$mona_home_section_result = get_field( 'mona_home_section_result' );
				?>
				<?php
				if ( content_exists( $mona_home_section_result ) ) {
					?>
                    <div class="h-result-wrap">
                        <div class="h-result-title-wrap">
                            <div class="h-result-title"><?php echo $mona_home_section_result['result_title']; ?></div>
                        </div>
                        <div class="h-result">
							<?php
							if ( content_exists( $mona_home_section_result['result_list_items'] ) ) {
								?>
                                <div class="h-result-row">
									<?php
									foreach ( $mona_home_section_result['result_list_items'] as $key_number => $item_number ) {
										?>
                                        <div class="c-item">
                                            <div class="h-result-item">
                                                <div class="h-result-img">
													<?php
													if ( ! empty( $item_number['icon'] ) ) {
														?>
														<?php echo wp_get_attachment_image( $item_number['icon'], '100x100', '', [ 'class' => '' ] ); ?>
														<?php
													}
													?>
                                                </div>
                                                <div class="h-result-content">
                                                    <div class="number">
                                                        <div class="number-inner counter"><?php echo $item_number['number']; ?></div>
														<?php echo $item_number['info']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
										<?php
									}
									?>
                                </div>
								<?php
							}
							?>
                        </div>
                    </div>
					<?php
				}
				?>
				<?php
				$mona_home_section_link = get_field( 'mona_home_section_link' );
				?>
				<?php
				if ( content_exists( $mona_home_section_link ) ) {
					?>
                    <ul class="m_c_menu">
						<?php
						foreach ( $mona_home_section_link as $key => $item ) {
							$class_num = ( $key + 1 ) % 2 == 0 ? 'm02' : 'm01'; ?>
                            <li class="<?php echo $class_num ?>">
                                <a target="_blank" href="<?php echo $item['link']['url']; ?>"
                                   style="background-image: url(<?php echo wp_get_attachment_image_url( $item['image'] ); ?>);"><span><?php echo $item['link']['title']; ?></span></a>
                            </li>
							<?php
						}
						?>
                    </ul>
					<?php
				}
				?>
				<?php
				$mona_home_section_show = get_field( 'mona_home_section_show' );
				?>
				<?php
				if ( content_exists( $mona_home_section_show ) ) {
					?>
                    <div class="h-news-slider">
                        <div class="h-news-slider-title">
                            <div class="title-inner"><?php echo $mona_home_section_show['title'] ?></div>
                        </div>
                        <div class="swiper-container">
							<?php
							if ( content_exists( $mona_home_section_show['show_list'] ) ) {
								?>
                                <div class="swiper-wrapper">
									<?php
									$show_list = $mona_home_section_show['show_list'];
									for ( $i = 0; $i < count( $show_list ); $i += 2 ) {
										$show1 = $show_list[ $i ];
										$show2 = $show_list[ $i + 1 ];
										?>
                                        <div class="swiper-slide">
                                            <div class="news__slider" id="news-slider">
                                                <div class="news__slider-item">
                                                    <div class="news-slide-title">
                                                        <a target="_blank"
                                                           href="<?php echo esc_url( $show1['show_title']['url'] ); ?>"
                                                           class="news-slide-link"
                                                        ><?php echo $show1['show_title']['title']; ?></a
                                                        >
                                                    </div>
                                                    <div class="news-slides">
                                                        <a
                                                                target="_blank"
                                                                href="<?php echo esc_url( $show1['show_title']['url'] ); ?>"
                                                                class="news-slide-wrap"
                                                                style="background-image: url('<?php echo wp_get_attachment_image_url( $show1['show_banner'], '830x400' ); ?>');"
                                                        ></a>
                                                        <div class="swiper-pagination"></div>
                                                        <div
                                                                class="swiper-button-next swiper-button-white"
                                                        ></div>
                                                        <div
                                                                class="swiper-button-prev swiper-button-white"
                                                        ></div>
                                                    </div>
                                                </div>
                                                <div class="news__slider-item">
                                                    <div class="news-slide-title">
                                                        <a target="_blank"
                                                           href="<?php echo esc_url( $show2['show_title']['url'] ); ?>"
                                                           class="news-slide-link"
                                                        ><?php echo $show2['show_title']['title']; ?></a
                                                        >
                                                    </div>
                                                    <div class="news-slides">
                                                        <a target="_blank"
                                                           href="<?php echo esc_url( $show2['show_title']['url'] ); ?>"
                                                           class="news-slide-wrap"
                                                           style="background-image: url('<?php echo wp_get_attachment_image_url( $show2['show_banner'], '830x400' ); ?>');"
                                                        ></a>
                                                        <div class="swiper-pagination"></div>
                                                        <div
                                                                class="swiper-button-next swiper-button-white"
                                                        ></div>
                                                        <div
                                                                class="swiper-button-prev swiper-button-white"
                                                        ></div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
										<?php
									}
									?>
                                </div>
								<?php
							}
							?>
                        </div>
                    </div>
					<?php
				}
				?>

				<?php
				$mona_home_section_customer = get_field( 'mona_home_section_customer' );
				?>
				<?php
				if ( content_exists( $mona_home_section_customer ) ) {
					?>
                    <div class="h-customer">
						<?php
						$mona_home_section_customer_title = get_field( 'mona_home_section_customer_title' );
						?>
						<?php
						if ( ! empty( $mona_home_section_customer_title ) ) {
							?>
                            <div class="h-news-slider-title">
                                <div class="title-inner"><?php echo $mona_home_section_customer_title; ?></div>
                            </div>
							<?php
						}
						?>
                        <div class="h-customer-slider">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
									<?php
									foreach ( $mona_home_section_customer as $key_customer => $item_customer ) {
										?>
                                        <div class="swiper-slide">
                                            <div class="h-customer-image">
                                                <a target="_blank" href="<?php echo $item_customer['link']['url']; ?>">
													<?php echo wp_get_attachment_image( $item_customer['logo'], 'full', '', [ 'class' => '' ] ); ?>
                                                </a>
                                            </div>
                                        </div>
										<?php
									}
									?>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php
				}
				?>
            </div>
            <!--//wrap-->
        </div>
    </main>
    <!--//main_contents-->


<?php
endwhile;
get_footer();
?>