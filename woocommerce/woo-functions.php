<?php
// WOOCOMMERCE

// Remove the breadcrumbs
add_action('init', 'woo_remove_wc_breadcrumbs');
function woo_remove_wc_breadcrumbs()
{
    remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
}


// Declare WooCommerce support //
function mytheme_add_woocommerce_support()
{
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'mytheme_add_woocommerce_support');


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

remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);
remove_action('woocommerce_single_product_summary', 'WC_Structured_Data::generate_product_data()', 60);


function custom_remove_all_quantity_fields($return, $product)
{
    return true;
}
add_filter('woocommerce_is_sold_individually', 'custom_remove_all_quantity_fields', 10, 2);


add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 10);

/* change "add to cart" button to "download now" */
add_filter('woocommerce_product_single_add_to_cart_text', 'woo_custom_single_add_to_cart_text');

function woo_custom_single_add_to_cart_text()
{
    return __('Download Now', 'woocommerce');
}

add_filter('woocommerce_product_add_to_cart_text', 'woo_custom_product_add_to_cart_text');

function woo_custom_product_add_to_cart_text()
{
    return __('Download Now', 'woocommerce');
}

add_filter('woocommerce_add_to_cart_redirect', 'themeprefix_add_to_cart_redirect');
function themeprefix_add_to_cart_redirect()
{
    global $woocommerce;
    $checkout_url = wc_get_checkout_url();
    return $checkout_url;
}

add_filter('wc_add_to_cart_message_html', '__return_false');

function custom_wc_translations($translated)
{
    $text = array(
        'Your order' => 'Your guide',
        'Billing details' => 'Complete this form to get your free guide.',
        'Additional information' => 'Disclaimer',
        'Place order' => 'Download Now',
    );
    $translated = str_ireplace(array_keys($text), $text, $translated);
    return $translated;
}

add_filter('gettext', 'custom_wc_translations', 20);


// END WOOCOMMERCE