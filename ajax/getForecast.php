<?php 

if (!empty($_POST['city'])){
    $city = $_POST['city'];
    $apiData = file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".$city."&appid=c74d122b1199daf9a98a9301a8326e56");
    //  https://api.openweathermap.org/data/2.5/forecast?q=bacolod&appid=c74d122b1199daf9a98a9301a8326e56

    $forecastArray = json_decode($apiData, true);

    // echo print_r($forecastArray);
    
    echo '<div class="card">
    <div class="card-header">
      Weather Forecast
    </div>
    <div class="card-body">
      <h5 class="card-title">Weather Condition</h5>
      <p class="card-text">'.$forecastArray['weather']['0']['description'].'</p>
    </div>
  </div>';
    

}else{
    echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
    <div>
    Input field id empty.
    </div>
  </div>';
}

?>