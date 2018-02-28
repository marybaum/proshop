<?php
/**
 * proshop.
 *
 * This file adds WooCommerce functions to the proshop theme.
 *
 * @author   WooThemes
 * @category Core
 * @package  WooCommerce/Functions
 */

add_action( 'wp_enqueue_scripts', 'proshop_woocommerce_scripts' );
/**
 * Adds WooCommerce Scripts.
 *
 * @since 1.0.0
 */
function proshop_woocommerce_scripts() {

	if ( class_exists( 'WooCommerce' ) && current_theme_supports( 'woocommerce' ) ) {
		wp_enqueue_script( 'proshop-woocommerce', get_stylesheet_directory_uri() . '/lib/woocommerce/js/proshop-woocommerce.js', array( 'jquery' ), '1.0.0', true );
	}

}

add_action( 'wp_enqueue_scripts', 'proshop_products_match_height', 99 );
/**
 * Prints an inline script to the footer to keep products the same height.
 *
 * @since 1.0.0
 */
function proshop_products_match_height() {

	// If WooCommerce isn't active or not on a WooCommerce page, exits early.
	if ( ! class_exists( 'WooCommerce' ) || ! is_shop() && ! is_woocommerce() && ! is_cart() ) {
		return;
	}

	wp_add_inline_script( 'proshop-match-height', "jQuery(document).ready( function() { jQuery( '.product .woocommerce-LoopProduct-link').matchHeight(); });" );

}

/**
 * Outputs the WooCommerce cart button.
 *
 * @return string HTML output of the Show Cart button.
 *
 * @since 1.0.0
 */
function proshop_get_off_screen_cart_toggle() {

	global $woocommerce;
	$cartcount = $woocommerce->cart->cart_contents_count;

	return '<a href="#" class="toggle-off-screen-cart"><span class="screen-reader-text">' . __( 'Show Shopping Cart', 'proshop' ) . '</span> <span class="ionicons ion-android-cart"></span><span class="cart-count">' . $cartcount . '</span></a>';

}

// Adds Mini Cart.
add_action( 'genesis_after_header', 'proshop_off_screen_woocommerce_cart_output' );
function proshop_off_screen_woocommerce_cart_output( $args = array() ) {

	if ( class_exists( 'WooCommerce' ) && current_theme_supports( 'woocommerce' )  && ( ! WC()->cart->is_empty() ) ) {

		$button = '<button class="toggle-off-screen-cart close">
					<span class="screen-reader-text">' .
		            __( 'Hide Shopping Cart', 'proshop' ) . '</span> 
					<span class="ionicons ion-android-close"></span>
					</button>';

		echo '<div class="off-screen-content off-screen-cart">
				<div class="off-screen-container">
				<div class="off-screen-wrapper"><div class="wrap">
					<section class="widget woocommerce widget_shopping_cart">';

		$defaults = array(
			'list_class' => '',
		);

		$args = wp_parse_args( $args, $defaults );

		wc_get_template( 'cart/mini-cart.php', $args );

		echo '</section></div>' . $button . '</div></div></div>';

	}

}

// Function to print a cart icon menu item.
function proshop_do_woocommerce_cart_icon() {

	printf( '<li class="menu-item menu-item-has-toggle cart-item">%s</li>', proshop_get_off_screen_cart_toggle() );

}

// Adds product-has-gallery class to products that have a gallery.
add_filter( 'post_class', 'product_has_gallery' );
function product_has_gallery( $classes ) {

	global $product;

	$post_type = get_post_type( get_the_ID() );

	if ( ! is_admin() ) {

		if ( $post_type == 'product' ) {

			$attachment_ids = $product->get_gallery_image_ids();

			if ( $attachment_ids ) {
				$classes[] = 'product-has-gallery';
			}
		}

	}

	return $classes;

}

/*
 * Comment out the whole block if no second thumbnail.
 *
 */
/*
// Displays the second thumbnails for products.
add_action( 'woocommerce_before_shop_loop_item_title', 'product_woocommerce_second_product_thumbnail', 11 );
function product_woocommerce_second_product_thumbnail() {

	global $product, $woocommerce;

	$attachment_ids = $product->get_gallery_image_ids();

	if ( $attachment_ids ) {
		$secondary_image_id = $attachment_ids['0'];
		echo wp_get_attachment_image( $secondary_image_id, 'shop_catalog', '', $attr = array( 'class' => 'secondary-image attachment-shop-catalog' ) );
	}

}
*/



