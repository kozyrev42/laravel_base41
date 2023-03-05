<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

//        dd($post->title); all()
//        dd($post);
        return view('posts', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        $postsArr = [
            [
                'title' => '11111cookout',
                'content' => '111111hhbunubfrcertyu',
                'image' => '1111hguhuhuh.jpg',
                'likes' => '15',
                'is_published' => '1',
            ],
            [
                'title' => '22222cookout',
                'content' => '22222hhbunubfrcertyu',
                'image' => '22222hguhuhuh.jpg',
                'likes' => '15',
                'is_published' => '1',
            ]
        ];

//                запись в базу
//        Post::create([
//            'title' => 'cookout',
//            'content' => 'hhbunubfrcertyu',
//            'image' => 'hguhuhuh.jpg',
//            'likes' => '15',
//            'is_published' => '1',
//        ]);

//      запись в базу, множества записей в Цикле
//        foreach ($postsArr as $item) {
//            Post::create($item);
//        }
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

        dd($post);

    }
}
