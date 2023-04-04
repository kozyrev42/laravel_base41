<?php

namespace App\Components;

use GuzzleHttp\Client;

class MyHttpClient
{
    public $client;

    /**
     * @param $client
     */
    public function __construct()
    {
        $this->client = new Client([
            // базовый url, на который будем слать запросы
            'base_uri'=>'https://jsonplaceholder.typicode.com/',

            // время которое ждет мой сервер, ответа от стороннего сервера
            'timeout'=>5.0,

            // может понадобится если будет проблема с https
            //'verify'=>false,
        ]);
    }


}
