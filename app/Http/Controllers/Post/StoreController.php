<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;
/*
 *
 * New post db write action
 *
*/

class StoreController extends Controller
{
    public function __invoke(UpdateRequest $request)
    {
        // валидируем входяшие данные используя UpdateRequest
        $data = $request->validated();

        // сохраняем массив тегов в переменнную
        $tags = $data['tags'];

        // удаляем массив тегов по ключу
        unset($data['tags']);

        // сохраним Пост в Базу, вернётся id созданного поста
        // метод create() ждёт массив с ключами и значениями
        $post = Post::create($data);

        // к полученному Посту, через отношение, приклепляем теги (запись в соединительную таблицу)
        $post->tags()->attach($tags);

        return redirect()->route('post.index');
    }
}
