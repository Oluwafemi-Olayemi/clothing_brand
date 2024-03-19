<?php
/**
 * homefinder WooCommerce hooks
 *
 * @package homefinder
 */

add_action('woocommerce_register_form_start', 'xstriz_woocommerce_set_register_text', 10);
//add_filter('wp_nav_menu_items', 'xstriz_woocommerce_add_woo_cart_to_nav', 12, 3);
// woocommerce_no_products_found

add_action('woocommerce_no_products_found', 'xstriz_active_filters', 20);

/**
 * Styles
 *
 * @see  xstriz_woocommerce_scripts()
 */
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
add_action('woocommerce_before_main_content', 'xstriz_before_content', 10);
add_action('woocommerce_after_main_content', 'xstriz_after_content', 10);
add_action('xstriz_content_top', 'xstriz_shop_messages', 15);
add_action('xstriz_content_top', 'woocommerce_breadcrumb', 10);

add_action('woocommerce_after_shop_loop', 'xstriz_product_columns_wrapper_close', 40);

add_filter('loop_shop_columns', 'xstriz_loop_columns');


remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action('woocommerce_before_shop_loop_item_title', 'xstriz_template_loop_product_thumbnail', 10);


add_action('woocommerce_before_shop_loop', 'xstriz_sorting_wrapper', 1);
add_action('woocommerce_before_shop_loop', 'xstriz_sorting_group', 1);
if (!is_active_sidebar('sidebar-woocommerce-shop-filters') || get_theme_mod('xstriz_woocommerce_archive_filter_position', 'left') === 'none') {
    add_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 2);
}
add_action('woocommerce_before_shop_loop', 'xstriz_sorting_group_close', 3);
add_action('woocommerce_before_shop_loop', 'xstriz_sorting_group', 5);
add_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 7);
add_action('woocommerce_before_shop_loop', 'xstriz_sorting_group_close', 7);
add_action('woocommerce_before_shop_loop', 'xstriz_sorting_wrapper_close', 7);
//add_action('woocommerce_before_shop_loop', 'xstriz_active_filters', 8);

//Recently Viewed Product
add_action('wp_footer', 'otf_woocommerce_recently_viewed_product', 1);

// Breadcrumb
//add_action('woocommerce_single_product_summary', 'xstriz_woocommerce_single_breadcrumb', 4);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);

add_action('woocommerce_single_product_summary', 'xstriz_woocommerce_single_product_summary_inner_start', -1);
add_action('woocommerce_single_product_summary', 'xstriz_woocommerce_single_product_summary_inner_end', 99999);

add_action('woocommerce_single_product_summary', 'xstriz_woocommerce_single_deal', 25);

$product_single_tab_style = get_theme_mod('xstriz_woocommerce_single_product_tab_style', 'tab');
if ($product_single_tab_style == 'accordion') {
    remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
    add_action('woocommerce_after_single_product_summary', 'xstriz_output_product_data_accordion', 10);
}

// Wishlist
add_action('woocommerce_single_product_summary', 'xstriz_woocommerce_product_loop_wishlist_button', 45);

// Compare
add_action('woocommerce_single_product_summary', 'xstriz_woocommerce_product_loop_compare_button', 45);

// Support lightbox
add_action('after_setup_theme', array(xstriz_WooCommerce::getInstance(), 'add_support_gallery_all'));

//Single video
add_action('woocommerce_product_thumbnails', 'xstriz_single_product_video', 30);

//Social
add_action('woocommerce_single_product_summary', 'xstriz_single_product_social', 50);


if (defined('WC_VERSION') && version_compare(WC_VERSION, '2.3', '>=')) {
    add_filter('woocommerce_add_to_cart_fragments', 'xstriz_cart_link_fragment');
} else {
    add_filter('add_to_cart_fragments', 'xstriz_cart_link_fragment');
}

/**
 * Checkout Page
 *
 * @see xstriz_checkout_before_customer_details_container
 * @see xstriz_checkout_after_customer_details_container
 * @see xstriz_checkout_after_order_review_container
 */

add_action('woocommerce_checkout_before_customer_details', 'xstriz_checkout_before_customer_details_container', 1);
add_action('woocommerce_checkout_after_customer_details', 'xstriz_checkout_after_customer_details_container', 1);
add_action('woocommerce_checkout_after_order_review', 'xstriz_checkout_after_order_review_container', 1);
add_action('woocommerce_checkout_order_review', 'xstriz_woocommerce_order_review_heading', 1);


/**
 * Remove Action
 */
remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
add_action('woocommerce_after_single_product_summary', 'xstriz_upsell_display', 15);
add_action('woocommerce_after_single_product_summary', 'xstriz_output_related_products', 20);


// Cart Page
remove_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');
add_action('xstriz_after_form_cart', 'xstriz_woocommerce_cross_sell_display');

// Layout Product
function xstriz_include_hooks_product_blocks() {
    $product_style = get_theme_mod('xstriz_woocommerce_product_style', 1);
    switch ($product_style) {
        case 2:
            remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
            remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
            remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
            remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
            remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);

            add_action('woocommerce_before_shop_loop_item', 'xstriz_woocommerce_product_loop_start', -1);
            add_action('woocommerce_after_shop_loop_item', 'xstriz_woocommerce_product_loop_end', 999);
            add_action('woocommerce_before_shop_loop', 'xstriz_product_columns_wrapper', 40);
            add_action('woocommerce_before_shop_loop_item_title', 'xstriz_woocommerce_product_loop_image_start', 5);

            add_action('woocommerce_before_shop_loop_item_title', 'xstriz_woocommerce_product_loop_image_end', 100);
            add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 99);
            add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 99);
            add_action('woocommerce_shop_loop_item_title', 'xstriz_woocommerce_product_loop_caption_start', 0);
            add_action('woocommerce_shop_loop_item_title', 'xstriz_woocommerce_product_loop_label_start', 0);
            add_action('woocommerce_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 1);
            add_action('woocommerce_shop_loop_item_title', 'xstriz_woocommerce_product_loop_label_end', 9);
            add_action('woocommerce_shop_loop_item_title', 'xstriz_woocommerce_product_loop_action_start', 15);
            add_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 20);
            add_action('woocommerce_shop_loop_item_title', 'xstriz_woocommerce_product_loop_action_end', 50);
            add_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 50);
            add_action('woocommerce_shop_loop_item_title', 'xstriz_woocommerce_get_product_category', 60);
            add_action('woocommerce_after_shop_loop_item_title', 'xstriz_woocommerce_product_loop_caption_end', 99);

            // QuickView
            if (xstriz_is_woocommerce_extension_activated('YITH_WCQV')) {
                remove_action('woocommerce_after_shop_loop_item', array(YITH_WCQV_Frontend::get_instance(), 'yith_add_quick_view_button'), 15);
                add_action('woocommerce_shop_loop_item_title', array(YITH_WCQV_Frontend::get_instance(), 'yith_add_quick_view_button'), 35);
            }

            // Wishlist
            add_action('woocommerce_shop_loop_item_title', 'xstriz_woocommerce_product_loop_wishlist_button', 25);

            // Compare
            add_action('woocommerce_shop_loop_item_title', 'xstriz_woocommerce_product_loop_compare_button', 30);

            break;

        default:
            remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
            remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
            remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
            remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
            remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);

            add_action('woocommerce_before_shop_loop_item', 'xstriz_woocommerce_product_loop_start', -1);
            add_action('woocommerce_after_shop_loop_item', 'xstriz_woocommerce_product_loop_end', 999);
            add_action('woocommerce_before_shop_loop', 'xstriz_product_columns_wrapper', 40);
            add_action('woocommerce_before_shop_loop_item_title', 'xstriz_woocommerce_product_loop_image_start', 5);
            add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 7);
            add_action('woocommerce_before_shop_loop_item_title', 'xstriz_woocommerce_time_sale', 10);

            add_action('woocommerce_before_shop_loop_item_title', 'xstriz_woocommerce_product_loop_image_end', 100);
            add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 99);
            add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 99);
            add_action('woocommerce_shop_loop_item_title', 'xstriz_woocommerce_product_loop_caption_start', 0);
            add_action('woocommerce_shop_loop_item_title', 'xstriz_woocommerce_product_loop_group_transititon_start', 0);
            //add_action('woocommerce_shop_loop_item_title', 'xstriz_woocommerce_render_variable_size', 0);
            add_action('woocommerce_shop_loop_item_title', 'xstriz_woocommerce_product_loop_label_start', 0);
            add_action('woocommerce_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 1);
            add_action('woocommerce_shop_loop_item_title', 'xstriz_woocommerce_get_product_label_stock', 5);
            add_action('woocommerce_shop_loop_item_title', 'xstriz_woocommerce_product_loop_label_end', 9);
            add_action('woocommerce_shop_loop_item_title', 'xstriz_woocommerce_product_loop_action_start', 15);
            add_action('woocommerce_shop_loop_item_title', 'xstriz_woocommerce_product_loop_action_end', 50);
            add_action('woocommerce_shop_loop_item_title', 'xstriz_woocommerce_product_loop_group_transititon_end', 50);
            add_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 50);
            add_action('woocommerce_shop_loop_item_title', 'xstriz_woocommerce_get_product_category', 60);
            add_action('woocommerce_after_shop_loop_item_title', 'xstriz_woocommerce_product_loop_caption_end', 99);



            // QuickView
            if (xstriz_is_woocommerce_extension_activated('YITH_WCQV')) {
                remove_action('woocommerce_after_shop_loop_item', array(YITH_WCQV_Frontend::get_instance(), 'yith_add_quick_view_button'), 15);
                add_action('woocommerce_shop_loop_item_title', array(YITH_WCQV_Frontend::get_instance(), 'yith_add_quick_view_button'), 35);
            }

            // Wishlist
            add_action('woocommerce_shop_loop_item_title', 'xstriz_woocommerce_product_loop_wishlist_button', 25);

            // Compare
            add_action('woocommerce_shop_loop_item_title', 'xstriz_woocommerce_product_loop_compare_button', 30);
            break;
    }

}

if (isset($_GET['action']) && $_GET['action'] === 'elementor') {
    return;
}
xstriz_include_hooks_product_blocks();

function xstriz_update_setting_yith_plugin() {
    if (get_option('yith_woocompare_compare_button_in_product_page') == 'yes') update_option('yith_woocompare_compare_button_in_product_page', 'no');
    if (get_option('yith_woocompare_compare_button_in_products_list') == 'yes') update_option('yith_woocompare_compare_button_in_products_list', 'no');
    if(get_option('yith_wcwl_button_position') != 'shortcode') update_option('yith_wcwl_button_position', 'shortcode');
}

add_action('yit_framework_after_print_wc_panel_content', 'xstriz_update_setting_yith_plugin');