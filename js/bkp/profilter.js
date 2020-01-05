$ = jQuery;
var profilter = $("#profilter");
var searchform = profilter.find("form");
//$(".widget-area").removeClass("col-md-3");

searchform.submit(function(e){
	e.preventDefault();
	//console.log("form submitted");
	console.log(searchform.serializeArray());
	unisearch.find('#response').remove();

	unisearch.find('button').addClass('is-loading');

	var data = {
		action: "unisearch",
		course_type: unisearch.find('#course_type').val(),
		university: unisearch.find('#university').val(),
		country: unisearch.find('#country').val(),
		categories: unisearch.find('#categories').val(),
		in: unisearch.find('#in').val(),
	}

	$.ajax({
		url : ajax_url,
		data : data,
		success : function(response){
			console.log(data.in);
			unisearch.find("ul").empty();
			unisearch.find('button').removeClass('is-loading');
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
					var html2 = "<li class='col-12 mt-5'>"+
								"<section class='card'><div class='row'>"+
								"<div class='col-md-3'><div class='card-body'><img class='img-thumbnail' src='"+response[i].thumbnail+"'></div></div>"+
								"<div class='col-md-9'><div class='card-body'>"+
								"<h4 class='title is-4'>"+response[i].title+"</h4>"+
								"<h6 class='subtitle text-muted'><i class='fa fa-map-marker'></i> "+response[i].location+"</h6>"+
								"<div class='row courseDetails'>"+
									"<div class='col-md-8 border-right text-center'>"+
									"<p class='text-justify'>"+response[i].excerpt.replace(/^(.{200}[^\s]*).*/, "$1")+" ....</p></div>"+
									"<div class='col border-right text-center'>"+
									"<i class='fa fa-calendar-o'></i><br><span>"+response[i].start_date+"</span></div>"+
									"<div class='col border-right text-center'>"+
									"<i class='fa fa-clock-o'></i><br><span>"+response[i].course_duration+"</span></div>"+	
									"<div class='col text-center'>"+
									"<i class='fa fa-money'></i><br><span>Fees: "+response[i].fees_in_usd+"<br>(₹"+response[i].fees_in_inr+")</span></div>"+	
								"</div>"+
									"<button class='btn btn-block btn-success is-fullwidth mt-2' onClick='window.location.href=`"+response[i].permalink+"`'>"+"Enroll Now</button></div>"+
								"</div></div></div></div></section></li>"
						var type = response[i].post_type;
					if (type=="courses"){
						unisearch.find('ul').append(html);
					} else {
						unisearch.find('ul').append(html2);
					}
			};
		}
	});

});
