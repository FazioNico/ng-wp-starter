<?php
# @Author: Nicolas Fazio <webmaster-fazio>
# @Date:   08-11-2017
# @Email:  contact@nicolasfazio.ch
# @Last modified by:   webmaster-fazio
# @Last modified time: 14-11-2017

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package NG_WP_STARTER
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function ng_wp_starter_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'ng_wp_starter_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
// function ng_wp_starter_pingback_header() {
// 	if ( is_singular() && pings_open() ) {
// 		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
// 	}
// }
// add_action( 'wp_head', 'ng_wp_starter_pingback_header' );


// Add a Custom Dashboard Logo
// function wpb_custom_logo() {
//   echo '
//   <style type="text/css">
//   #wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
//     background-image: url(' . get_bloginfo('stylesheet_directory') . '/images/custom-logo.png) !important;
//     background-position: 0 0;
//     color:rgba(0, 0, 0, 0);
//   }
//   #wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
//     background-position: 0 0;
//   }
//   </style>
//   ';
// }
// add_action('wp_before_admin_bar_render', 'wpb_custom_logo');

// Change the Footer in WordPress Admin Panel
// function remove_footer_admin () {
//   echo 'YOUR_FOOTER_TXT_HERE';
// }
// add_filter('admin_footer_text', 'remove_footer_admin');
