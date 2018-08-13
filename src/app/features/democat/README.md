# Demo Custom Post Type Exemple
This is an custom post type implementation exemple to show you how to manage multiple template with any custom post type.

## How to add custom post type??
- create new specific angular module for each custom post type.
- create component for your custom post.
!!! You have to name your module and component as correct way to mek it work.

  Exemples:
  - `$ ng g module DemoCat` generate  `demo-cat.module.ts` <b>NO WORK</b>
  - `$ ng g module Democat` generate `democat.module.ts` <b>WORK</b>

  **Remember the right way to mek it work:**

  `$ ng g module features/Mycustomposttypetaxonomy` will generate `mycustomposttypetaxonomy.module.ts` with ` MycustomposttypetaxonomyModule` exportable Class

- add into `blog-routing.module.ts` your custom post type router endoint: 
```
      {
        path: 'mycustomposttype',
        loadChildren: '../mycustomposttype/mycustomposttype.module#MycustomposttypeModule'
      }
```

- create custom post file configuration for Wordpress into `./wordpress/inc/mycustomposttypetaxonomy.custom_post.php` with the folowing code:

```
function mycustomposttype_module() {
  $args = array(
    'label' => __('My Custom Posts Type'),
    'singular_label' => __('My Custom Post Type'),
    'public' => true,
    'show_ui' => true,
    '_builtin' => false, // It's a custom post type, not built in
    '_edit_link' => 'post.php?post=%d',
    'capability_type' => 'post',
    'hierarchical' => false,
    'rewrite' => array("slug" => "mycustomposttype"),  // !!! to lowercase !!!
    'query_var' => "mycustomposttype", // This goes to the WP_Query schema  !!! to lowercase !!!
    'supports' => array('title', 'editor', 'thumbnail') //titre + zone de texte + champs personnalisés + miniature valeur possible : 'title','editor','author','thumbnail','excerpt'
  );
  register_post_type( 'mycustomposttype' , $args ); // enregistrement de l'entité projet basé sur les arguments ci-dessus
  register_taxonomy_for_object_type('post_tag', 'mycustomposttype','show_tagcloud=1&hierarchical=true'); // ajout des mots clés pour notre custom post type
}

add_action('init', 'mycustomposttype_module');

$labelsCat1 = array(
  'name' => _x( 'mycustomposttypetaxonomy Categories', 'post type general name' ),
  'singular_name' => _x( 'mycustomposttypetaxonomy Category', 'post type singular name' ),
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
register_taxonomy("mycustomposttypetaxonomy", array("mycustomposttype"), array("hierarchical" => true, "labels" => $labelsCat1, "rewrite" => true));


add_action( 'init', 'appp_mycustomposttype_rest_support', 999 );
function appp_mycustomposttype_rest_support() {
  global $wp_post_types;
  //be sure to set this to the name of your post type!
  $post_type_name = 'mycustomposttype';
  if( isset( $wp_post_types[ $post_type_name ] ) ) {
    $wp_post_types[$post_type_name]->show_in_rest = true;
    $wp_post_types[$post_type_name]->rest_base = $post_type_name;
    $wp_post_types[$post_type_name]->rest_controller_class = 'WP_REST_Posts_Controller';
  }
}
```
- require this file into `./wordpress/functions.php`.
- create custom post file templete into `./wordpress/template-part/content-mycustomposttype.php`.
- go wordpress admin panel -> menu
- add Custom post type category to the menu