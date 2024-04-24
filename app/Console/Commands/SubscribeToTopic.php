<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PhpMqtt\Client\Facades\MQTT;

class SubscribeToTopic extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mqtt:subscribe';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Subscribe To MQTT topic';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $mqtt = MQTT::connection();
        $mqtt->subscribe('devices/+/status', function(string $topic, string $message) {
            echo sprintf('Received message on topic [%s]: %s',$topic, $message);
        });

        $mqtt->loop(true);
        return Command::SUCCESS;
    }
}
