$ = jQuery;
var profilter = $("#profilter");
var searchform = $('#searchform');
//$(".widget-area").removeClass("col-md-3");
$('#levelo').click(function(e){
	$('#level').css('visibility','visible');
	$('#levelo').hide();
})
$('#levelc').click(function(e){
	$('#level').css('visibility','hidden');
	$('#levelo').show();
})


searchform.submit(function(e){
	e.preventDefault();
	//console.log("form submitted");
	profilter.find('#response').remove();
	profilter.find('button').addClass('is-loading');



	$.ajax({
		url : ajax_url,
		data : searchform.serialize()+'&action=profilter',
		success : function(response){
			console.log(searchform.serialize());
			profilter.find("ul").empty();
			profilter.find('button').removeClass('is-loading');
			for (var i=0; i < response.length; i++){
				console.log(response[i]);
				var html = "<li class='col-12 mt-5'>"+
								"<section class='card'>"+
								"<div class='card-body'><div class='row'>"+
								"<div class='col-md-8'>"+
								"<h4 class='title is-4'>"+response[i].title+"</h4>"+
								"<h6 class='subtitle text-muted'><i class='fa fa-map-marker'></i> "+response[i].rel_university_name+"</h6>"+
								"</div>"+"<div class='col-md-4'>"+
								"<button class='btn btn-block btn-success is-fullwidth mt-2' onClick='window.location.href=`"+response[i].permalink+"`'>"+"Enroll Now</button></div>"+
								"</div></div></section></li>"

						profilter.find('ul').append(html);
			};
		}
	});

});
