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

<form id="universitiesform" action="" method="get" autocomplete="off">
		<!-- Course Type -->
<section class="row">
	<!-- Country -->
	<div class="col-md-6">
		<div id="country" class="card">
			<div class="checkbox">
		<input type="checkbox" value="aus" id="aus"><label for="aus">Australia</label>
			</div>
			<div class="checkbox">
		<input type="checkbox" class="form-check-input"  value="us" id="us"><label for="us">United States</label>
			</div>
		</div>
	<p class="control has-icons-left">
		<span class="select is-fullwidth">
			<select id="none" name="country" >
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
	<div class="col-md-6">
	<p class="control">
		<button type="submit" class="button is-fullwidth is-success pl-5 pr-5"><i class="fa fa-filter"></i>&nbsp;Filter</button>
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