<?php
//function for university ajax search
function profilter(){
	profilter_script();
	ob_start();
	?>

<div id="profilter" class="canvas">
	<div id="coursescanvas" class="mt-2 border pl-5 pr-5 pt-2 pb-2">

<form id="coursegrep" method="get">
	<div class="row">
		<div class="col-4">
			<label class="my-1 mr-2" for="discipline">Discipline:</label>
		</div>
		<div class="col-6">
			<select class="custom-select" id="discipline" name="discipline">
				<option value="" selected>Select Discipline</option>
				<?php 
				$disciplines = get_categories(); 
				foreach ($disciplines as $discipline ){ 
					?>
				    <option value="<?php echo $discipline->slug ?>"><?php echo $discipline->name; ?></option>
			<?php } ?>
			</select>
			<?php $university = get_field('related_courses'); ?>
			<input type="hidden" name="university" value="<?php echo $university->slug ?>">
		</div>
	</div>
	  
  
</form>

	</div>

		<div id="response">

		</div>
	<ul class="row container m-auto"></ul>

</div><!-- coSearch -->
<?php 
return ob_get_clean();
}
add_shortcode('profilter','profilter');

 ?>