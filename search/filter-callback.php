<?php
/**** Script for course Ajax Search ****/
//Enqueue & localize js file created DIRECT 	MESSAGE 
function coSearch_script(){
	wp_enqueue_script('course-filter', COMMITT_PLUGIN_DIR . '/js/course-filter.js', array('jquery'), '1.0.0', true);
	wp_localize_script( 'course-filter', 'ajax_url', admin_url('admin-ajax.php') );
}

add_action('wp_enqueue_scripts','coSearch_script');
//Ajax Callbacks (At least I know now, sick of it!)
add_action('wp_ajax_coSearch','coSearch_callback');
add_action('wp_ajax_nopriv_coSearch','coSearch_callback');

function coSearch_callback(){
	//print_r($_GET); // prints get value from url 
	//die(); //Yeah! Die Bitch!!!
	header("content-type: application/json");
	$result=array();
	$course_duration = 0;
	$shift = null;
	$course = null;
 
	$args=array(
		"post_type" => 'courses',
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
				'taxonomy' => 'Countries',
				'field' => 'slug',
				'terms' => $country,
				'operator' => 'IN',
			);

 	
	if(isset($_GET['categories'])  )
		$category = sanitize_text_field($_GET['categories']);
		if(($_GET['categories']!= null))
    		$args['tax_query'][] = array(
    			'taxonomy' => 'category',
    			'field' => 'slug',
    			'terms' => $category,
    			'operator' => 'IN',
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
	$coSearch_query = new WP_Query($args);
	while ($coSearch_query->have_posts()){
		$coSearch_query->the_post();
			$result[] = array(
			"id" => get_the_ID(),
				"title" => get_the_title(),
				"permalink" => get_the_permalink(),
				"location" => get_field("location"),
				"course_type" => get_field("course_type"),
				"start_date" => get_field("start_date"),
				"course_duration" => get_field("course_duration"),
				"rel_university_name" => get_field("rel_university")[0]->post_title,
			);
	}
	echo json_encode($result);
	die();
} ?>