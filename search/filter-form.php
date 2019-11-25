<?php
//function for university ajax search
function unis(){
	unis_script();
	ob_start();
	?>

<div id="unis" class="container-flex row ">
	<div class="col-md-4 mt-2 border-right scrollable">
		<form action="" method="get">
		<!-- Course Type -->
		<div class="field">
			<label for="course_type">Select Desired Level of Study:</label>
			<p class="control has-icons-left">
				<span class="select is-fullwidth">
					<select id="course_type" name="course_type" >
					<option value="" selected>All Levels</option>
					<option value="diploma">Diploma</option>
					<option value="bachelor">Bachelor's Degree</option>
					<option value="master">Master's Degree</option>
					<option value="doctoral">Doctoral Degree</option>
					</select>
				</span>
				<span class="icon is-small is-left">
      				<i class="fa fa-graduation-cap"></i>
    			</span>
			</p>
		</div>
		<!-- Country -->
		<div class="field">
			<label for="country">Select Desired Location:</label>
			<p class="control has-icons-left">
				<span class="select is-fullwidth">
					<select id="country" name="country" >
					<option value="" default>All Countries</option>
					<option value="australia">Australia</option>
					<option value="canada">Canada</option>
					<option value="ireland">Ireland</option>
					<option value="uae">U.A.E</option>
					<option value="uk">United Kingdom</option>
					<option value="us">United States</option>
					</select>
				</span>
				<span class="icon is-small is-left">
      				<i class="fa fa-globe"></i>
    			</span>
			</p>
		</div>
		<!-- Categories -->
		<div class="field">
			<label for="categories">What do you want to learn:</label>
			<p class="control has-icons-left">
				<span class="select is-fullwidth">
					<select id="categories" name="categories" >
					<option value="" selected>All Subjects</option>
					<option value="accounting">Accounting</option>
					<option value="agriculture">Agriculture</option>
					<option value="business">Business</option>
					<option value="computer">Computer Science</option>
					<option value="education">Education</option>
					<option value="engineering">Engineering</option>
					<option value="environmental">Environmental Studies</option>
					<option value="fine-arts">Fine Arts</option>
					<option value="law">Law</option>
					<option value="mathematics">Mathematics</option>
					<option value="media">Media</option>
					<option value="medicine">Medicine</option>
					<option value="science">Science</option>
					<option value="social">Social Sciences</option>
					<option value="sports">Sports</option>
					</select>
				</span>
				<span class="icon is-small is-left">
      				<i class="fa fa-book"></i>
    			</span>
			</p>
		</div>
		<!-- University -->

	<label for="university"><i class="fa fa-building"></i> Select university:</label>
	<div class="select is-fullwidth">
		<select id="university" name="university">
			<option selected value="">All Universities</option>
			<option value="massachusetts">Massachusetts</option>
			<option value="sheffield">Scheffield</option>
			<option value="stanford">Stanford University</option>
			<option value="reading">Reading</option>
			<option value="sydney">Sydney</option>
		</select>
	</div><br><br>
	<div class="row">
		<div class="col">
		<label for="GPA">GPA: </label><br>
		<div class="control is-fullwidth">
			<input class="input" type="number" name="gpa" id="gpa">
		</div><!--control-->
		</div><!--col-->
		<div class="col">
					<label for="ielts">IELTS: </label><br>
		<div class="control is-fullwidth">
			<input class="input" type="number" name="ielts" id="ielts">
		</div><!--control-->
	</div><!--col-->
</div><!-- row -->

		<button type="submit" class="processing button mt-2  is-info is-fullwidth shadow-lg"><i class="fa fa-filter"></i> Filter</button><br><br>
		</form>
	</div>
	<div class="col-md-8 scrollable">
	<div id="response" class="row">
		<?php 

		$args=array(
		"post_type" => "courses",
		);

		if(isset($_GET['course_type']))
		$course_type = sanitize_text_field($_GET['course_type']);
			if(($_GET['course_type']!=null))
				$args['meta_query'][] = array(
				'key' => 'course_type',
				'value' => $course_type,
				'compare' => 'IN'
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


		

	$defQuery = new WP_Query($args);
	while ($defQuery->have_posts()){
			$defQuery->the_post();
			get_template_part( 'partials/courses', 'archive' );
	}
			
	wp_reset_postdata();
	?>
	</div>
	<ul class="row"></ul>
</div>

</div>
<?php 
return ob_get_clean();
}
add_shortcode('unis','unis');

 ?>