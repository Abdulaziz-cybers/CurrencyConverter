<?php
require 'src/Bot.php';
$bot = new Bot();

require 'src/Converter.php';

$currency = new Converter();
$currencies = $currency->getCurrencies();

require 'src/Weather.php';
$weather = new Weather();

date_default_timezone_set('Asia/Tashkent');
$c_time = date('Y-m-d');

$Prayer_API = "https://api.aladhan.com/v1/timings/" . $c_time . "/?latitude=41.3775&longitude=64.5853";

$update = json_decode(file_get_contents('php://input'),true);

$message = $update['message'];
if (isset($message['text'])) {
    $text = $message['text'];
    if ($text == '/currency'){
        $formattedCurrencies = '';
        foreach($currencies as $currency => $rate){
            $formattedCurrencies .= "$currency: $rate UZS\n";
        }
        $bot->makeRequest('sendMessage', [
            'chat_id' => $message['chat']['id'],
            'text' => $formattedCurrencies,
        ]);
    }elseif ($text == '/weather'){
        $bot->makeRequest('sendMessage', [
            'chat_id' => $message['chat']['id'],
            'text' => "Harorat: " . $weather->getWeather()->main->temp . "°C\n" .
                "Bosim: " . $weather->getWeather()->main->pressure . " hPa\n" .
                "Shamol tezligi: " . $weather->getWeather()->wind->speed . " m/s\n" .
                "Namlik: " . $weather->getWeather()->main->humidity . " %\n",
        ]);
    }elseif ($text == '/start') {
        $bot->makeRequest('sendMessage', [
            'chat_id' => $message['chat']['id'],
            'text' => 'Welcome!  This is a telegram bot of Abdulaziz. To know about currencies, type "/currency"',
        ]);
    }
}