<?php
/**
 * proshop.
 *
 * This file adds WooCommerce Customizer functions to the proshop theme.
 *
 * @package Pro_Shop
 * @author  marybaum
 * @license GPL-2.0+
 * @link    http://www.racquetpress.com/
 */

/**
 * Gets default cart icon settings for Customizer.
 *
 * @since 1.0.0
 *
 * @return int 1 for true, in order to show the icon.
 */
function proshop_customizer_get_default_cart_setting() {

	return 1;

}

add_action( 'customize_register', 'proshop_woocommerce_customizer_register' );
/**
 * Registers settings and controls with the Customizer for WooCommerce.
 *
 * @since 1.0.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function proshop_woocommerce_customizer_register( $wp_customize ) {

	// Adds control for cart option.
	$wp_customize->add_setting( 'proshop_header_cart', array(
		'default'           => proshop_customizer_get_default_cart_setting(),
		'sanitize_callback' => 'absint',
	) );

	if ( class_exists( 'WooCommerce' ) && current_theme_supports( 'woocommerce' ) ) {

		// Adds setting for cart option.
		$wp_customize->add_control( 'proshop_header_cart', array(
			'label'          => __( 'Show Header Cart Icon?', 'proshop-pro' ),
			'description'    => __( 'Check the box to show a cart icon in the header menu.', 'proshop-pro' ),
			'section'        => 'proshop_theme_options',
			'type'           => 'checkbox',
			'theme_supports' => array('woocommerce'),
			'settings'       => 'proshop_header_cart',
		) );

	}

}
