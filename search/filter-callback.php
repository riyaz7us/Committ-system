<?php
/**** Script for University Ajax Search ****/
//Enqueue & localize js file created
function unis_script(){
	wp_enqueue_script('university-filter', get_template_directory_uri() . '/js/university-filter.js', array('jquery'), '1.0.0', true);
	wp_localize_script( 'university-filter', 'ajax_url', admin_url('admin-ajax.php') );
}

add_action('wp_enqueue_scripts','unis_script');
//Ajax Callbacks (Don't have Fuckin' idea what they are)
add_action('wp_ajax_unis','unis_callback');
add_action('wp_ajax_nopriv_unis','unis_callback');

function unis_callback(){
	//print_r($_GET); // prints get value from url 
	//die(); //Yeah! Die Bitch!!!
	header("content-type: application/json");
	$result=array();
	$course_duration = 0;
	$shift = 0;
	$university = 0;
 
	$args=array(
		"post_type" => "courses",
	);

 	if(isset($_GET['university'])  )
		$university = sanitize_text_field($_GET['university']);
		if(($_GET['university']!= null))
		$args['tax_query'][] = array(
			'taxonomy' => 'universities',
			'field' => 'slug',
			'terms' => $university,
		);

 	if(isset($_GET['course_duration']))
		$course_duration = sanitize_text_field($_GET['course_duration']);
		if(($_GET['course_duration']!=0))
		$args['meta_query'][] = array(
		'key' => 'course_duration',
		'value' => $course_duration,
		'compare' => 'IN'
		);
	
/*	if(isset($_GET['shift']))
		$shift = sanitize_text_field($_GET['shift']);
		$args['meta_query'][] = array(
		'key' => 'shift',
		'value' => $shift,
		'compare' => 'LIKE'
		);
		*/

	
    /* Add more meta queries in a similar fashion
	$args['meta_query'][] = array(
		'key' => 'course_duration',
		'value' => $course_duration,
		'compare' => '='
	);*/
	$unis_query = new WP_Query($args);
	while ($unis_query->have_posts()){
		$unis_query->the_post();
			$result[] = array(
			"id" => get_the_ID(),
				"title" => get_the_title(),
				"permalink" => get_the_permalink(),
				"course_type" => get_field("course_type"),
				"rel_university" => get_field("rel_university")[0]->post_title,
			);
	}
	echo json_encode($result);
	die();
} ?>