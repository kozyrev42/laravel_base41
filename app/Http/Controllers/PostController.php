<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        // получаем все категории, отправляем на страницу, для дальнейшего выбора
        $categories = Category::all();

        // получим все теги, отправим на страницу
        $tags = Tag::all();

        return view('posts.create', compact('categories', 'tags'));
    }


    // экшен записи в бд
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'string',
            'post_content' => 'string',
            'image' => 'string',
            'category_id' => 'integer',
            'tags' => '' // прилетает массив с выбранными тегами
        ]);

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

        return view('posts.edit', compact('post','categories'));
    }


    //    обновление
    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'post_content' => 'string',
            'image' => 'string',
            'category_id' => 'integer'
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
