<?php

class Database {
    public $pdo;
    public function __construct(){
        $this->pdo = new PDO("mysql:host=localhost;dbname=Telegram_bot", "root", "root");
    }

    public function saveUserData(array $userData) {
            $stmt = $this->pdo->prepare("INSERT INTO users (telegram_user_id, username, first_name, last_name) 
                              VALUES (:telegram_user_id, :username, :first_name, :last_name)
                              ON DUPLICATE KEY UPDATE joined_at = CURRENT_TIMESTAMP");

            $sanitizedData = [
                ':telegram_user_id' => filter_var($userData['id'], FILTER_SANITIZE_NUMBER_INT),
                ':username' => filter_var($userData['username'], FILTER_SANITIZE_STRING),
                ':first_name' => filter_var($userData['first_name'], FILTER_SANITIZE_STRING),
                ':last_name' => filter_var($userData['last_name'], FILTER_SANITIZE_STRING),
            ];

            $stmt->execute($sanitizedData);
    }
}