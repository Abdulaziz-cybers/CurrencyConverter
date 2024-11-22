<?php

class Database {
    public PDO $pdo;
    public function __construct(){
        $this->pdo = new PDO("mysql:host=localhost;dbname=Telegram_bot", "root", "root");
    }
}