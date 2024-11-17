<?php

class Bot
{
    const API_URL = "https://api.telegram.org/bot";
    private $token = '7135673262:AAFs1uxs6YsDswaQJs0iV_zIpw1YUAd_-aM';

    public function makeRequest($method, $data = []){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::API_URL . $this->token . '/' . $method);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
    public function handleUpdate($update) {
        global $currencies;
        $message = $update['message'];
        if (isset($message['text'])) {
            $text = $message['text'];
            if ($text == '/start') {
                $this->makeRequest('sendMessage', [
                    'chat_id' => 1214786217,
                    'text' => 'Welcome!  This is a telegram bot of Abdulaziz. To know about currencies, type "/currency"',
                ]);
            } elseif ($text == '/currency'){
                $formattedCurrencies = '';
                foreach($currencies as $currency => $rate){
                    $formattedCurrencies .= "$currency: $rate UZS\n";
                }
                $this->makeRequest('sendMessage', [
                    'chat_id' => 1214786217,
                    'text' => $formattedCurrencies,
                ]);
            }
        }
    }

    public function getUpdates(){
        $response = $this->makeRequest('getUpdates');
        $updates = json_decode($response, true);
        if(isset($updates['result'])) {
            foreach ($updates['result'] as $update) {
                $this->handleUpdate($update);
            }
        }
    }
}

