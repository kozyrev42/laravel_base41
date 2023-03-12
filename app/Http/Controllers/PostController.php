<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // $post = Post::find(1);
        // $tag = Tag::find(2);
        // dd($tag->posts);

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

    // контроллер возвращает страницу для редактирования поста
    // compact('post') - проброс Объекта, заменяет следующий код: ['post'=>$post]
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }


    //    обновление
    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'post_content' => 'string',
            'image' => 'string',
        ]);
        // метод create() ждёт массив с ключами и значениями
        $post->update($data);
        return redirect()->route('posts.show', $post->id);
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
