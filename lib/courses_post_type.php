<?php 
/*Custom Post type :: COURSES */

function courses_post_type() {
$supports = array(
'title', 'author', 'thumbnail', 'excerpt', 'custom-fields', 'comments', 'revisions', 'post-formats', 
);

$labels = array(
'name' => _x('courses', 'plural'),
'singular_name' => _x('course', 'singular'),
'menu_name' => _x('courses', 'admin menu'),
'name_admin_bar' => _x('courses', 'admin bar'),
'add_new' => _x('Add New', 'add new'),
'add_new_item' => __('Add New course'),
'new_item' => __('New course'),
'edit_item' => __('Edit course'),
'view_item' => __('View course'),
'all_items' => __('All courses'),
'search_items' => __('Search course'),
'not_found' => __('No course found.'),

);

$args = array(
'supports' => $supports,
'labels' => $labels,
'public' => true,
'query_var' => true,
'rewrite' => array('slug' => 'courses'),
'has_archive' => true,
//'hierarchical' => false,
'taxonomies' => array('category','schools','countries' ),
'menu_icon' => 'dashicons-welcome-learn-more',
'show_in_rest' => true,
);
register_post_type('courses', $args);
}
add_action('init', 'courses_post_type');

/*Custom Post type end*/
 ?>