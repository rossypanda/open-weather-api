var button = document.querySelector('.button') ;
var inputValue = document.querySelector('.inputValve') ;
var name = document.querySelector('.name') ;
var desc = document.querySelector('.desc') ;
var temp = document.querySelector('.temp') ;

// button.addEventListener('click',function(){
//     // alert ('dewaw');
//     fetch('https//api.openweathermap.org/data/2.5/forecast?q='+inputValue.value+'&appid=c74d122b1199daf9a98a9301a8326e56')
//     .then(response => response.json)
//     .then(data => {
//         var nameValue = data['name'];
//         var tempValue = data['main']['temp'];
//         var descValue = data['weather'][0]['description'];

//         name.innerHTML = nameValue;
//         temp.innerHTML = tempValue;
//         desc.innerHTML = descValue;
//     })

//     .catch(err => alert ("Wrong City name!"))
// });

function search(){
    var city = $("#inputValue").val();
    
    // alert (inputValue);

    $.post("ajax/getForecast.php", {
		city:city
	},
	function (data, status){ 
		$("#forecast").html(data);
	});
}