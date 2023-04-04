<?php

namespace App\Console\Commands;

use App\Components\MyHttpClient;
use Illuminate\Console\Command;

class MyImportJsonCommand extends Command
{
    /**
     * The name and signature of the console command.
     * @var string
     */
    // вызов команды php artisan import:json
    protected $signature = 'import:json';


    /**
     * The console command description.
     * @var string
     */
    protected $description = 'Описание команды - Получение данных со стороннего сервера';


    /**
     * Create a new command instance.
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     *  Execute the console command.
     *  При вызове команды, дёргается этот метод handle()
     * @return int
     */
    public function handle()
    {
        // создаём объект нового запроса
        $import = new MyHttpClient();

        // выполняем запрос
        $response = $import->client->request('GET', 'posts/2');

        // извлекаем данные из ответа
        $data = $response->getBody()->getContents();
        dd($data);

        // далее можно работать с данными, например записать в базу
    }
}
