<?php 

if (!empty($_POST['city'])){
    $city = $_POST['city'];
    $geoapid = "89fab9e799ad4647a6c76d398337d313";
    
    // $curl= curl_init();
    // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    // curl_setopt($curl, CURLOPT_URL, 'https://api.geoapify.com/v1/geocode/search?text='.$city.'&apiKey='.$geoapid);
    // $res = curl_exec($curl);
    // curl_close($curl);
    // $geoapi = json_decode($res);

    // if ($geoapi->cod != 200){
    //   echo '';
    // }else{
      $geoData = file_get_contents("https://api.geoapify.com/v1/geocode/search?text=".$city."&apiKey=".$geoapid);
      $geoapifyArray = json_decode($geoData, true);  
      foreach ($geoapifyArray['features'] as $geolist) {

        echo $geolist['properties']['place_id'];

          echo '<div class="col-sm">
          '.$geolist['properties']['city'].', '.$geolist['properties']['country'].
              '<p>Latitude: '.$geolist['properties']['lat'].'</p>
              <p>Longitude: '.$geolist['properties']['lon'].'</p>
              
          </div>';
      }
    // }
    


}else{
    echo '';
}




?>