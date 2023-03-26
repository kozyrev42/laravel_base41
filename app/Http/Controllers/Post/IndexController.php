<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        // $post = Post::find(1);
        // $tag = Tag::find(2);
        // dd($tag->posts);

        // $posts = Post::all();
        $posts = Post::paginate(5);
        return view('posts.index', [
            'posts' => $posts
        ]);
    }
}
