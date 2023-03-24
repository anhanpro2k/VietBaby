<?php

define( 'ACF_LITE', true );
define( 'MONA_INDEX', url_to_postid( get_the_permalink( 244 ) ) );
define( 'MONA_HOME', url_to_postid( get_the_permalink( 2 ) ) );
define( 'MONA_GALLERY', url_to_postid( get_the_permalink( 200 ) ) );
define( 'MONA_SUCCESS', url_to_postid( get_the_permalink( 1855 ) ) );


require_once( get_template_directory() . '/core/class/core.class.php' );
require_once( get_template_directory() . '/core/class/Mona_walker.php' );
require_once( get_template_directory() . '/core/class/hook.class.php' );
require_once( get_template_directory() . '/core/customizer.php' );
require_once( get_template_directory() . '/includes/functions.php' );

// image size register
function mona_image_size() {
	add_image_size( '700x300', 700, 300, true );
	add_image_size( '1300x800', 1300, 800, true );


	add_image_size( '340x226', 340, 226, true );
	add_image_size( '370x180', 370, 180, true );
	add_image_size( '100x100', 100, 100, true );
	add_image_size( '830x400', 830, 400, true );
	add_image_size( '510x250', 510, 250, true );
	add_image_size( '115x26', 115, 26, true );
	add_image_size( '100x40', 100, 40, true );
}

add_action( 'after_setup_theme', 'mona_image_size' );

function mona_register_menu() {
	register_nav_menus(
		[
			'primary-menu' => __( 'Theme Main Menu', 'monamedia' ),
			'footer-menu'  => __( 'Theme Footer Menu', 'monamedia' ),
			'top-menu'     => __( 'Theme Top Menu', 'monamedia' ),
		]
	);
}

add_action( 'after_setup_theme', 'mona_register_menu' );

function mona_register_sidebars() {
	register_sidebar( array(
		'id'            => 'sidebar1',
		'name'          => __( 'blog', 'mona_media' ),
		'description'   => __( 'The first (primary) sidebar.', 'mona_media' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="lbl">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'id'            => 'footer_social',
		'name'          => __( 'Footer Social', 'mona_media' ),
		'description'   => __( '', 'mona_media' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="lbl">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'id'            => 'footer_email',
		'name'          => __( 'Footer Email Contact', 'mona_media' ),
		'description'   => __( '', 'mona_media' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="lbl">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'id'            => 'footer_menu_col2',
		'name'          => __( 'Footer Menu Column 2', 'mona_media' ),
		'description'   => __( 'Menu đăng ký', 'mona_media' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="lbl">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'id'            => 'footer_menu_col3',
		'name'          => __( 'Footer Menu Column 3', 'mona_media' ),
		'description'   => __( 'Menu th viện', 'mona_media' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="lbl">',
		'after_title'   => '</h3>',
	) );

	// register widget item
	// require_once(get_template_directory() . '/widget/mona-cart.php');
	//  register_widget('mona_cart');
}

add_action( 'widgets_init', 'mona_register_sidebars' );

function mona_style() {
	wp_enqueue_style( 'mona-custom', get_template_directory_uri() . '/css/mona-custom.css?12' );
	wp_enqueue_script( 'mona-front', get_template_directory_uri() . '/js/front.js', array(), false, true );
	wp_localize_script( 'mona-front', 'mona_ajax_url', array(
		'ajaxURL' => admin_url( 'admin-ajax.php' ),
		'siteURL' => get_site_url()
	) );
}

add_action( 'wp_enqueue_scripts', 'mona_style' );

function mona_admin_style() {
	wp_enqueue_style( 'mona-custom', get_site_url() . '/template/css/jquery.seat-charts.css' );
	wp_enqueue_style( 'mona-magnific', get_template_directory_uri() . '/css/magnific-popup.css' );
	wp_enqueue_style( 'mona-admin', get_template_directory_uri() . '/css/admin.css' );
	wp_enqueue_script( 'mona-magnific', get_site_url() . '/template/js/jquery.magnific-popup.min.js', array(), false, true );
	wp_enqueue_script( 'mona-waypoints', get_site_url() . '/template/js/jquery.waypoints.min.js', array(), false, true );
	wp_enqueue_script( 'mona-charts', get_site_url() . '/template/js/jquery.seat-charts.js', array(), false, true );
	wp_enqueue_script( 'mona-popper', 'https://unpkg.com/popper.js', array(), false, true );
	wp_enqueue_script( 'mona-tippy', 'https://unpkg.com/tippy.js', array(), false, true );
	wp_enqueue_script( 'mona-admin', get_template_directory_uri() . '/js/admin.js', array(), false, true );
}

add_action( 'admin_enqueue_scripts', 'mona_admin_style' );
/**
 * Undocumented function
 * kiếm trang xem string/array đó có rỗng hay không
 *
 * @param array $content_args
 *
 * @return boolean
 */
function content_exists( $content_args = [] ) {
	if ( ! empty ( $content_args ) ) {
		$done  = 0;
		$total = count( $content_args );
		foreach ( $content_args as $key => $value ) {
			if ( ! is_array( $value ) && $value != '' || is_array( $value ) && content_exists( $value ) ) {
				$done ++;
			}
		}
		if ( isset ( $done ) && $done > 0 ) {
			return true;
		} else {
			return false;
		}
	} else {
		return false;
	}
}

function add_menu_parent_class( $items ) {
	$parents = array();
	foreach ( $items as $item ) {
		//Check if the item is a parent item
		if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
			$parents[] = $item->menu_item_parent;
		}
	}

	foreach ( $items as $item ) {
		if ( in_array( $item->ID, $parents ) ) {
			//Add "menu-parent-item" class to parents
			$item->classes[] = 'dropdown';
		}
	}

	return $items;
}

add_filter( 'wp_nav_menu_objects', 'add_menu_parent_class' );

function mona_add_custom_post() {
	$args = array(
		'labels'              => array(
			'name'          => 'Event',
			'singular_name' => 'Event',
			'add_new'       => __( 'Add Event', 'monamedia' ),
			'add_new_item'  => __( 'New Event', 'monamedia' ),
			'edit_item'     => __( 'Edit Event', 'monamedia' ),
			'new_item'      => __( 'New Event', 'monamedia' ),
			'view_item'     => __( 'View Event', 'monamedia' ),
			'view_items'    => __( 'View Events', 'monamedia' ),
		),
		'description'         => 'Add Event',
		'supports'            => array(
			'title',
			'editor',
			'author',
			'thumbnail',
			'comments',
			'revisions',
			'custom-fields',
			'excerpt',
		),
		'taxonomies'          => array( 'events' ),
		'hierarchical'        => false,
		'show_in_rest'        => true,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'             => array(
			'slug'       => 'event',
			'with_front' => true
		),
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-megaphone',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'post'
	);
	register_post_type( 'event', $args );
	$tax_args = array(
		'labels'       => array(
			'name'              => __( 'Events', 'monamedia' ),
			'singular_name'     => __( 'Events', 'monamedia' ),
			'search_items'      => __( 'Search Events', 'monamedia' ),
			'all_items'         => __( 'All Events', 'monamedia' ),
			'parent_item'       => __( 'Parent Events', 'monamedia' ),
			'parent_item_colon' => __( 'Parent Events', 'monamedia' ),
			'edit_item'         => __( 'Edit Events', 'monamedia' ),
			'add_new'           => __( 'Add Events', 'monamedia' ),
			'update_item'       => __( 'Update Events', 'monamedia' ),
			'add_new_item'      => __( 'Add New Events', 'monamedia' ),
			'new_item_name'     => __( 'New Events Name', 'monamedia' ),
			'menu_name'         => __( 'Events', 'monamedia' ),
		),
		'hierarchical' => true,
		'has_archive'  => true,
		'public'       => true,
		'show_in_rest' => true,
		'rewrite'      => array(
			'slug'       => 'events',
			'with_front' => true
		),
		'capabilities' => array(
			'manage_terms' => 'publish_posts',
			'edit_terms'   => 'publish_posts',
			'delete_terms' => 'publish_posts',
			'assign_terms' => 'publish_posts',
		),
	);
	register_taxonomy( 'events', 'event', $tax_args );

	$tax_args = array(
		'labels'       => array(
			'name'              => __( 'Event Address', 'monamedia' ),
			'singular_name'     => __( 'Event Address', 'monamedia' ),
			'search_items'      => __( 'Search Event Address', 'monamedia' ),
			'all_items'         => __( 'All Event Address', 'monamedia' ),
			'parent_item'       => __( 'Parent Event Address', 'monamedia' ),
			'parent_item_colon' => __( 'Parent Event Address', 'monamedia' ),
			'edit_item'         => __( 'Edit Event Address', 'monamedia' ),
			'add_new'           => __( 'Add Event Address', 'monamedia' ),
			'update_item'       => __( 'Update Event Address', 'monamedia' ),
			'add_new_item'      => __( 'Add New Event Address', 'monamedia' ),
			'new_item_name'     => __( 'New Event Address Name', 'monamedia' ),
			'menu_name'         => __( 'Event Address', 'monamedia' ),
		),
		'hierarchical' => true,
		'has_archive'  => true,
		'public'       => true,
		'show_in_rest' => true,
		'rewrite'      => array(
			'slug'       => 'event-address',
			'with_front' => true
		),
		'capabilities' => array(
			'manage_terms' => 'publish_posts',
			'edit_terms'   => 'publish_posts',
			'delete_terms' => 'publish_posts',
			'assign_terms' => 'publish_posts',
		),
	);
	register_taxonomy( 'event-address', 'event', $tax_args );

	$args = array(
		'labels'              => array(
			'name'          => 'Gift',
			'singular_name' => 'Gift',
			'add_new'       => __( 'Add Gift', 'monamedia' ),
			'add_new_item'  => __( 'New Gift', 'monamedia' ),
			'edit_item'     => __( 'Edit Gift', 'monamedia' ),
			'new_item'      => __( 'New Gift', 'monamedia' ),
			'view_item'     => __( 'View Gift', 'monamedia' ),
			'view_items'    => __( 'View Gifts', 'monamedia' ),
		),
		'description'         => 'Add Gift',
		'supports'            => array(
			'title',
			'editor',
			'author',
			'thumbnail',
			'comments',
			'revisions',
			'custom-fields',
			'excerpt',
		),
		'taxonomies'          => array( 'gifts' ),
		'hierarchical'        => false,
		'show_in_rest'        => true,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'             => array(
			'slug'       => 'gift',
			'with_front' => true
		),
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-universal-access-alt',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'post'
	);
	register_post_type( 'gift', $args );
	$tax_args = array(
		'labels'       => array(
			'name'              => __( 'Gifts', 'monamedia' ),
			'singular_name'     => __( 'Gifts', 'monamedia' ),
			'search_items'      => __( 'Search Gifts', 'monamedia' ),
			'all_items'         => __( 'All Gifts', 'monamedia' ),
			'parent_item'       => __( 'Parent Gifts', 'monamedia' ),
			'parent_item_colon' => __( 'Parent Gifts', 'monamedia' ),
			'edit_item'         => __( 'Edit Gifts', 'monamedia' ),
			'add_new'           => __( 'Add Gifts', 'monamedia' ),
			'update_item'       => __( 'Update Gifts', 'monamedia' ),
			'add_new_item'      => __( 'Add New Gifts', 'monamedia' ),
			'new_item_name'     => __( 'New Gifts Name', 'monamedia' ),
			'menu_name'         => __( 'Gifts', 'monamedia' ),
		),
		'hierarchical' => true,
		'has_archive'  => true,
		'public'       => true,
		'rewrite'      => array(
			'slug'       => 'gifts',
			'with_front' => true
		),
		'capabilities' => array(
			'manage_terms' => 'publish_posts',
			'edit_terms'   => 'publish_posts',
			'delete_terms' => 'publish_posts',
			'assign_terms' => 'publish_posts',
		),
	);
	register_taxonomy( 'gifts', 'gift', $tax_args );

	$args = array(
		'labels'              => array(
			'name'          => 'Exhibition',
			'singular_name' => 'Exhibition',
			'add_new'       => __( 'Add Exhibition', 'monamedia' ),
			'add_new_item'  => __( 'New Exhibition', 'monamedia' ),
			'edit_item'     => __( 'Edit Exhibition', 'monamedia' ),
			'new_item'      => __( 'New Exhibition', 'monamedia' ),
			'view_item'     => __( 'View Exhibition', 'monamedia' ),
			'view_items'    => __( 'View Exhibition category', 'monamedia' ),
		),
		'description'         => 'Add Exhibition',
		'supports'            => array(
			'title',
			'excerpt',
			'editor',
			'author',
			'thumbnail',
			'comments',
			'revisions',
			'custom-fields'
		),
		'taxonomies'          => array( 'exhibition_nation', 'exhibition_category', 'exhibition_year' ),
		'hierarchical'        => false,
		//'show_in_rest' => true,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'             => array(
			'slug'       => 'exhibition',
			'with_front' => true
		),
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-admin-site',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'post'
	);
	register_post_type( 'mona_exhibition', $args );
	$tax_args = array(
		'labels'       => array(
			'name'              => __( 'Exhibition category', 'monamedia' ),
			'singular_name'     => __( 'Exhibition category', 'monamedia' ),
			'search_items'      => __( 'Search Exhibition category', 'monamedia' ),
			'all_items'         => __( 'All Exhibition category', 'monamedia' ),
			'parent_item'       => __( 'Parent Exhibition category', 'monamedia' ),
			'parent_item_colon' => __( 'Parent Exhibition category', 'monamedia' ),
			'edit_item'         => __( 'Edit Exhibition category', 'monamedia' ),
			'add_new'           => __( 'Add Exhibition category', 'monamedia' ),
			'update_item'       => __( 'Update Exhibition category', 'monamedia' ),
			'add_new_item'      => __( 'Add New Exhibition category', 'monamedia' ),
			'new_item_name'     => __( 'New Exhibition category Name', 'monamedia' ),
			'menu_name'         => __( 'Exhibition category', 'monamedia' ),
		),
		'hierarchical' => true,
		'has_archive'  => true,
		'public'       => true,
		'show_in_rest' => true,
		'rewrite'      => array(
			'slug'       => 'exhibition-category',
			'with_front' => true
		),
		'capabilities' => array(
			'manage_terms' => 'publish_posts',
			'edit_terms'   => 'publish_posts',
			'delete_terms' => 'publish_posts',
			'assign_terms' => 'publish_posts',
		),
	);
	register_taxonomy( 'exhibition_category', 'mona_exhibition', $tax_args );
	$tax_args = array(
		'labels'       => array(
			'name'              => __( 'Exhibition Year', 'monamedia' ),
			'singular_name'     => __( 'Exhibition Year', 'monamedia' ),
			'search_items'      => __( 'Search Exhibition Year', 'monamedia' ),
			'all_items'         => __( 'All Exhibition Year', 'monamedia' ),
			'parent_item'       => __( 'Parent Exhibition Year', 'monamedia' ),
			'parent_item_colon' => __( 'Parent Exhibition Year', 'monamedia' ),
			'edit_item'         => __( 'Edit Exhibition Year', 'monamedia' ),
			'add_new'           => __( 'Add Exhibition Year', 'monamedia' ),
			'update_item'       => __( 'Update Exhibition Year', 'monamedia' ),
			'add_new_item'      => __( 'Add New Exhibition Year', 'monamedia' ),
			'new_item_name'     => __( 'New Exhibition Year Name', 'monamedia' ),
			'menu_name'         => __( 'Exhibition Year', 'monamedia' ),
		),
		'hierarchical' => true,
		'has_archive'  => true,
		'public'       => true,
		'show_in_rest' => true,
		'rewrite'      => array(
			'slug'       => 'exhibition-year',
			'with_front' => true
		),
		'capabilities' => array(
			'manage_terms' => 'publish_posts',
			'edit_terms'   => 'publish_posts',
			'delete_terms' => 'publish_posts',
			'assign_terms' => 'publish_posts',
		),
	);
	register_taxonomy( 'exhibition_year', 'mona_exhibition', $tax_args );
	$tax_args = array(
		'labels'       => array(
			'name'              => __( 'Exhibition Nation', 'monamedia' ),
			'singular_name'     => __( 'Exhibition Nation', 'monamedia' ),
			'search_items'      => __( 'Search Exhibition Nation', 'monamedia' ),
			'all_items'         => __( 'All Exhibition Nation', 'monamedia' ),
			'parent_item'       => __( 'Parent Exhibition Nation', 'monamedia' ),
			'parent_item_colon' => __( 'Parent Exhibition Nation', 'monamedia' ),
			'edit_item'         => __( 'Edit Exhibition Nation', 'monamedia' ),
			'add_new'           => __( 'Add Exhibition Nation', 'monamedia' ),
			'update_item'       => __( 'Update Exhibition Nation', 'monamedia' ),
			'add_new_item'      => __( 'Add New Exhibition Nation', 'monamedia' ),
			'new_item_name'     => __( 'New Exhibition Nation Name', 'monamedia' ),
			'menu_name'         => __( 'Exhibition Nation', 'monamedia' ),
		),
		'hierarchical' => true,
		'has_archive'  => true,
		'show_in_rest' => true,
		'public'       => true,
		'rewrite'      => array(
			'slug'       => 'exhibition-nation',
			'with_front' => true
		),
		'capabilities' => array(
			'manage_terms' => 'publish_posts',
			'edit_terms'   => 'publish_posts',
			'delete_terms' => 'publish_posts',
			'assign_terms' => 'publish_posts',
		),
	);
	register_taxonomy( 'exhibition_nation', 'mona_exhibition', $tax_args );

	$tax_args = array(
		'labels'       => array(
			'name'              => __( 'Exhibition District', 'monamedia' ),
			'singular_name'     => __( 'Exhibition District', 'monamedia' ),
			'search_items'      => __( 'Search Exhibition District', 'monamedia' ),
			'all_items'         => __( 'All Exhibition District', 'monamedia' ),
			'parent_item'       => __( 'Parent Exhibition District', 'monamedia' ),
			'parent_item_colon' => __( 'Parent Exhibition District', 'monamedia' ),
			'edit_item'         => __( 'Edit Exhibition District', 'monamedia' ),
			'add_new'           => __( 'Add Exhibition District', 'monamedia' ),
			'update_item'       => __( 'Update Exhibition District', 'monamedia' ),
			'add_new_item'      => __( 'Add New Exhibition District', 'monamedia' ),
			'new_item_name'     => __( 'New Exhibition District Name', 'monamedia' ),
			'menu_name'         => __( 'Exhibition District', 'monamedia' ),
		),
		'hierarchical' => true,
		'has_archive'  => true,
		'show_in_rest' => true,
		'public'       => true,
		'rewrite'      => array(
			'slug'       => 'exhibition-district',
			'with_front' => true
		),
		'capabilities' => array(
			'manage_terms' => 'publish_posts',
			'edit_terms'   => 'publish_posts',
			'delete_terms' => 'publish_posts',
			'assign_terms' => 'publish_posts',
		),
	);
	register_taxonomy( 'exhibition_district', 'mona_exhibition', $tax_args );


	$args = array(
		'labels'              => array(
			'name'          => 'Mã đăng ký',
			'singular_name' => 'Mã đăng ký',
			'add_new'       => __( 'Add Mã đăng ký', 'monamedia' ),
			'add_new_item'  => __( 'New Mã đăng ký', 'monamedia' ),
			'edit_item'     => __( 'Edit Mã đăng ký', 'monamedia' ),
			'new_item'      => __( 'New Mã đăng ký', 'monamedia' ),
			'view_item'     => __( 'View Mã đăng ký', 'monamedia' ),
			'view_items'    => __( 'View Mã đăng ký category', 'monamedia' ),
		),
		'description'         => 'Add Mã đăng ký',
		'supports'            => array(
			'title',
		),
		'taxonomies'          => array(),
		'hierarchical'        => false,
		'show_in_rest'        => true,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'             => array(
			'slug'       => 'macode',
			'with_front' => false
		),
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => false,
		'show_in_admin_bar'   => false,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-tickets-alt',
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'post'
	);
	register_post_type( 'mona_code', $args );
	flush_rewrite_rules();
}

add_action( 'init', 'mona_add_custom_post' );

