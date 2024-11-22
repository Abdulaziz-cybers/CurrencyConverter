<?php
require 'Database.php';
use GuzzleHttp\Client;
class Bot
{
    const API_URL = "https://api.telegram.org/bot";
    public $client;
    private $token = '7135673262:AAFs1uxs6YsDswaQJs0iV_zIpw1YUAd_-aM';

    public function makeRequest($method, $data = []){
        $this->client = new Client([
            'base_uri' => self::API_URL . $this->token . '/',
            'timeout'  => 5.0,
        ]);
        $response = $this->client->request('POST', $method, ['json' => $data]);
        return $response;
    }

    public function saveUser($user_id, $username): bool {
        $db = new Database();
        $query = "INSERT INTO bot_users (user_id, username) VALUES (:user_id, :username)";
        return $db->pdo->prepare($query)->execute([
            ':user_id' => $user_id,
            ':username' => $username
        ]);
    }

    public function sendMessageWithKeyboard($chatId, $message, $keyboard) {
        $data = [
            'chat_id' => $chatId,
            'text' => $message,
            'reply_markup' => json_encode([
                'keyboard' => $keyboard,
                'resize_keyboard' => true,
                'one_time_keyboard' => false
            ])
        ];
        file_get_contents(self::API_URL . $this->token ."sendMessage?" . http_build_query($data));
    }
}

