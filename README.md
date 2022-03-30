# open-weather-api

## UI/UX
When I hear about Japan as tourism spot, the first thing that comes in my mind the sakura flower and the Fuji mountain. This is the reason why I put a picture with sakura and fuji mountion as the backgroud photo. 
On the technicalo side I use bootsrap and CSS for the UI.

## code

API used are Forecast and Geoapify

The city entered in the input type from the index.php is being passed through a onclick event to a function in the app.js that contains two ajax that are directing to 2 different php file. Data City is store in a variable that is pass in the ajax that now we called city. 

In the getforecast.php and getGeoapify.php variiable city that was in the url is being stored agian in the php varible, we are using $_POST here. I put there some code to echo error message when the city is null or the json response status is not 200. From there the api id variable and city variable can now be use in file_get_contents() function. We need to decode the json response. Since the json response could be in array so I use foreach(). Then we called the data that will be needing and pass it back to the ajax to be set in our div tag.
