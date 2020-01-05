<?php
/**** Script for University Ajax Search ****/
//Enqueue & localize js file created DIRECT MESSAGE 
function unisearch_script(){
	wp_enqueue_script('unisearch', get_template_directory_uri() . '/js/unisearch.js', array('jquery'), '1.0.0', true);
	//wp_localize_script( 'unisearch', 'ajax_url', admin_url('admin-ajax.php') );
}

add_action('wp_enqueue_scripts','unisearch_script');
/*(?P<category>[a-zA-Z0-9_\-\.]+)*/
add_action('rest_api_init', function () {
  register_rest_route( 'wp/v2', 'universities/',array(
                'methods'  => 'GET',
                'callback' => 'universitiesbycategory'
      ));
});

function universitiesbycategory($request) {
	/*-------------------------------------------------*/
	/*--------------------REQUESTS--------------------*/
	/*----------------------------------------------*/

	/* preset */
	$location=array();
	$subject=array();

	/* pagination */
	$paged = $request->get_param('paged');

	/* Locations */
	if ($request->get_param('us')=='on'){$location[]='us';}
	if ($request->get_param('uk')=='on'){$location[]='uk';}
	if ($request->get_param('australia')=='on'){$location[]='australia';}
	if ($request->get_param('canada')=='on'){$location[]='canada';}

	/* Category | Subject */
	if($_GET['accounting']=='on')	{	$subject[] = 'accounting';	}
	if($_GET['agriculture']=='on')	{	$subject[] = 'agriculture';	}
	if($_GET['engineering']=='on')	{	$subject[] = 'engineering';	}
	if($_GET['medicine']=='on')	{	$subject[] = 'medicine';	}

	/*-------------------------------------------------*/
	/*--------------------COURSES--------------------*/
	/*----------------------------------------------*/


	/* By Subjects */

/*	if(isset($subject))
		$pargs['tax_query'][] = array(
			'taxonomy' => 'category',
			'field' => 'slug',
			'terms' => 'agriculture',
			'operator' => 'IN',
		);

	$programs = get_posts($pargs);

	foreach ($programs as $program){
		$programslist[] = $program->ID;
	}*/

	/*-------------------------------------------------*/
	/*------------------UNIVERSITIES------------------*/
	/*----------------------------------------------*/

    $args = array(
    	'posts_per_page' => 10,
    	'paged' => $paged,
    	'post_type' => 'universities',
    	's' => $request->get_param('s'),
    );

    if (isset($location) && sizeof($location)>0)
	    $args['tax_query'][] = array(
				'taxonomy' => 'Countries',
				'field' => 'slug',
				'terms' => $location,
				'operator' => 'IN'
				);


    $posts = get_posts($args);

	/*-------------------------------------------------*/
	/*--------------UNIVERSITIES RENDER--------------*/
	/*----------------------------------------------*/

    if (empty($posts)) {
    return new WP_Error( 'empty_category', 'there is no post in this category', array('status' => 404) );
    }
    foreach ($posts as $key => $post) {
			$posts[$key]->acf = get_fields($post->ID);
			$posts[$key]->link = get_permalink($post->ID);
			$posts[$key]->image = get_the_post_thumbnail_url($post->ID);
	}
	return $posts;
    $response = new WP_REST_Response($posts);
    $response->set_status(200);

    return $response;
}
