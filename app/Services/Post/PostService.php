<?php

namespace App\Services\Post;

use App\Models\Post;

class PostService
{
    // создание нового поста в бд
    public function store($data)
    {
        // сохраняем массив тегов в переменнную
        $tags = $data['tags'];

        // удаляем массив тегов по ключу
        unset($data['tags']);

        // сохраним Пост в Базу, вернётся id созданного поста
        // метод create() ждёт массив с ключами и значениями
        $post = Post::create($data);

        // к полученному Посту, через отношение, приклепляем теги (запись в соединительную таблицу)
        $post->tags()->attach($tags);
    }

    public function update($post, $data)
    {

        // сохраняем массив тегов в переменнную
        $tags = $data['tags'];

        // удаляем массив тегов по ключу
        unset($data['tags']);

        // обновляем Пост
        $post->update($data);

        // sync() - старые привязки удаляет, которые были привязаня "атачем", новые Теги "Атачим"
        $post->tags()->sync($tags);
    }

}
