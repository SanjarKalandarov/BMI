<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpMqtt\Client\Facades\MQTT;

class MqttController extends Controller
{

    public function testConnection()
    {
        try {
            MQTT::connectUsingEnv();
            echo "MQTT brokeriga muvaffaqiyatli ulanildi.";
        } catch (\PhpMqtt\Client\Exceptions\ConnectingToBrokerFailedException $e) {
            echo "MQTT brokeriga ulanishda xato: " . $e->getMessage();
        }
    }
}
