<?php 
add_action('rest_api_init', function () {
  register_rest_route( 'committ/v2', 'steps/',array(
                'methods'  => 'GET',
                'callback' => 'get_courses_filtered'
      ));
});
 

 function get_courses_filtered($request) {

    $args = array(
    	'post_type' => array('courses','universities'),
    );
    $args['posts_per_page'] = 25;  


           // 'post_type' => "'".$request['category_slug']."'"
    

    $posts = get_posts($args);
    if (empty($posts)) {
    return new WP_Error( 'empty_category', 'there is no post in this category', array('status' => 404) );

    }

    $response = new WP_REST_Response($posts);
    $response->set_status(200);

    return $response;
}

?>