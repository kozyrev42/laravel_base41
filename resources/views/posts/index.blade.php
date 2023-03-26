@extends('layouts.layout')

@section('content')

    <div class="container">
        @foreach($posts as $post)
            {{-- формирование ссылки вида: /posts/{id} --}}
            <a href="{{ route('posts.show', $post->id) }}">{{$post->title}}</a>
            <br>

            <h4>Категория:</h4> {{$post->category->title}}
            <br><br>

            <h4>Тэги:</h4>
                @foreach($post->tags as $tag)
                    <div>{{$tag->title_tag}}</div>
                @endforeach
            <hr>
        @endforeach

        <div>
            {{$posts->links()}}
        </div>
    </div>

@endsection
