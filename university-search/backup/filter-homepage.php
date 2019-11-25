<?php 
function homefilter(){
	ob_start();
	?>
<div class="card home-card shadow">
	<div class="card-body border m-4">
<form action="unisearch" method="get" id="filter">
	<i class="fa fa-graduation-cap"></i> <label for="course_type">Desired Level of Study:</label><br>
	<div class="select is-fullwidth">
	<select id="course_type" name="course_type" >
		<option value="" default>All Levels</option>
		<option value="diploma">Diploma</option>
		<option value="bachelor">Bachelor's Degree</option>
		<option value="master">Master's Degree</option>
		<option value="doctoral">Doctoral Degree</option>
	</select>
	</div><br/><br/>
	<i class="fa fa-map-marker"></i><label for="country">Select Desired Location:</label><br>
	<div class="select is-fullwidth">
	<select id="country" name="country" >
		<option value="australia" default>Australia</option>
		<option value="canada">Canada</option>
		<option value="ireland">Ireland</option>
		<option value="uae">U.A.E</option>
		<option value="uk">United Kingdom</option>
		<option value="us">United States</option>
		<option value="">All Countries</option>
	</select>
	</div><br/><br/>
	<label for="categories"><i class="fa fa-book"></i> What do you want to learn:</label>
	<div class="select is-fullwidth">
	<select id="categories" name="categories" >
		<option value="accounting" default>Accounting</option>
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
		<option value="">All Subjects</option>

	</select>
	</div><br>
	<!--<input type="hidden" name="action" value="unis">-->
	<button type="submit" class=" shadow button mt-2 is-info is-fullwidth"><i class="fa fa-search"></i>Find Now</button>
</form>
</div></div>
<?php 
return ob_get_clean(); 
}
add_shortcode('homefilter','homefilter');

 ?>

