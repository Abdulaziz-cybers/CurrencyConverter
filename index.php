<?php

require 'src/Converter.php';

$currency = new Converter();

$currencies = $currency->getCurrencies();


require 'resourses/views/currency.php';
