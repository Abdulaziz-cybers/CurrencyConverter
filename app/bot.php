<?php

require 'src/Bot.php';
require 'src/Converter.php';
require 'src/Weather.php';
require 'src/Database.php';

$db = new Database();
$bot = new Bot();
$currency = new Converter();
$weather = new Weather();

$currencies = $currency->getCurrencies();

$input = file_get_contents('php://input');
$update = json_decode($input,true);

if (isset($update['message'])) {
    $message = $update['message'];
    if (isset($message['text'])) {
        $text = $message['text'];
        if ($text == '/currency') {
            $formattedCurrencies = '';
            foreach ($currencies as $currency => $rate) {
                $formattedCurrencies .= "$currency: $rate UZS\n";
            }
            $bot->makeRequest('sendMessage', [
                'chat_id' => $message['chat']['id'],
                'text' => $formattedCurrencies,
            ]);
        } elseif ($text == '/weather') {
            $bot->makeRequest('sendMessage', [
                'chat_id' => $message['chat']['id'],
                'text' => "Harorat: " . $weather->getWeather()->main->temp . "°C\n" .
                    "Bosim: " . $weather->getWeather()->main->pressure . " hPa\n" .
                    "Shamol tezligi: " . $weather->getWeather()->wind->speed . " m/s\n" .
                    "Namlik: " . $weather->getWeather()->main->humidity . " %\n",
            ]);
        } elseif ($text == '/start') {
            $bot->makeRequest('sendMessage', [
                'chat_id' => $message['chat']['id'],
                'text' => 'Welcome!  This is a telegram bot of Abdulaziz. To know about currencies, type "/currency"',
            ]);
        }
        $db->saveUserData($message['from']);
    }
}