<?php 
/*universities custom taxonomy in COURSES post type*/
add_action( 'init', 'schools_custom_taxonomy', 0 );
 
function schools_custom_taxonomy() {
   $labels = array(
    'name' => _x( 'schools', 'taxonomy general name' ),
    'singular_name' => _x( 'school', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search schools' ),
    'all_items' => __( 'All schools' ),
    'parent_item' => __( 'Parent school' ),
    'parent_item_colon' => __( 'Parent school:' ),
    'edit_item' => __( 'Edit school' ), 
    'update_item' => __( 'Update school' ),
    'add_new_item' => __( 'Add New school' ),
    'new_item_name' => __( 'New school Name' ),
    'menu_name' => __( 'Schools' ),
  );    
 
// Now register the taxonomy
 
  register_taxonomy('schools',array('courses'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'school' ),
  ));
 
}
?>