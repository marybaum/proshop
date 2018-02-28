<?php
/**
 * This is the front page of the proshop theme.
 * @author: marybaum
 * Date: 10/7/17
 * @package Customizations
 * @subpackage Home
 *
 */

//* racquetgrid custom body class
function proshop_add_body_class( $classes ) {
	$classes[] = 'rg';
	return $classes;
}

//* Add widget support for homepage
add_action( 'genesis_meta' , 'proshop_front_page_genesis_meta');
function proshop_front_page_genesis_meta() {

	if( is_home() )  {


		//* Are there active widgets?
		if( is_active_sidebar( 'homegrid1' ) || is_active_sidebar( 'homegrid2' ) || is_active_sidebar( 'homegrid3' ) || is_active_sidebar( 'homegrid4' ) || is_active_sidebar( 'homegrid5' ) ) {

			//* Remove Genesis loop
			remove_action( 'genesis_loop' , 'genesis_do_loop' );

			//* Add Home featured widget areas.
			add_action( 'genesis_before_content_sidebar_wrap' , 'proshop_home_featured', 15 );

		}

	}

//* Add home-widgets markup. You probably will never need all five, but what the hey.
function proshop_home_featured() {

	echo '<div class="homewidgets">';

	genesis_widget_area( 'homegrid1' , array(
		'before' => '<div class="homegrid1 widget-area">',
		'after' => '</div>',
	) );

	genesis_widget_area( 'homegrid2' , array(
		'before' => '<div class="homegrid2 widget-area">',
		'after' => '</div>',
	) );

	genesis_widget_area( 'homegrid3' , array(
		'before' => '<div class="homegrid3 widget-area">',
		'after' => '</div>',
	) );

	genesis_widget_area( 'homegrid4' , array(
		'before' => '<div class="homegrid4 widget-area">',
		'after' => '</div>',
	) );

	genesis_widget_area( 'homegrid5' , array(
		'before' => '<div class="homegrid5 widget-area">',
		'after' => '</div>',
	) );

	echo "</div>";

}

}

genesis();
