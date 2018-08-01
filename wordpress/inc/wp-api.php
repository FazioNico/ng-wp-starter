<?php
# @Author: Nicolas Fazio <webmaster-fazio>
# @Date:   14-11-2017
# @Email:  contact@nicolasfazio.ch
# @Last modified by:   webmaster-fazio
# @Last modified time: 19-11-2017



/**
 * Add featured image attachment to WP API
 */
require get_template_directory() . '/inc/featured_attachment.php';

/**
 * Fetch additional author information.
 */
function wp_api_theming_get_author_info( $object ) {
	// Grab the author's raw data.
	$author = get_userdata( $object['author'] );
	// Return only what we want.
	return array(
		'id'      => $author->ID,
		'archive_link' => get_author_posts_url( $author->ID ),
		'name'    => $author->data->display_name,
	);
}
/**
 * Return the post classes for a given post or page.
 */
function wp_api_theming_get_post_classes( $object ) {
	return get_post_class( '', $object['id'] );
}
/**
 * Get categories for a given post or page.
 */
function wp_api_theming_get_post_categories( $object ) {
	return wp_api_theming_get_post_terms( $object['id'] );
}
/**
 * Get tags for a given post or page.
 */
function wp_api_theming_get_post_tags( $object ) {
	return wp_api_theming_get_post_terms( $object['id'], 'post_tag' );
}
/**
 * Get a post's terms with archive links.
 */
function wp_api_theming_get_post_terms( $id = false, $taxonomy = 'category' ) {
	// We need an ID for this one.
	if ( ! $id ) {
		return false;
	}
	// Validate the taxonomy argument.
	$valid_tax = apply_filters( 'wp_api_theming_valid_tax', array( 'category', 'post_tag' ) );
	$taxonomy = ( in_array( $taxonomy, $valid_tax ) ) ? $taxonomy : 'category';
	// Fetch our terms.
	$terms = wp_get_post_terms( absint( $id ), $taxonomy );
	if ( ! is_wp_error( $terms ) && ! empty( $terms ) ) {
		// Append a link property to each term.
		foreach ( $terms as $term ) {
			$link = get_term_link( $term );
			$term->link = $link;
		}
	}
	return $terms;
}

// get all wp configuration with menu navigation
function register_Config(){
    /*
    * add our configuration to the main script.
    */
    $config = array(
        'template_directory' => get_template_directory(),
        'site_url' => get_option('siteurl'),
        'site_title' => get_option('blogname'),
        'site_description' => get_option('blogdescription'),
        'front_id' => get_option('page_on_front'),
        'home_id' => get_option('page_for_posts'),
        'admin_email' => get_option('admin_email'),
        'menu' => get_menu(),
        // 'categories' => getCategories()
    );
		return $config;
    // wp_localize_script('ng-wp-starter-main', 'app_config', $config);
}

/**
* Add menu endpoint to wp api
*/
function get_menu() {
  # Change 'menu' to your own navigation slug.
  return wp_get_nav_menu_items('primary');
}

function check_ishomeXXX() {
	global $wp_query;
  # Change 'menu' to your own navigation slug.
  print_r(!is_home());
  return $wp_query->is_home();
}
function check_isFrontPage( $object ) {
	$a = $object['id'];
	$b = get_option('page_on_front');
	return ($a == $b)?true:false;
}
function check_isHomePage( $object ) {
	$a = $object['id'];
	$b = get_option('page_for_posts');
	return ($a == $b)?true:false;

}
// add function to wp-api
add_action( 'rest_api_init', function () {
  // add Menu endpoint
  register_rest_route( 'wp/v2', '/menu', array(
    'methods' => 'GET',
    'callback' => 'get_menu',
  ));
	// Add wp config endpoint (with menu endpoint)
	register_rest_route( 'wp/v2', '/config', array(
    'methods' => 'GET',
    'callback' => 'register_Config'
  ));
  // Add more detailed author info.
	register_rest_field( array( 'post', 'page' ), 'author', array(
		'schema'       => array(
			'type'        => 'array',
			'description' => 'Detailed author information.',
			'context'     => array( 'view' ),
		),
		'get_callback' => 'wp_api_theming_get_author_info',
	) );
	// Add the post_classes property.
	register_rest_field( array( 'post', 'page' /*, 'YOUR_CUSTOM_POST_TYPE_'*/ ), 'post_classes', array(
		'schema'       => array(
			'type'        => 'array',
			'description' => 'Classes for an individual post or page, determined by post_class().',
			'context'     => array( 'view' ),
		),
		'get_callback' => 'wp_api_theming_get_post_classes',
	) );
	// Add the categories property.
	register_rest_field( array( 'post', 'page'/*, 'YOUR_CUSTOM_POST_TYPE_'*/  ), 'categories', array(
		'schema'       => array(
			'type'        => 'array',
			'description' => 'Categories for an individual post or page.',
			'context'     => array( 'view' ),
		),
		'get_callback' => 'wp_api_theming_get_post_categories',
	) );
	// Add the tags property.
	register_rest_field( array( 'post', 'page' ), 'tags', array(
		'schema'       => array(
			'type'        => 'array',
			'description' => 'Tags for an individual post or page.',
			'context'     => array( 'view' ),
		),
		'get_callback' => 'wp_api_theming_get_post_tags',
	) );


	register_rest_field( array( 'post', 'page' ), 'is_front', array(
		'schema'       => array(
			'type'        => 'array',
			'description' => 'check if is home page.',
			'context'     => array( 'view' ),
		),
		'get_callback' => 'check_isFrontPage',
	) );
	register_rest_field( array( 'post', 'page' ), 'is_home', array(
		'schema'       => array(
			'type'        => 'array',
			'description' => 'check if is home page.',
			'context'     => array( 'view' ),
		),
		'get_callback' => 'check_isHomePage',
	) );
  // register_rest_route( 'wp/v2', 'get-by-slug', array(
  //   'methods' => 'GET',
  //   'callback' => 'my_theme_get_content_by_slug',
  //   'args' => array(
  //     'slug' => array (
  //       'required' => false
  //     )
  //   )
  // ));
});

// Add filter posts query by categorie name
add_filter( "rest_post_query", function( $args, $request){
                if ( isset( $request['category_name']) && !empty($request['category_name'] ) ) {
                    $args['category_name'] = $request['category_name'];
                }
                return $args;
            }, 10, 2);

// Add filter posts collection by categorie name
add_filter( "rest_post_collection_params", function($query_params, $post_type){
                $query_params[ 'category_name' ] = array(
                    'description' => __( 'Category name.' ),
                    'type'        => 'string',
                    'readonly'    => true,
                );
                return $query_params;
            }, 10, 2);
