<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __invoke()
    {
        // TODO: Implement __invoke() method.
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
            'title' => 'string|required',
            'post_content' => 'string|required',
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

        // получим все "теги" из базы, отправляем на страницу
        $tags = Tag::all();

        return view('posts.edit', compact('post','categories', 'tags'));
    }


    //    обновление
    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string|required',            // тип должен быть строкой|обязательно к заполнению
            'post_content' => 'string|required',
            'image' => 'string',
            'category_id' => 'integer',
            'tags' => '' // прилетает массив с выбранными тегами
        ]);

        // сохраняем массив тегов в переменнную
        $tags = $data['tags'];

        // удаляем массив тегов по ключу
        unset($data['tags']);

        // обновляем Пост
        $post->update($data);

        // sync() - старые привязки удаляет, которые были привязаня "атачем", новые Теги "Атачим"
        $post->tags()->sync($tags);

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
