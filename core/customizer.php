<?php

if ( class_exists( 'Kirki' ) ) {

	/**
	 * Add sections
	 */
	function kirki_demo_scripts() {
		wp_enqueue_style( 'kirki-demo', get_stylesheet_uri(), array(), time() );
	}

	add_action( 'wp_enqueue_scripts', 'kirki_demo_scripts' );
	$priority = 1;
	Kirki::add_section( 'general', array(
		'title'      => esc_attr__( 'General Option', 'monamedia' ),
		'priority'   => $priority ++,
		'capability' => 'edit_theme_options',
	) );
	Kirki::add_section( 'header', array(
		'title'      => esc_attr__( 'Header Option', 'monamedia' ),
		'priority'   => $priority ++,
		'capability' => 'edit_theme_options',
	) );
	Kirki::add_section( 'social', array(
		'title'      => esc_attr__( 'Social Link', 'monamedia' ),
		'priority'   => $priority ++,
		'capability' => 'edit_theme_options',
	) );
	Kirki::add_section( 'footer', array(
		'title'      => esc_attr__( 'Footer Option', 'monamedia' ),
		'priority'   => $priority ++,
		'capability' => 'edit_theme_options',
	) );


	/**
	 * Add fields
	 */
	// Header
// Footer Tab
	Kirki::add_field( 'mona_setting', array(
		'type'        => 'image',
		'settings'    => 'mona_footer_logo',
		'label'       => esc_attr__( 'Footer Logo', 'monamedia' ),
		'description' => esc_attr__( '', 'monamedia' ),
		'help'        => esc_attr__( 'Enter your Logo', 'monamedia' ),
		'section'     => 'footer',
		'default'     => '',
		'priority'    => $priority ++,
	) );
	Kirki::add_field( 'mona_setting', array(
		'type'        => 'textarea',
		'settings'    => 'mona_coppyright',
		'label'       => esc_attr__( 'Coppyright', 'monamedia' ),
		'description' => esc_attr__( '', 'monamedia' ),
		'help'        => esc_attr__( 'Enter your Coppyright', 'monamedia' ),
		'section'     => 'footer',
		'default'     => '',
		'priority'    => $priority ++,
	) );
	Kirki::add_field( 'mona_setting', array(
		'type'        => 'editor',
		'settings'    => 'mona_footer_info',
		'label'       => esc_attr__( 'Footer info', 'monamedia' ),
		'description' => esc_attr__( '', 'monamedia' ),
		'help'        => esc_attr__( 'Enter your Footer info', 'monamedia' ),
		'section'     => 'footer',
		'default'     => '',
		'priority'    => $priority ++,
	) );
// Social Tab    
	Kirki::add_field( 'mona_setting', array(
		'type'        => 'text',
		'settings'    => 'mona_sticky_header_facebook',
		'label'       => esc_attr__( 'Facebook', 'monamedia' ),
		'description' => esc_attr__( '', 'monamedia' ),
		'help'        => esc_attr__( 'Enter your Facebook Link', 'monamedia' ),
		'section'     => 'social',
		'default'     => '',
		'priority'    => $priority ++,
	) );
	Kirki::add_field( 'mona_setting', array(
		'type'        => 'text',
		'settings'    => 'mona_sticky_header_website',
		'label'       => esc_attr__( 'Website', 'monamedia' ),
		'description' => esc_attr__( '', 'monamedia' ),
		'help'        => esc_attr__( 'Enter your Website', 'monamedia' ),
		'section'     => 'social',
		'default'     => '',
		'priority'    => $priority ++,
	) );
	Kirki::add_field( 'mona_setting', array(
		'type'        => 'text',
		'settings'    => 'mona_sticky_header_email',
		'label'       => esc_attr__( 'Email', 'monamedia' ),
		'description' => esc_attr__( '', 'monamedia' ),
		'help'        => esc_attr__( 'Enter your Email', 'monamedia' ),
		'section'     => 'social',
		'default'     => '',
		'priority'    => $priority ++,
	) );
	Kirki::add_field( 'mona_setting', array(
		'type'        => 'text',
		'settings'    => 'mona_sticky_header_youtube',
		'label'       => esc_attr__( 'Youtube', 'monamedia' ),
		'description' => esc_attr__( '', 'monamedia' ),
		'help'        => esc_attr__( 'Enter your Youtube Link', 'monamedia' ),
		'section'     => 'social',
		'default'     => '',
		'priority'    => $priority ++,
	) );
}
if ( ! function_exists( 'mona_option' ) ) {

	function mona_option( $setting, $default = '' ) {
		echo mona_get_option( $setting, $default );
	}

	function mona_get_option( $setting, $default = '' ) {
		if ( class_exists( 'Kirki' ) ) {
			$value   = $default;
			$options = get_option( 'option_name', array() );
			$options = get_theme_mod( $setting, $default );
			if ( isset( $options ) ) {
				$value = $options;
			}

			return $value;
		}

		return $default;
	}

}