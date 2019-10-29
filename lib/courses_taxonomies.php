<?php 
/*universities custom taxonomy in COURSES post type*/
add_action( 'init', 'universities_custom_taxonomy', 0 );
 
function universities_custom_taxonomy() {
   $labels = array(
    'name' => _x( 'universities', 'taxonomy general name' ),
    'singular_name' => _x( 'university', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search universities' ),
    'all_items' => __( 'All universities' ),
    'parent_item' => __( 'Parent university' ),
    'parent_item_colon' => __( 'Parent university:' ),
    'edit_item' => __( 'Edit university' ), 
    'update_item' => __( 'Update university' ),
    'add_new_item' => __( 'Add New university' ),
    'new_item_name' => __( 'New university Name' ),
    'menu_name' => __( 'universities' ),
  );    
 
// Now register the taxonomy
 
  register_taxonomy('universities',array('courses'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'university' ),
  ));
 
}
?>