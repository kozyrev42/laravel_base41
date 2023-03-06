<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    // страница создания поста
    public function create()
    {
        return view('posts.create');
    }


    // экшен записи в бд
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'string',
            'post_content' => 'string',
            'image' => 'string',
        ]);
        // метод create() ждёт массив с ключами и значениями
        Post::create($data);
        return redirect()->route('post.index');
    }

    // прилетает id, по этому id создаётся Объект Поста
    public function show(Post $post)
    {
        return view('posts.show',[
            'post' => $post
        ]);
    }

//    обновление
    public function update()
    {

        $post = Post::find(1);

        $post->update([
            'title' => 'обновленный тайтл',
            'content' => 'обновленный content',
            'image' => 'обновленный-image.jpg',
            'likes' => '20',
            'is_published' => '1',
        ]);


        $post = Post::find(1);
        dd($post);
    }

//    удаление
    public function delete()
    {

        $post = Post::find(2);
        $post->delete();
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
