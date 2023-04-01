<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();   // валидация данных
        //dd($data);

        /*
         * array_filter($data) // функция с единственным параметром занимается тем, что удаляет все пустые поля, оставляя только имеющие значения
         * */
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->paginate(3);

        return view('posts.index', [
            'posts' => $posts
        ]);
    }
}
