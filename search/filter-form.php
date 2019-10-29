<?php
//function for university ajax search
function unis(){
	unis_script();
	ob_start();
	?>

<div id="unis" class="container-flex">
		<form action="" method="get">
		<label for="university">University:</label>
		<select id="university" name="university">
			<option default value="">All</option>
			<option value="massachusetts">Massachusetts</option>
			<option value="sheffield">Scheffield</option>
			<option value="stanford">Stanford University</option>
			<option value="reading">Reading</option>
			<option value="sydney">Sydney</option>
		</select>
		<label for="course_duration">Course Duration:</label>
		<select id="course_duration" name="course_duration" >
			<option value="0"> Year</option>
			<option value="1">1 Year</option>
			<option value="4">4 Years</option>
		</select>
		<label for="shift">Shift:</label>
		<select id="shift" name="shift" >
			<option default>Select Shift</option>
			<option value="full">Full-Time</option>
			<option value="part">Part-Time</option>
		</select>
		<button type="submit" class="btn-primary mt-2">Filter</button>
		</form>
	
	<div id="response" class="container row">
			<?php 
			$args=array(
			"post_type" => "courses",
			);
			$unis_query = new WP_Query($args);
			while ($unis_query->have_posts()){
					$unis_query->the_post();
					get_template_part( 'partials/courses', 'archive' );
			}
			wp_reset_postdata();
			?>
	</div>
	<ul class="row container"></ul>
</div>
<?php 
return ob_get_clean(); 
}
add_shortcode('unis','unis');

 ?>