<?php
require 'vendor/autoload.php';
use GuzzleHttp\Client;
class Converter{
    const CURRENCY_API = "https://cbu.uz/uz/arkhiv-kursov-valyut/json/";
    public $client;
    public array $currencies = [];

    public function __construct(){
        $this->client = new Client([
            'base_uri' => self::CURRENCY_API,
            'timeout'  => 5.0,
            ]);
        $request = $this->client->request('GET' );
        $this->currencies = json_decode($request->getBody()->getContents());
    }

    public function getCurrencies(){
        $seperated_data = [];
        $currencies_info = $this->currencies;
        foreach($currencies_info as $curr){
            $seperated_data[$curr->Ccy] = $curr->Rate;
        }
        return $seperated_data;
    }

    public function exchange(string $from,string $to,int $amount){
        if ($to == $from){
            echo "<h4>Please, choose different currency to convert</h4>";
        }
        elseif ($to != 'UZS' && $from != 'UZS'){
            echo "<h4>Please, choose UZS for one of the currencies to convert</h4>";
        }
        elseif ($to == 'UZS'){
            $exchangeRate = $this->getCurrencies()[$from];
            $amount = $_POST['amount'];
            $converted = $amount*$exchangeRate;
            echo "1.00 " . $from . " = " . $exchangeRate . " " . $to . " <i class='bi bi-info-circle'></i>";
            echo '<br>' . $amount . $from . ' = ' . number_format($converted,2) . $to ;

        }
        else {
            $exchangeRate = $this->getCurrencies()[$to];
            $converted = $amount/$exchangeRate;

            echo "1.00 " . $to . " = " . $exchangeRate . " " . $from . " <i class='bi bi-info-circle'></i>";
            echo '<br>' . $amount . $from . ' = ' . number_format($converted,2) . $to ;
        }
    }
}