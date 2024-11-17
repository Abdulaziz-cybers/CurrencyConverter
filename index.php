<?php

require 'src/Converter.php';

$currency = new Converter();

$currencies = $currency->getCurrencies();

require 'resourses/views/currency.php';

require 'src/Bot.php';
$bot = new Bot();
$bot->getUpdates();