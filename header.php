<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @author : monamedia
 */
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <!-- Meta
			================================================== -->
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport"
          content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, width=device-width">
	<?php wp_site_icon(); ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"/>
    <!-- Plugin CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet"/>
    <!-- Plugin CSS -->
    <link rel="stylesheet" href="<?php echo get_site_url() ?>/template/css/source-style.css">
    <link rel="stylesheet" href="<?php echo get_site_url() ?>/template/js/sweetalert/sweetalert.css">
    <link rel="stylesheet" href="<?php echo get_site_url() ?>/template/js/lightGallery/css/lightgallery.min.css">
    <link rel="stylesheet" href="<?php echo get_site_url() ?>/template/css/mona-style.min.css">
    <link rel="stylesheet" href="<?php echo get_site_url() ?>/template/css/backdoor.css"/>
    <link rel="stylesheet" href="<?php echo get_site_url() ?>/template/css/style2.css"/>
	<?php wp_head(); ?>
</head>
<?php
if ( is_front_page() ) {
	$body = 'mobile-detect';
} else {
	$body = 'desktop-detect';
}
?>
<body <?php body_class( $body ); ?>>
<!--header-->
<?php
if ( is_page( 13388 ) || is_page( 13645 ) || is_page( 13608 ) || is_page( 13596 ) ) {
	?>
    <header class="hd">
        <div class="hd-top">
            <div class="container-cust">
                <div class="hd-social">
                    <div class="social-list">
						<?php
						$facebook_link = mona_get_option( 'mona_sticky_header_facebook', '' );
						?>
						<?php
						if ( ! empty( $facebook_link ) ) {
							?>
                            <a target="_blank" href="<?php echo esc_url( $facebook_link ); ?>"
                               class="social-link">
                                <img src="<?php echo get_site_url(); ?>/template/images/tm_fb.png" alt=""/>
                            </a>
							<?php
						}
						?>

						<?php
						$tiktok_link = mona_get_option( 'mona_sticky_header_tiktok', '' );
						?>
						<?php
						if ( ! empty( $tiktok_link ) ) {
							?>
                            <a target="_blank" href="<?php echo esc_url( $tiktok_link ); ?>"
                               class="social-link">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/tik-tok.png" alt=""/>
                            </a>
							<?php
						}
						?>


						<?php
						$instagram_link = mona_get_option( 'mona_sticky_header_instagram', '' );
						?>
						<?php
						if ( ! empty( $instagram_link ) ) {
							?>
                            <a target="_blank" href="<?php echo esc_url( $instagram_link ); ?>"
                               class="social-link">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/instagram.png" alt=""/>
                            </a>
							<?php
						}
						?>


						<?php
						$youtube_link = mona_get_option( 'mona_sticky_header_youtube', '' )
						?>
						<?php
						if ( ! empty( $youtube_link ) ) {
							?>
                            <a target="_blank" href="<?php echo esc_url( $youtube_link ); ?>" class="social-link">
                                <img src="<?php echo get_site_url(); ?>/template/images/tm_yt.png" alt=""/>
                            </a>
							<?php
						}
						?>
						<?php
						$email_link = mona_get_option( 'mona_sticky_header_email', '' );
						?>
						<?php
						if ( ! empty( $email_link ) ) {
							?>
                            <a target="_blank" href="<?php echo 'mailto:' . $email_link; ?>" class="social-link">
                                <img src="<?php echo get_site_url(); ?>/template/images/tm_em.png" alt=""/>
                            </a>
							<?php
						}
						?>
						<?php
						$website_link = mona_get_option( 'mona_sticky_header_website', '' );
						?>
                        <a target="_blank" href="<?php echo $website_link; ?>" class="social-link">
                            <img src="<?php echo get_site_url(); ?>/template/images/tm_in.png" alt=""/>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="hd-main">
            <div class="container-cust">
                <div class="hd-logo">
                    <div class="logo-box">
                        <a href="<?php echo get_home_url(); ?>">
                            <img src="<?php echo get_site_url(); ?>/template/images/logo-vietbaby.jpg" alt=""/>
                        </a>
                    </div>
                </div>
                <div class="hd-menu">
					<?php
					wp_nav_menu( array(
						'container'       => false,
						'container_class' => '',
						'menu_class'      => 'menu-list',
						'theme_location'  => 'primary-menu',
						'before'          => '',
						'after'           => '',
						'link_before'     => '',
						'link_after'      => '',
						'fallback_cb'     => false,
						'walker'          => new Mona_Walker_Nav_Menu,
					) );
					?>
                </div>
                <div class="hd-toggle">
                    <div class="ham">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </header>
	<?php
} else { ?>
    <div id="header">
        <!--wrap-->
        <div class="wrap">
            <h1>
                <a href="<?php echo get_the_permalink( MONA_HOME ) ?>">
                    <span class="main-logo"></span>
                </a>
            </h1>
            <a href="#self" id="bt_gnb"><i></i><i></i><i></i><i></i>메뉴열기</a>
            <div id="gnb_bg"></div>
            <!--tm-->
            <div id="tm">

                <a href="<?php echo mona_get_option( 'mona_sticky_header_facebook', '' ); ?>" class="social-link">
                    <img src="<?php echo get_site_url(); ?>/template/images/tm_fb.png" alt=""/>
                </a>
                <a href="" class="social-link">
                    <img src="<?php echo get_site_url(); ?>/template/images/tm_yt.png" alt=""/>
                </a>
                <a href="" class="social-link">
                    <img src="<?php echo get_site_url(); ?>/template/images/tm_em.png" alt=""/>
                </a>
                <a href="" class="social-link">
                    <img src="<?php echo get_site_url(); ?>/template/images/tm_in.png" alt=""/>
                </a>
                <div class="language-picker">

                    <!--<div class="language-list">
						<a class="current-language" href="#">English</a>
						<div class="sub-language">
							<a href="#">Vietnamese</a>
							<a href="#">English</a>
						</div>
					</div>-->


                    <div class="language-list">
						<?php
						$languages = icl_get_languages( 'skip_missing=1' );
						foreach ( $languages as $l ) {
							if ( $l['active'] == 1 ) {
								echo ' <a class="current-language"> ' . $l['native_name'] . '</a>';
							}
						}
						?>
                        <div class="sub-language">
							<?php
							foreach ( $languages as $l ) {
								echo '<a  href="' . $l['url'] . '">' . $l['native_name'] . '</a>';
							}
							?>
                            <a target="_blank" href="http://vietbabyfair.com/">Korea</a>
                        </div>
                    </div>


                </div>
            </div>
            <!--tm-->
            <!--gnb-->
            <div id="gnb">
				<?php
				wp_nav_menu( array(
					'container'       => false,
					'container_class' => '',
					'menu_class'      => '',
					'theme_location'  => 'primary-menu',
					'before'          => '',
					'after'           => '',
					'link_before'     => '',
					'link_after'      => '',
					'fallback_cb'     => false,
					//'walker' => new Mona_Custom_Walker_Nav_Menu,
				) );
				?>
            </div>
            <!--//gnb-->
        </div>
        <!--//wrap-->
    </div>
	<?php
} ?>
<!--//header-->
