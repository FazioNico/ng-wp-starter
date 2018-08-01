<?php
# @Author: Nicolas Fazio <webmaster-fazio>
# @Date:   14-11-2017
# @Email:  contact@nicolasfazio.ch
# @Last modified by:   webmaster-fazio
# @Last modified time: 14-11-2017

/**
 * Add featured image attachment to WP API
 */
add_action( 'rest_api_init', 'add_thumbnail_to_JSON' );
function add_thumbnail_to_JSON() {
	//Add featured image
	register_rest_field('post',
    'featured_image_src_thumb', //NAME OF THE NEW FIELD TO BE ADDED - you can call this anything
    array(
        'get_callback'    => 'get_image_src_thumb',
        'update_callback' => null,
        'schema'          => null,
    )
  );
	register_rest_field('post',
    'featured_image_src_medium', //NAME OF THE NEW FIELD TO BE ADDED - you can call this anything
    array(
        'get_callback'    => 'get_image_src_medium',
        'update_callback' => null,
        'schema'          => null,
    )
  );
	register_rest_field('post',
    'featured_image_src_large', //NAME OF THE NEW FIELD TO BE ADDED - you can call this anything
    array(
        'get_callback'    => 'get_image_src_large',
        'update_callback' => null,
        'schema'          => null,
    )
  );
}
function get_image_src_thumb( $object, $field_name, $request ) {
	$feat_img_array = wp_get_attachment_image_src($object['featured_media'], 'thumbnail', true);
	return $feat_img_array[0];
}
function get_image_src_medium( $object, $field_name, $request ) {
	$feat_img_array = wp_get_attachment_image_src($object['featured_media'], 'medium', true);
	return $feat_img_array[0];
}
function get_image_src_large( $object, $field_name, $request ) {
	$feat_img_array = wp_get_attachment_image_src($object['featured_media'], 'large', true);
	return $feat_img_array[0];
}
