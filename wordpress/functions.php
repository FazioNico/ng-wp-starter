<?php
# @Author: Nicolas Fazio <webmaster-fazio>
# @Date:   07-11-2017
# @Email:  contact@nicolasfazio.ch
# @Last modified by:   webmaster-fazio
# @Last modified time: 20-11-2017

/**
 * NG WP STARTER functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package NG_WP_STARTER
 */

if ( ! function_exists( 'ng_wp_starter_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ng_wp_starter_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on NG WP STARTER, use a find and replace
		 * to change 'ng-wp-starter' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ng-wp-starter', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		// register_nav_menus( array(
		// 	'menu-1' => esc_html__( 'Primary', 'ng-wp-starter' ),
		// ) );
		register_nav_menus( array(
		  'primary' => esc_html__( 'Primary', 'primary' ),
		) );
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		// add_theme_support( 'custom-background', apply_filters( 'ng_wp_starter_custom_background_args', array(
		// 	'default-color' => 'ffffff',
		// 	'default-image' => '',
		// ) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		// add_theme_support( 'custom-logo', array(
		// 	'height'      => 250,
		// 	'width'       => 250,
		// 	'flex-width'  => true,
		// 	'flex-height' => true,
		// ) );
	}
endif;
add_action( 'after_setup_theme', 'ng_wp_starter_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ng_wp_starter_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ng_wp_starter_content_width', 640 );
}
add_action( 'after_setup_theme', 'ng_wp_starter_content_width', 0 );

// /**
//  * Register widget area.
//  *
//  * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
//  */
// function ng_wp_starter_widgets_init() {
// 	register_sidebar( array(
// 		'name'          => esc_html__( 'Sidebar', 'ng-wp-starter' ),
// 		'id'            => 'sidebar-1',
// 		'description'   => esc_html__( 'Add widgets here.', 'ng-wp-starter' ),
// 		'before_widget' => '<section id="%1$s" class="widget %2$s">',
// 		'after_widget'  => '</section>',
// 		'before_title'  => '<h2 class="widget-title">',
// 		'after_title'   => '</h2>',
// 	) );
// }
// add_action( 'widgets_init', 'ng_wp_starter_widgets_init' );


            // stop wp removing div tags
remove_filter( 'the_content', 'wpautop' );

/**
 * Enqueue scripts and styles.
 */
function ng_wp_starter_scripts() {
	// rmv jquery
	wp_deregister_script('jquery');

	wp_enqueue_style( 'ng-wp-starter-style', get_stylesheet_uri() );
	wp_enqueue_script( 'ng-wp-starter-inline', get_template_directory_uri() . '/js/inline.bundle.js', array(), '',true );
	wp_enqueue_script( 'ng-wp-starter-polyfills', get_template_directory_uri() . '/js/polyfills.bundle.js', array(), '',true );
	wp_enqueue_script( 'ng-wp-starter-main', get_template_directory_uri() . '/js/main.bundle.js', array(), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ng_wp_starter_scripts' );


/**
 * Clean wp_head
 */
 require get_template_directory() . '/inc/clean_wp_head.php';
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';
// function override_tinymce_option($initArray) {
//     $opts = '*[*], a[*]';
//     $initArray['valid_elements'] = $opts;
//     $initArray['extended_valid_elements'] = $opts;
//     return $initArray;
// }
// add_filter('tiny_mce_before_init', 'override_tinymce_option');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Require custom WP API Theming.
 */
require get_template_directory() . '/inc/wp-api.php';

/**
 * Require demo custompost type
 */
require get_template_directory() . '/inc/demo.custom_post.php';

/**
 * Customizer additions.
 */
// require get_template_directory() . '/inc/customizer.php';

// /**
//  * Load Jetpack compatibility file.
//  */
// if ( defined( 'JETPACK__VERSION' ) ) {
// 	require get_template_directory() . '/inc/jetpack.php';
// }

/* display all post_type in $WP_Query */
function add_custom_post_type_to_wp_query($query) {
    if(
        empty($query->query['post_type'])
        or $query->query['post_type'] === 'post'
    ){
        $query->set('post_type', array('post_type' => 'any'));
    }
}
add_action('pre_get_posts', 'add_custom_post_type_to_wp_query');


/// Bof - Remove Tags prefix in the_archive_title and more...
add_filter( 'get_the_archive_title', function ($title) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    }
		elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    }
		elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>' ;
    }
    return $title;
});
/// Eof - Remove Tags prefix
