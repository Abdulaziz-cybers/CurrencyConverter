<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>.weather-card {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            border-radius: 8px;
            background: #f8f9fa;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .weather-icon {
            font-size: 4rem;
        }
    </style>

</head>
<body class="weatherBody">
<?php
global $weather;

?>
<div class="container text-center">
    <h1 class="my-4">Weather in <span id="city-name">Tashkent</span></h1>

    <div class="weather-card text-center">
        <div class="mb-3">
            <img id="weather-icon" src="<?php echo 'https://openweathermap.org/img/wn/' . $weather->getWeather()->weather[0]->icon .'@2x.png';?>" alt="Weather Icon" class="weather-icon">
        </div>
        <h2 class="mb-3" id="temperature"><?php echo (int)$weather->getWeather()->main->temp ; ?>°C</h2>
        <h4 id="description"><?php echo $weather->getWeather()->weather[0]->description ?></h4>

        <div class="d-flex justify-content-around">
            <div>
                <h5>Namlik</h5>
                <p id="feels-like"><?php echo $weather->getWeather()->main->humidity;?>%</p>
            </div>
            <div>
                <h5>Bosim</h5>
                <p id="humidity"><?php echo $weather->getWeather()->main->pressure;?>hPa</p>
            </div>
            <div>
                <h5>Shamol</h5>
                <p id="wind-speed"><?php echo $weather->getWeather()->wind->speed;?> m/s</p>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>