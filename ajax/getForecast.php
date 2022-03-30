<?php 

if (!empty($_POST['city'])){
    $city = $_POST['city'];
    $appid = "c74d122b1199daf9a98a9301a8326e56";
    $geoapid = "89fab9e799ad4647a6c76d398337d313";
    
    $curl= curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_URL, 'https://api.openweathermap.org/data/2.5/forecast?q='.$city.'&appid='.$appid);
    $res = curl_exec($curl);
    curl_close($curl);
    $forecast = json_decode($res);

    if ($forecast->cod != 200){ //for error status 
      echo errorMessage();
    }else{
      
      $apiData = file_get_contents("https://api.openweathermap.org/data/2.5/forecast?q=".$city."&appid=".$appid);
      $forecastArray = json_decode($apiData, true);  
      $time_today = date("h:i:sa", $forecastArray['list'][0]['dt']);

      // echo '<div> LOCATION : '.$forecastArray['city']['name'].', '.$forecastArray['city']['country'].'
      // </div>  </br>';

      foreach ($forecastArray['list'] as $list) {
        // $date = DateTime::createFromFormat('u', $list['dt']);
        $date = date("D M d, Y ", $list['dt']);
        $time_list = date("h:i:sa", $list['dt']);

        if ($time_today == $time_list) {
            echo
          '<div class="col">
            <div class="card" style="">
              <h7 class="card-title p-1">'.$date.'</h7>
              <div class="container" style = "width : 70% !important">
                <img
                  src="http://openweathermap.org/img/wn/'.$list['weather'][0]['icon'].'@4x.png"
                  class="card-img-top"
                  alt="Weather description"
                />
              </div>
              <div class="card-body">
                <h6 class="card-title">'.$list['weather']['0']['main'].' '.kelvinToCelsius($list['main']['temp']).'&degC</h6>
                <p class="card-text">High Temp '.kelvinToCelsius($list['main']['temp_max']).'&degC Low Temp '.kelvinToCelsius($list['main']['temp_min']).'&degC </p>
              </div>
            </div>
          </div>';
        }
      }
    }

}else{
    echo errorMessage();
}

function errorMessage(){
  return '<div class="alert alert-danger d-flex align-items-center" role="alert" style = "margin-top: 50px; width: 330px; ">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
  <div>
  Sorry, City not found!
  </div>
  </div>';
}

function kelvinToCelsius($given_value)
{
	$celsius = $given_value-273.15;
	return $celsius ;
}


?>