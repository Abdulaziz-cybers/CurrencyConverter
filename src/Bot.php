<?php
require 'vendor/autoload.php';
use GuzzleHttp\Client;
class Bot
{
    const API_URL = "https://api.telegram.org/bot";
    public $client;
    private $token = '7135673262:AAFs1uxs6YsDswaQJs0iV_zIpw1YUAd_-aM';

    public function makeRequest($method, $data = []){
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL, self::API_URL . $this->token . '/' . $method);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
//        $response = curl_exec($ch);
//        curl_close($ch);
        $this->client = new Client([
            'base_uri' => self::API_URL . $this->token,
            'timeout'  => 2.0,
        ]);
        $response = $this->client->request('POST', '/' . $method, ['json' => $data]);
        return $response;
    }
}

