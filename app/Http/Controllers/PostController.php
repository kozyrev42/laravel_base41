<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // страница создания поста
    public function create()
    {
        // получаем все категории, отправляем на страницу, для дальнейшего выбора
        $categories = Category::all();

        // получим все теги, отправим на страницу
        $tags = Tag::all();

        return view('posts.create', compact('categories', 'tags'));
    }


    // прилетает id, по этому id создаётся Объект Поста
    public function show(Post $post)
    {
        return view('posts.show',[
            'post' => $post
        ]);
    }

    // контроллер возвращает страницу для редактирования поста
    // compact('post') - проброс Объекта, заменяет следующий код: ['post'=>$post]
    public function edit(Post $post)
    {
        // получаем все категории, отправляем на страницу, для дальнейшего выбора
        $categories = Category::all();

        // получим все "теги" из базы, отправляем на страницу
        $tags = Tag::all();

        return view('posts.edit', compact('post','categories', 'tags'));
    }


    //    удаление
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }


    //  поможет вам найти запись в таблице базы данных и возвращает,
    //  если в таблице базы данных нет записей, он создаст новую запись
    public function firstOrCreate()
    {
        $post = Post::firstOrCreate(
            [
                'title' => 'alex',
                'content' => '111111hhbunubfrcertyu',
            ],
        );
    }
}
