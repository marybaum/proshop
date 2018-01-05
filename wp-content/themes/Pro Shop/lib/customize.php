<?php
/**
 * Pro Shop.
 *
 * This file adds Customizer functions to the Pro Shop theme.
 *
 * @package Pro_Shop
 * @author  marybaum
 * @license GPL-2.0+
 * @link    http://www.racquetpress.com/
 */

add_action( 'customize_register', 'proshop_customizer_register' );
/**
 * Register settings and controls with the Customizer.
 *
 * @since 2.2.3
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function proshop_customizer_register( $wp_customize ) {

	$wp_customize->add_setting(
		'proshop_link_color',
		array(
			'default'           => proshop_customizer_get_default_link_color(),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'proshop_link_color',
			array(
				'description' => __( 'Change the color of post info links, hover color of linked titles, hover color of menu items, and more.', 'proshop' ),
				'label'       => __( 'Link Color', 'proshop' ),
				'section'     => 'colors',
				'settings'    => 'proshop_link_color',
			)
		)
	);

	$wp_customize->add_setting(
		'proshop_accent_color',
		array(
			'default'           => proshop_customizer_get_default_accent_color(),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'proshop_accent_color',
			array(
				'description' => __( 'Change the default hovers color for button.', 'proshop' ),
				'label'       => __( 'Accent Color', 'proshop' ),
				'section'     => 'colors',
				'settings'    => 'proshop_accent_color',
			)
		)
	);

}
