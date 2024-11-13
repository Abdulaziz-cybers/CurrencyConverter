<?php

require 'Converter.php';

$currency = new Converter();

$currencies = $currency->getCurrencies();

require 'views/currency.php';
