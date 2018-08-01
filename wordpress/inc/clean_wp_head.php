<?php
# @Author: Nicolas Fazio <webmaster-fazio>
# @Date:   14-11-2017
# @Email:  contact@nicolasfazio.ch
# @Last modified by:   webmaster-fazio
# @Last modified time: 14-11-2017

/**
* Clean wp_head
*/

// Remove WordPress Version Number
remove_action('wp_head', 'wp_generator');

// remove Really Simple Discovery
remove_action('wp_head', 'rsd_link');

// Remove Windows Live Writer
remove_action('wp_head', 'wlwmanifest_link');

// remove Post Relational Links
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link');

// Remove shortlink
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Remove emoji script & style
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

 // Display the links to the extra feeds such as category feeds
remove_action( 'wp_head', 'feed_links_extra', 3 );

 // Display the links to the general feeds: Post and Comment Feed
remove_action( 'wp_head', 'feed_links', 2 );

// remove application/ld+json from yoast
add_filter('wpseo_json_ld_output', '__return_true');

// Remove the REST API lines from the HTML Header
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );

// Remove oEmbed discovery links.
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );

// Remove oEmbed-specific JavaScript from the front-end and back-end.
remove_action( 'wp_head', 'wp_oembed_add_host_js' );

 // Remove the REST API endpoint.
remove_action( 'rest_api_init', 'wp_oembed_register_route' );

// Turn off oEmbed auto discovery.
add_filter( 'embed_oembed_discover', '__return_false' ); // Turn off oEmbed auto discovery.

// Don't filter oEmbed results.
remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );

// Remove all embeds rewrite rules.
//add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );

// remove login error display
add_filter('login_errors',create_function('$a', "return null;"));
