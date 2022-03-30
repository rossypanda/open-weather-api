<?php 

if (!empty($_POST['city']) || $_POST['city'] != NULL){
    $city = $_POST['city'];
    $geoapid = "89fab9e799ad4647a6c76d398337d313";

      $geoData = file_get_contents("https://api.geoapify.com/v1/geocode/search?text=".$city."&apiKey=".$geoapid);
      $geoapifyArray = json_decode($geoData, true); 
      foreach ($geoapifyArray['features'] as $geolist) {
           
          echo '
            <div class="card col-sm">
            <div class="card-header"><h6>'.$geolist['properties']['formatted'].'</h6></div>
              <div class="card-body">
                <div class="details">Latitude: '.$geolist['properties']['lat'].'</div>
                <div class="details">Longitude: '.$geolist['properties']['lon'].'</div>
                <div class="details">City: '.$geolist['properties']['city'].'</div>
                <div class="details">Country: '.$geolist['properties']['country'].'</div>
                <div class="details">Country Code: '.$geolist['properties']['country_code'].'</div>
              
          </div></div>';
      }




}else{
    echo '';
}




?>