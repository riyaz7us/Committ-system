<?php 
// Country custom taxonomy for university post types
add_action( 'init', 'Countries_custom_taxonomy', 0 );
 
 
function Countries_custom_taxonomy() {
   $labels = array(
    'name' => _x( 'Countries', 'taxonomy general name' ),
    'singular_name' => _x( 'Country', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Countries' ),
    'all_items' => __( 'All Countries' ),
    'parent_item' => __( 'Parent Country' ),
    'parent_item_colon' => __( 'Parent Country:' ),
    'edit_item' => __( 'Edit Country' ), 
    'update_item' => __( 'Update Country' ),
    'add_new_item' => __( 'Add New Country' ),
    'new_item_name' => __( 'New Country Name' ),
    'menu_name' => __( 'Countries' ),
  );    
 
// Now register the taxonomy
 
  register_taxonomy('Countries',array('universities','courses'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'Country' ),
  ));
 
}
 ?>