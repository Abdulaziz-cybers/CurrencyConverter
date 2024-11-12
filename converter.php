<?php


class Converter{
    const CURRENS_API = "https://cbu.uz/uz/arkhiv-kursov-valyut/json/";
    public function __construct(){
        $ch = curl_init();

        curl_setopt($ch,CURLOPT_URL,self::CURRENS_API);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

        $output = curl_exec($ch);

        curl_close($ch);

        $decoded = json_decode($output);

        echo $decoded[0]->Ccy;
    }
}

$db = new Converter();