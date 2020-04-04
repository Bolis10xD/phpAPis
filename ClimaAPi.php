<?php
$apiKey = "eac39f777c78acfb50b4e3a7e603cdae";
$cityId = "3522961";

$lon = "19.48";
$lan = "-98.55";


$googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?lat=" . $lon ."&lon=".$lan. "&lang=es&units=metric&APPID=" . $apiKey;

$ch = curl_init();

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);

curl_close($ch);
$data = json_decode($response);
$currentTime = time();

$Titulo = "API Tiempo openweathermap free";

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><? echo $Titulo;?></title>
</head>
<body background="clima.jpg">
    
<div class="container py-4">


    		<div class="card bg-light">
    			<div class="card-header bg-primary text-white"><h2><marquee behavior="alternate"><?php echo $data->name; ?> | Estado del tiempo</marquee></h2></div>
    			<div class="card-body">
        <div class="time">

        <table class="table table-striped">
        <div class="p-3 mb-2 bg-dark text-white">
        <tr><td><strong>Fecha:</strong><?php echo date("l g:i a", $currentTime); ?></td></tr>
        <tr><td><?php echo date("jS F, Y",$currentTime); ?></td></tr>
        </div>
        <td><strong>Estado:</strong><?php echo ucwords($data->weather[0]->description); ?></td>
        </table>
        </div>
        <div class="p-3 mb-2 bg-info text-white">
            <img
                src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png"
                class="weather-icon" /> <?php echo $data->main->temp_max; ?>°C<span
                class="min-temperature"><?php echo $data->main->temp_min; ?>°C</span>
        </div>
        <div class="p-3 mb-2 bg-success text-white">
            <div>Humedad: <?php echo $data->main->humidity; ?> %</div>
            <div>Viento: <?php echo $data->wind->speed; ?> km/h</div>
        </div>

        <br>
                    <center><div class="p-3 mb-2 bg-dark text-white">Oliver Rodriguez Contreras</div></center>
    </div>

    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>



</body>
</html>