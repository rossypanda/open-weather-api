<?php 

if (!empty($_POST['city'])){
    $city = $_POST['city'];
    $appid = "c74d122b1199daf9a98a9301a8326e56";
    $apiData = file_get_contents("https://api.openweathermap.org/data/2.5/forecast?q=".$city."&appid=".$appid);
    //  https://api.openweathermap.org/data/2.5/forecast?q=bacolod&appid=c74d122b1199daf9a98a9301a8326e56
    //  https://api.openweathermap.org/data/2.5/weather?q=".$city."&appid=".$appid

    $forecastArray = json_decode($apiData, true);  

    $time_today = date("h:i:sa", $forecastArray['list'][0]['dt']);

    echo '<div> LOCATION : '.$forecastArray['city']['name'].', '.$forecastArray['city']['country'].'
     </div>  </br>';

    foreach ($forecastArray['list'] as $list) {
      // $date = DateTime::createFromFormat('u', $list['dt']);
      $date = date("D M d Y ", $list['dt']);
      $time_list = date("h:i:sa", $list['dt']);

      if ($time_today == $time_list) {
          echo
      //   '<div> DATE: '.$list['dt_txt'].'    WEATHER: '.$list['weather'][0]['main'].'</br>
      //   <img width="50" height="50"
      //   src="http://openweathermap.org/img/wn/'.$list['weather'][0]['icon'].'@4x.png"
      //   class="card-img-top"
      //   alt="Weather description"
      // /></div>'

        '<div class="col">
          <div class="card" style="">
            <h5 class="card-title p-2">'.$date.'</h5>
            <img
              src="http://openweathermap.org/img/wn/'.$list['weather'][0]['icon'].'@4x.png"
              class="card-img-top"
              alt="Weather description"
            />
            <div class="card-body">
              <h4 class="card-title">'.$list['weather']['0']['main'].' '.kelvinToCelsius($list['main']['temp']).'&degC</h4>
              <p class="card-text">High Temp '.kelvinToCelsius($list['main']['temp_max']).'&degC Low Temp '.kelvinToCelsius($list['main']['temp_min']).'&degC </p>
              <p class="card-text">HighFeels like'.kelvinToCelsius($list['main']['feels_like']).'</p>
            </div>
          </div>
        </div>';
      }
    }

    

}else{
    echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
    <div>
    Input field id empty.
    </div>
  </div>';
}


function kelvinToCelsius($given_value)
{
	$celsius=$given_value-273.15;
	return $celsius ;
}
?>