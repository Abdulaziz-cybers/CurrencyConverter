<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($uri == '/weather') {
    require 'resourses/views/weather.php';
}elseif ($uri == '/bot') {
    require 'app/bot.php';
}elseif ($uri == '/currency') {
    require 'src/Converter.php';
    $currency = new Converter();
    $currencies = $currency->getCurrencies();

    require 'resourses/views/currency.php';


}
