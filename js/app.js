$(document).ready( function(){
	
});

function search(){
    var city = $("#inputValue").val();

	$.post("ajax/getGeoapify.php", {
		city:city
	},
	function (data, status){ 
		$("#geoapify").html(data);
	});

    $.post("ajax/getForecast.php", {
		city:city
	},
	function (data, status){ 
		$("#forecast").html(data);
	});
}

function getLocation(){
	// alert('hello!');
}