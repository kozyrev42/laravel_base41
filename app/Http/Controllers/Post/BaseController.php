<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Services\Post\PostService;

// будем использовать класс, что бы избежать дальнейшее дублирование кода, для подключению PostService
class BaseController extends Controller
{
    public $service;

    public function __construct(PostService $service)
    {
        // присвоили свойству созданный экземпляр класса
        $this->service = $service;
    }
}
