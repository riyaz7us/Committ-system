<?php
//function for university ajax search
function universitySearch(){
	unisearch_script();
	ob_start();
	?>

<div id="unisearch" class="canvas">
	<div class="mt-2 border pl-5 pr-5 pt-2 pb-2">
		<i class="fa fa-search"></i> Find: <a id="courses" href="/courses">courses</a> | 
		<a id="universities" href="/universities">universities</a>
<form id="coursesform" action="" method="get" autocomplete="off">
		<!-- Course Type -->
<section class="row">
	<div class="col-md-2">
	<p class="control has-icons-left">
		<span class="select is-fullwidth">
			<select id="in" name="in">
				<option value="courses" selected>Courses</option>
			</select>
		</span>
		<span class="icon is-small is-left">
      			<i class="fa fa-search"></i>
    	</span>
	</p>
	</div>
	<div class="col-md-3">
	<p class="control has-icons-left">
		<span class="select is-fullwidth">
			<select id="course_type" name="course_type" placeholder="Desired level of study" >
				<option value="" >All Levels</option>
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
	<div class="col-md-3">
	<p class="control has-icons-left">
		<span class="select is-fullwidth">
			<select id="country" name="country" >
				<option value="" default>All Countries</option>
				<option value="aus">Australia</option>
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
	<div class="col-md-3">
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
	<div class="col-md-1">
	<p class="control">
		<button type="submit" class="button is-fullwidth is-info pl-5 pr-5"><i class="fa fa-filter"></i>&nbsp;Filter</button>
	</p>
	</div>
</section>
</form>
<form id="universitiesform" action="" method="get" autocomplete="off">
		<!-- Course Type -->
<section class="row">
	<div class="col-md-2">
	<p class="control has-icons-left">
		<span class="select is-fullwidth">
			<select id="in" name="in" placeholder="Find in" >
				<option value="universities" selected>Universities</option>
			</select>
		</span>
		<span class="icon is-small is-left">
      			<i class="fa fa-search"></i>
    	</span>
	</p>
	</div>
	<!-- Country -->
	<div class="col-md-3">
	<p class="control has-icons-left">
		<span class="select is-fullwidth">
			<select id="country" name="country" >
				<option value="" default>All Countries</option>
				<option value="aus">Australia</option>
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
	<div class="col-md-1">
	<p class="control">
		<button type="submit" class="button is-fullwidth is-info pl-5 pr-5"><i class="fa fa-filter"></i>&nbsp;Filter</button>
	</p>
	</div>
</section>
</form>
	</div>

		<div id="response">
			<?php 
			if ( is_front_page() || is_home() ) {
			echo do_shortcode( "[elementor-template id='409']" );} ?>
		</div>
	<ul class="row container"></ul>

</div><!-- unisearch -->
<?php 
return ob_get_clean();
}
add_shortcode('universitySearch','universitySearch');

 ?>