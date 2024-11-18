<?php
require 'src/Bot.php';
$bot = new Bot();

require 'src/Converter.php';

$currency = new Converter();

$currencies = $currency->getCurrencies();

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
    }elseif ($text == '/start') {
        $bot->makeRequest('sendMessage', [
            'chat_id' => $message['chat']['id'],
            'text' => 'Welcome!  This is a telegram bot of Abdulaziz. To know about currencies, type "/currency"',
        ]);
    }
}