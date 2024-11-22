<?php

require 'src/Bot.php';
require 'src/Converter.php';
require 'src/Weather.php';

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
            $welcomeMessage = "Assalomu alaykum! 😊\n
                I can help with:\n\n⛅ To know about weather in Tashkent  click WEATHER.\n
                💵 To know about currencies click CURRENCIES.";
            $bot->sendMessageWithKeyboard($message['chat']['id'], $welcomeMessage, [["WEATHER"], ["CURRENCIES"]]);
            $response = "💵 Valyutalar kurslarini hisoblash uchun miqdor va valyuta kodini kiriting.\n\nMisol: `100 USD`";


            $bot->makeRequest('sendMessage', [
                'chat_id' => $message['chat']['id'],
                'text' => 'Welcome!  This is a telegram bot of Abdulaziz. To know about currencies, type "/currency"',
            ]);
            $bot->saveUser($message['from']['id'],$message['from']['username']);
        }
    }
}