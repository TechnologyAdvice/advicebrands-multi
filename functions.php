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
add_image_size( 'logo', 300, false );
add_image_size( 'product', 400, false );
add_image_size( 'full-width', 1440, false );



/*
add_filter( 'image_size_names_choose', 'starter_custom_image_sizes' );

function starter_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'gallery-image' => __('Gallery Image'),
        'starter-thumb-600' => __('600px by 150px'),
        'starter-thumb-300' => __('300px by 100px'),
    ) );
}
*/
/*
The function above adds the ability to use the dropdown menu to select
the new images sizes you have just created from within the media manager
when you add media to your content blocks. If you add more image sizes,
duplicate one of the lines in the array and name it according to your
new image size.
*/



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

function starter_theme_customizer($wp_customize) {
  // $wp_customize calls go here.
  //
  // Text color
    $wp_customize->add_setting( 'text_color', array(
      'default'   => '',
      'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'text_color', array(
      'section' => 'colors',
      'label'   => esc_html__( 'Text color', 'theme' ),
    ) ) );



  // Uncomment the below lines to remove the default customize sections

  // $wp_customize->remove_section('title_tagline');
  // $wp_customize->remove_section('colors');
   $wp_customize->remove_section('background_image');
  // $wp_customize->remove_section('static_front_page');
  // $wp_customize->remove_section('nav');

  // Uncomment the below lines to remove the default controls
  // $wp_customize->remove_control('blogdescription');

  // Uncomment the following to change the default section titles
    $wp_customize->get_section('colors')->title = __( 'Theme Colors' );
  // $wp_customize->get_section('background_image')->title = __( 'Images' );
}

add_action( 'customize_register', 'starter_theme_customizer' );

function theme_get_customizer_css() {
    ob_start();

    $text_color = get_theme_mod( 'text_color', '' );
    if ( ! empty( $text_color ) ) {
      ?>
      body {
        color: <?php echo $text_color; ?>;
      }
      <?php
    }

    $css = ob_get_clean();
    return $css;
  }


function theme_enqueue_styles() {
  wp_enqueue_style( 'theme-styles', get_stylesheet_directory_uri().'/library/css/style.css' ); // This is where you enqueue your theme's main stylesheet
  $custom_css = theme_get_customizer_css();
  wp_add_inline_style( 'theme-styles', $custom_css );
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

/************* ACTIVE SIDEBARS ********************/

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

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __( 'Sidebar 2', 'startertheme' ),
		'description' => __( 'The second (secondary) sidebar.', 'startertheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!

/*
 * Remove Original Tag Meta Box - courtesy of https://rudrastyh.com/wordpress/tag-metabox-like-categories.html
 */
function rudr_post_tags_meta_box_remove() {
	$id = 'tagsdiv-post_tag'; // you can find it in a page source code (Ctrl+U)
	$post_type = 'post'; // remove only from post edit screen
	$position = 'side';
	remove_meta_box( $id, $post_type, $position );
}
add_action( 'admin_menu', 'rudr_post_tags_meta_box_remove');

/*
 * Add Category style Tag box
 */
function rudr_add_new_tags_metabox(){
	$id = 'rudrtagsdiv-post_tag'; // it should be unique
	$heading = 'Tags'; // meta box heading
	$callback = 'rudr_metabox_content'; // the name of the callback function
	$post_type = 'post';
	$position = 'side';
	$pri = 'default'; // priority, 'default' is good for us
	add_meta_box( $id, $heading, $callback, $post_type, $position, $pri );
}
add_action( 'admin_menu', 'rudr_add_new_tags_metabox');

/*
 * Fill
 */
 function rudr_metabox_content($post) {
 		// get all blog post tags as an array of objects
 		$all_tags = get_terms( array('taxonomy' => 'post_tag', 'hide_empty' => 0) );
 		// get all tags assigned to a post
 		$all_tags_of_post = get_the_terms( $post->ID, 'post_tag' );

 		// create an array of post tags ids
 		$ids = array();
 		if ( $all_tags_of_post ) {
 			foreach ($all_tags_of_post as $tag ) {
 				$ids[] = $tag->term_id;
 			}
 		}

 		// HTML
 		echo '<div id="taxonomy-post_tag" class="categorydiv">';
 		echo '<div id="tag-all" class="tabs-panel" style="display:block">';
 		echo '<input type="hidden" name="tax_input[post_tag][]" value="0" />';
 		echo '<ul>';
 		foreach( $all_tags as $tag ){
 			// unchecked by default
 			$checked = "";
 			// if an ID of a tag in the loop is in the array of assigned post tags - then check the checkbox
 			if ( in_array( $tag->term_id, $ids ) ) {
 				$checked = " checked='checked'";
 			}
 			$id = 'post_tag-' . $tag->term_id;
 			echo "<li id='{$id}'>";
 			echo "<label><input type='checkbox' name='tax_input[post_tag][]' id='in-$id'". $checked ." value='$tag->slug' /> $tag->name</label><br />";
 			echo "</li>";
 		}
 		echo '</ul></div></div>'; // end HTML
 	}



/*
This is a modification of a function found in the
twentythirteen theme where we can declare some
external fonts. If you're using Google Fonts, you
can replace these fonts, change it in your scss files
and be up and running in seconds.
*/
function starter_fonts() {
  wp_enqueue_style('googleFonts', '//fonts.googleapis.com/css?family=Montserrat:400,500,700|Roboto:300,400,700');
}

add_action('wp_enqueue_scripts', 'starter_fonts');

wp_enqueue_style( 'custom-styles', get_template_directory_uri() . '/library/css/custom-styles.css' );

//Call custom-styles.php
function generate_options_css() {
    $ss_dir = get_stylesheet_directory();
    ob_start(); // Capture all output into buffer
    require($ss_dir . '/inc/custom-styles.php'); // Grab the custom-style.php file
    $css = ob_get_clean(); // Store output in a variable, then flush the buffer
    file_put_contents($ss_dir . '/library/css/custom-styles.css', $css, LOCK_EX); // Save it as a css file
}
add_action( 'acf/save_post', 'generate_options_css', 20 ); //Parse the output and write the CSS file on post save

/**************
WOOCOMMERCE
***************/

/**
 * Remove the breadcrumbs
 */
add_action( 'init', 'woo_remove_wc_breadcrumbs' );
function woo_remove_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}


// Declare WooCommerce support //
function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );


/**
 * Remove and reorder product hooks
 */

 /**
  * Hook: woocommerce_single_product_summary.
  *
  * @hooked woocommerce_template_single_title - 5
  * @hooked woocommerce_template_single_rating - 10
  * @hooked woocommerce_template_single_price - 10
  * @hooked woocommerce_template_single_excerpt - 20
  * @hooked woocommerce_template_single_add_to_cart - 30
  * @hooked woocommerce_template_single_meta - 40
  * @hooked woocommerce_template_single_sharing - 50
  * @hooked WC_Structured_Data::generate_product_data() - 60
  */

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
remove_action( 'woocommerce_single_product_summary', 'WC_Structured_Data::generate_product_data()', 60 );


function custom_remove_all_quantity_fields( $return, $product ) {return true;}
add_filter( 'woocommerce_is_sold_individually','custom_remove_all_quantity_fields', 10, 2 );


add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 10 );

/* change "add to cart" button to "download now" */
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_single_add_to_cart_text' );

function woo_custom_single_add_to_cart_text() {
    return __( 'Download Now', 'woocommerce' );
}

add_filter( 'woocommerce_product_add_to_cart_text', 'woo_custom_product_add_to_cart_text' );

function woo_custom_product_add_to_cart_text() {
    return __( 'Download Now', 'woocommerce' );
}

add_filter('woocommerce_add_to_cart_redirect', 'themeprefix_add_to_cart_redirect');
function themeprefix_add_to_cart_redirect() {
  global $woocommerce;
  $checkout_url = wc_get_checkout_url();
  return $checkout_url;
}

add_filter('wc_add_to_cart_message_html', '__return_false');

function wc_billing_field_strings($translated_text, $text, $domain)
  {
    switch ($translated_text) {
      case 'Billing details':
        $translated_text = __('Your Information', 'woocommerce');
        break;
    }
    return $translated_text;
  }
  add_filter('gettext', 'wc_billing_field_strings', 20, 3);
  


// END WOOCOMMERCE


//include 'partials/custom_fields.php';

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
