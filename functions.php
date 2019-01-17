<?php

// LOAD starter CORE (if you remove this, the theme will break)
require_once( 'library/starter.php' );

// CUSTOMIZE THE WORDPRESS ADMIN (off by default)
// require_once( 'library/admin.php' );

/*********************
LAUNCH starter
Let's get everything up and running.
*********************/

function starter_ahoy() {

  //Allow editor style.
  add_editor_style( get_stylesheet_directory_uri() . '/library/css/editor-style.css' );

  // let's get language support going, if you need it
  load_theme_textdomain( 'startertheme', get_template_directory() . '/library/translation' );

  // USE THIS TEMPLATE TO CREATE CUSTOM POST TYPES EASILY
  // require_once( 'library/custom-post-type.php' );

  // launching operation cleanup
  add_action( 'init', 'starter_head_cleanup' );
  // A better title
  add_filter( 'wp_title', 'rw_title', 10, 3 );
  // remove WP version from RSS
  add_filter( 'the_generator', 'starter_rss_version' );
  // remove pesky injected css for recent comments widget
  add_filter( 'wp_head', 'starter_remove_wp_widget_recent_comments_style', 1 );
  // clean up comment styles in the head
  add_action( 'wp_head', 'starter_remove_recent_comments_style', 1 );
  // clean up gallery output in wp
  add_filter( 'gallery_style', 'starter_gallery_style' );

  // enqueue base scripts and styles
  add_action( 'wp_enqueue_scripts', 'starter_scripts_and_styles', 999 );
  // ie conditional wrapper

  // launching this stuff after theme setup
  starter_theme_support();

  // adding sidebars to Wordpress (these are created in functions.php)
  add_action( 'widgets_init', 'starter_register_sidebars' );

  // cleaning up random code around images
  add_filter( 'the_content', 'starter_filter_ptags_on_images' );
  // cleaning up excerpt
  add_filter( 'excerpt_more', 'starter_excerpt_more' );

} /* end starter ahoy */

// let's get this party started
add_action( 'after_setup_theme', 'starter_ahoy' );


/************* OEMBED SIZE OPTIONS *************/

if ( ! isset( $content_width ) ) {
	$content_width = 680;
}

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'feature-thumb', 350, 350, array( 'left', 'top' ) );
add_image_size( 'logo', 300, false );
add_image_size( 'product', 400, false );
add_image_size( 'full-width', 1440, false );





/************* THEME CUSTOMIZE *********************/

/*
  A good tutorial for creating your own Sections, Controls and Settings:
  http://code.tutsplus.com/series/a-guide-to-the-wordpress-theme-customizer--wp-33722

  Good articles on modifying the default options:
  http://natko.com/changing-default-wordpress-theme-customization-api-sections/
  http://code.tutsplus.com/tutorials/digging-into-the-theme-customizer-components--wp-27162

  To do:
  - Create a js for the postmessage transport method
  - Create some sanitize functions to sanitize inputs
  - Create some boilerplate Sections, Controls and Settings
*/

include 'inc/customizer.php';


function theme_enqueue_styles() {
  wp_enqueue_style( 'theme-styles', get_stylesheet_directory_uri().'/library/css/style.css' ); // This is where you enqueue your theme's main stylesheet
  $custom_css = theme_get_customizer_css();
  wp_add_inline_style( 'theme-styles', $custom_css );
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

// ACTIVE SIDEBARS

// Sidebars & Widgetizes Areas
function starter_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'Sidebar 1', 'startertheme' ),
		'description' => __( 'The first (primary) sidebar.', 'startertheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

  register_sidebar(array(
		'id' => 'category-filter',
		'name' => __( 'Category Filter', 'startertheme' ),
		'description' => __( 'Filter Assets by Category', 'startertheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

} // don't remove this bracket!

function starter_fonts() {
  wp_enqueue_style('googleFonts', '//fonts.googleapis.com/css?family=Montserrat:400,500,700|Roboto:300,400,700');
}

add_action('wp_enqueue_scripts', 'starter_fonts');

include 'woocommerce/woo-functions.php';

include 'partials/custom_fields.php';

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
  /*
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
  */
}


/* DON'T DELETE THIS CLOSING TAG */ ?>
