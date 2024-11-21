<?php
require 'vendor/autoload.php';
use GuzzleHttp\Client;
class Bot
{
    const API_URL = "https://api.telegram.org/bot";
    public $client;
    private $token = '7135673262:AAFs1uxs6YsDswaQJs0iV_zIpw1YUAd_-aM';

    public function makeRequest($method, $data = []){;
        $this->client = new Client([
            'base_uri' => self::API_URL . $this->token . '/',
            'timeout'  => 5.0,
        ]);
        $response = $this->client->request('POST', $method, ['json' => $data]);
        return $response;
    }
}

