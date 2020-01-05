<?php
//function for university ajax search
function uniSearch(){
	unisearch_script();
	ob_start();
	?>
<div id="unisearch" class="canvas">
<div id="formcanvas"  class="mt-2 border pl-5 pr-5 pt-2 pb-2">
<form id="unisearchform" action="" method="get">

<section class="row pt-4 pb-2 text-center align-items-center">
	<!-- Search -->
	<div class="col-md-4">
		<input type="text" class="form-control"  name="s" id="s" placeholder="Search">
	</div>
	<!------------ Study Level ------------>
	<div class="col-md-2">
		<button id="levelo" class="dropdown" type="button"><i class="im fa fa-graduation-cap"></i> <b>Study Level</b>&emsp;<i class="fas fa-caret-down"></i></button>
		<div id="level" class="text-center border p-2 shadow drop" style="visibility:hidden; z-index:9; position:absolute; background-color:#fff;" >
			<b>Study Level</b><hr>
			<div class="inputs text-left">
				<?php $levels = get_terms('level' , array( 'hide_empty' => false) );
				foreach($levels as $level) { ?>
	 	  			<input type="radio" name="level" id="<?php echo $level->slug ?>" value="<?php echo $level->slug ?>"><label for="<?php echo $level->slug ?>">&nbsp;<?php echo $level->name ?></label><br>
	   			<?php } ?>
			</div><!-- inputs -->
			<button id="levelc" class="check"><i class="im fas fa-check-circle"></i></button>
		</div><!-- level -->
	</div><!-- /col -->
	<!------------ Discipline ------------>
	<div class="col-md-2">
		<button id="disco" class="dropdown" type="button"><i class="im fa fa-book"></i> <b>&nbsp;Discipline</b>&emsp;<i class="fas fa-caret-down"></i></button>
		<div id="disc" class="text-center border p-2 shadow drop" style="visibility:hidden; z-index:9; position:absolute; background-color:#fff;" >
			<b>Discipline</b><hr>
			<div class="inputs text-left">

				<?php 
				$categories = get_categories(array( 'hide_empty' => false));
				foreach($categories as $category) {
	   			?>
	   				<input type="checkbox" name="discipline" id="<?php echo $category->slug ?>" value="<?php echo $category->slug ?>"><label for="<?php echo $category->slug ?>">&nbsp;<?php echo $category->name ?></label><br>
	   			<?php } ?>

   			</div><!-- inputs -->
			<button id="discc" class="check ml-auto"><i class="im fas fa-check-circle"></i></button>		
		</div><!-- Disc -->
	</div><!-- /col -->
	<!---------- Location ---------->
	<div class="col-md-2">
		<button id="loco" class="dropdown" type="button"><i class="im fas fa-compass"></i> <b>&nbsp;Location</b>&emsp;<i class="fas fa-caret-down"></i></button>
		<div id="loc" class="text-center border p-2 shadow drop" style="visibility:hidden; z-index:9; position:absolute; background-color:#fff;" >
			<b>Location</b><hr>
			<div class="inputs text-left">
				<?php 
				$locations = get_terms('Countries',array( 'hide_empty' => false));
				foreach($locations as $location) {
	   			?>
	   				<input type="checkbox" name="<?php echo $location->slug ?>" id="<?php echo $location->slug ?>"><label for="<?php echo $location->slug ?>">&nbsp;<?php echo $location->name ?></label><br>
	   			<?php } ?>
   			</div><!-- inputs -->
			<button id="locc" class="check ml-auto"><i class="im fas fa-check-circle"></i></button>
		</div><!-- loc -->
	</div><!-- /col -->
	<div class="col-md-2">
	<button class="btn btn-white shadow-lg z-depth-2" type="submit"><i class="fas fa-arrow-circle-right"></i>&nbsp;SUBMIT</button></div>
	
</section>
</form><!-- unisearchform -->

	</div><!-- formcanvas -->

		<div id="response">
			<?php 
			if ( is_front_page() || is_home() ) {
			echo do_shortcode( "[elementor-template id='409']" );} 
			else echo "<button id='loadall'>Load all universities</button>";
			?>
		</div>
	<ul id="main" class="row container m-auto"></ul>

</div><!-- unisearch -->

<!--****************** Modal *********************-->

<div class="modal fade" id="searchmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
	<!-- modal header -->
<div class="modal-header">
	<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	  <span aria-hidden="true">&times;</span>
	</button>
</div>
<!-- modal body -->
<div class="modal-body">
	<div class="tab"><h4>Select Desired Course of Study:</h4>
		<div class="row">
			<?php foreach($levels as $level) { ?>
   			<div class="col-md-6 mt-2">
   				<button class="level btn btn-block btn-outline-primary py-3" type="button" id="<?php echo $level->slug ?>" class="slug"><?php echo $level->name ?></button>
   			</div>
   			<?php } ?>
			</div><!-- row -->
	</div>
	<div class="tab"><h4>Select Discipline:</h4>
		<div class="row">
			<?php foreach($categories as $category) { ?>
   			<div class="col-md-4 mt-2">
   				<button class="discipline btn btn-block btn-outline-primary py-3" type="button" id="<?php echo $category->slug ?>" class="slug"><?php echo $category->name ?></button>
   			</div>
   			<?php } ?>
			</div><!-- row -->
	</div>
	<div class="tab"><h4>Select Desired Location:</h4>
		<div class="row">
			<?php foreach($locations as $location) { ?>
   			<div class="col-md-4 mt-2">
   				<button class="discipline btn btn-block btn-outline-primary py-3" type="button" id="<?php echo $location->slug ?>" class="slug"><?php echo $location->name ?></button>
   			</div>
   			<?php } ?>
			</div><!-- row -->
	</div>

	<!-- form steps: -->
	<div style="text-align:center;margin-top:40px;">
	  <span class="step"></span>
	  <span class="step"></span>
	  <span class="step"></span>
	</div>

</div> <!-- modal-body -->

</div><!-- modal-content -->
</div><!-- modal-dialog -->
</div><!-- modal -->

<?php 
return ob_get_clean();
}
add_shortcode('unisearch','unisearch');

 ?>