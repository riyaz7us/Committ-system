<?php
/**** Script for University Ajax Search ****/
//Enqueue & localize js file created DIRECT 	MESSAGE 
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
	$shift = null;
	$university = null;
 
	$args=array(
		"post_type" => "courses",
	);

	if(isset($_GET['course_type']))
		$course_type = sanitize_text_field($_GET['course_type']);
		if(($_GET['course_type']!=null))
			$args['meta_query'][] = array(
			'key' => 'course_type',
			'value' => $course_type,
			'compare' => 'LIKE'
			);

 	if(isset($_GET['country']))
		$country = sanitize_text_field($_GET['country']);
		if(($_GET['country']!= null))
			$args['tax_query'][] = array(
				'taxonomy' => 'countries',
				'field' => 'slug',
				'terms' => $country,
				'operator' => 'LIKE',
			);

 	
	if(isset($_GET['categories'])  )
		$category = sanitize_text_field($_GET['categories']);
		if(($_GET['categories']!= null))
    		$args['tax_query'][] = array(
    			'taxonomy' => 'categories',
    			'field' => 'slug',
    			'terms' => $category,
    			'operator' => 'LIKE',
    		);

	if(isset($_GET['gpa']))
		$gpa = sanitize_text_field($_GET['gpa']);
		if(($_GET['gpa']!= null))
    		$args['meta_query'][] = array(
    		'key' => 'gpa',
    		'value' => $gpa,
    		'compare' => '<='
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
				"rel_university_guid" => get_field("rel_university")[0]->guid,
				"start_date" => get_field("start_date"),
				"course_duration" => get_field("course_duration"),
				"fees_in_usd" => get_field("fees_in_usd"),
				"fees_in_inr" => get_field("fees_in_inr"),
			);
	}
	echo json_encode($result);
	die();
} ?>