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
 
  register_taxonomy('schools',array('courses','product'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'school' ),
  ));
 
}

/*level custom taxonomy in COURSES post type*/
add_action( 'init', 'level_custom_taxonomy', 0 );
 
function level_custom_taxonomy() {
   $labels = array(
    'name' => _x( 'levels', 'taxonomy general name' ),
    'singular_name' => _x( 'level', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search levels' ),
    'all_items' => __( 'All levels' ),
    'parent_item' => __( 'Parent level' ),
    'parent_item_colon' => __( 'Parent level:' ),
    'edit_item' => __( 'Edit level' ), 
    'update_item' => __( 'Update level' ),
    'add_new_item' => __( 'Add New level' ),
    'new_item_name' => __( 'New level Name' ),
    'menu_name' => __( 'levels' ),
  );    
 
// Now register the taxonomy
 
  register_taxonomy('level',array('courses','product'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'level' ),
  ));
 
}
?>