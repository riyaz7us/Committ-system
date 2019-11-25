<?php 
/*Custom Post type :: Universities */

function universities_post_type() {
$supports = array(
'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields', 'comments', 'revisions', 'post-formats', 
);

$labels = array(
'name' => _x('universities', 'plural'),
'singular_name' => _x('university', 'singular'),
'menu_name' => _x('universities', 'admin menu'),
'name_admin_bar' => _x('universities', 'admin bar'),
'add_new' => _x('Add New', 'add new'),
'add_new_item' => __('Add New university'),
'new_item' => __('New university'),
'edit_item' => __('Edit university'),
'view_item' => __('View university'),
'all_items' => __('All universities'),
'search_items' => __('Search university'),
'not_found' => __('No university found.'),
);

$args = array(
'supports' => $supports,
'labels' => $labels,
'public' => true,
'query_var' => true,
'rewrite' => array('slug' => 'universities'),
'has_archive' => true,
'hierarchical' => false,
'menu_icon' => 'dashicons-building',
'show_in_rest' => true,
'query_var' => true,
);
register_post_type('universities', $args);
}
add_action('init', 'universities_post_type');

/*Custom Post type end*/
 ?>