<?php
# @Author: Nicolas Fazio <webmaster-fazio>
# @Date:   20-11-2017
# @Email:  contact@nicolasfazio.ch
# @Last modified by:   webmaster-fazio
# @Last modified time: 20-11-2017

/**
 * Custom Post Type Demo Exemple
 * See ./src/app/democat/README.md
 * for more infos about custom post type
 */
function demo_module() {
  $args = array(
    'label' => __('Demos'),
    'singular_label' => __('Demo'),
    'public' => true,
    'show_ui' => true,
    '_builtin' => false, // It's a custom post type, not built in
    '_edit_link' => 'post.php?post=%d',
    'capability_type' => 'post',
    'hierarchical' => false,
    'rewrite' => array("slug" => "demos"), // need to be lowercase !!!!
    'query_var' => "demos", // This goes to the WP_Query schema // need to be lowercase !!!!
    'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'author') //titre + zone de texte + champs personnalisés + miniature valeur possible : 'title','editor','author','thumbnail','excerpt'
  );
  register_post_type( 'demo' , $args ); // enregistrement de l'entité projet basé sur les arguments ci-dessus
  register_taxonomy_for_object_type('post_tag', 'demo','show_tagcloud=1&hierarchical=true'); // ajout des mots clés pour notre custom post type
}

add_action('init', 'demo_module');

$labelsCat1 = array(
  'name' => _x( 'Demos Categories', 'post type general name' ),
  'singular_name' => _x( 'Demo Category', 'post type singular name' ),
  'add_new' => _x( 'Add New', 'demo' ),
  'add_new_item' => __( 'Add demo' ),
  'edit_item' => __( 'Update demo' ),
  'new_item' => __( 'New demo' ),
  'view_item' => __( 'View demo' ),
  'search_items' => __( 'Search demo' ),
  'not_found' =>  __( 'Demo not found' ),
  'not_found_in_trash' => __( 'Demo not found' ),
  'parent_item_colon' => ''
);
register_taxonomy(
  "demos", // need to be lowercase !!!!
  array("demo"),
  array("hierarchical" => true,
  "labels" => $labelsCat1,
  "rewrite" => true)
);


add_action( 'init', 'appp_demo_rest_support', 999 );
function appp_demo_rest_support() {
  global $wp_post_types;
  //be sure to set this to the name of your post type!
  $post_type_name = 'demo';
  if( isset( $wp_post_types[ $post_type_name ] ) ) {
    $wp_post_types[$post_type_name]->show_in_rest = true;
    $wp_post_types[$post_type_name]->rest_base = $post_type_name;
    $wp_post_types[$post_type_name]->rest_controller_class = 'WP_REST_Posts_Controller';
  }
}
