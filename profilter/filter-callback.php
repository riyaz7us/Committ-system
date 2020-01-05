<?php
/**** Script for University Ajax Search ****/
//Enqueue & localize js file created DIRECT MESSAGE 
function profilter_script(){
	wp_enqueue_script('profilter', get_template_directory_uri() . '/js/profilter.js', array('jquery'), '1.0.0', true);
	//wp_localize_script( 'profilter', 'ajax_url', admin_url('admin-ajax.php') );
}

add_action('wp_enqueue_scripts','profilter_script');
/*(?P<category>[a-zA-Z0-9_\-\.]+)*/
add_action('rest_api_init', function () {
  register_rest_route( 'wp/v2', 'programs',array(
                'methods'  => 'GET',
                'callback' => 'coursesbycategory'
      ));
});

function coursesbycategory($request) {


$discipine = array();

$discipine[] = $request->get_param('subject');

	/*-------------------------------------------------*/
	/*--------------------REQUESTS--------------------*/
	/*----------------------------------------------*/


	/* Category | Subject */

	/*-------------------------------------------------*/
	/*--------------------COURSES--------------------*/
	/*----------------------------------------------*/

	if(isset($subject))
		$pargs['tax_query'][] = array(
			'taxonomy' => 'category',
			'field' => 'slug',
			'terms' => $discipline,
			'operator' => 'IN',
		);


	/*-------------------------------------------------*/
	/*---------------------COURSES--------------------*/
	/*----------------------------------------------*/

    $args = array(	
    	'post_type' => 'product',
    );



    $courses = get_posts($args);

	/*-------------------------------------------------*/
	/*---------------- COURSES RENDER ----------------*/
	/*----------------------------------------------*/

    if (empty($courses)) {
    return new WP_Error( 'empty_category', 'there is no post in this category', array('status' => 404) );
    }
    foreach ($courses as $key => $course) {
			$courses[$key]->acf = get_fields($course->ID);
			$courses[$key]->link = get_permalink($course->ID);
			$courses[$key]->image = get_the_post_thumbnail_url($course->ID);
	}
	return $courses;
	$response = new WP_REST_Response($posts);
    $response->set_status(200);

    return $response;
}
