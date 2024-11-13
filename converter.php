<?php


class Converter{
    const CURRENS_API = "https://cbu.uz/uz/arkhiv-kursov-valyut/json/";
    public array $currencies = [];

    public function __construct(){
        $ch = curl_init();

        curl_setopt($ch,CURLOPT_URL,self::CURRENS_API);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

        $output = curl_exec($ch);

        curl_close($ch);
        $this->currencies = json_decode($output);
        
    }

    public function getCurrencies(){
        $seperated_data = [];
        $currencies_info = $this->currencies;
        foreach($currencies_info as $curr){
            $seperated_data[$curr->Ccy] = $curr->Rate;
        }
        return $seperated_data;
    }

    public function exchange($value,$currency_name='USD'){
            return number_format($value / $this->getCurrencies()[$currency_name],2) . ' ' . $currency_name;
    }
}