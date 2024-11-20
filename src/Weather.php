<?php
require 'vendor/autoload.php';
use GuzzleHttp\Client;
class Weather {
    const WEATHER_API_URL = 'https://api.openweathermap.org/data/2.5/weather?q=Tashkent&appid=1f2c4527291b18aaab758440a1f8e071&units=metric';
    public $weather_data = [];
    public $client;
    public function __construct () {
        $this->client = new Client([
            'base_uri' => self::WEATHER_API_URL,
            'timeout'  => 2.0,
        ]);
        $request = $this->client->request('POST' );
        $this->weather_data = json_decode($request->getBody()->getContents());
    }
    public function getWeather () {
        return $this->weather_data;
    }
}