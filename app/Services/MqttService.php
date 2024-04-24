<?php

namespace App\Services;

use PhpMqtt\Client\MqttClient;

class MqttService
{
    protected $client;

    public function __construct()
    {
        // MQTT serveri ma'lumotlari
        $host = '195.158.8.44';
        $port =44;
        $username = 'mqtt';
        $password = 'mqtt_root_password
        ';
        $clientId = 'client_id';

        // MQTT klientini yaratish
        $this->client = new MqttClient($host, $port, $clientId);
        $this->client->connect($username, $password);
    }

    public function publish($topic, $message)
    {
        // Xabar yuborish
        $this->client->publish($topic, $message);
    }

    public function subscribe($topic, $callback)
    {
        // MQTT ga obuna bo'lish
        $this->client->subscribe($topic, $callback);
    }
}
