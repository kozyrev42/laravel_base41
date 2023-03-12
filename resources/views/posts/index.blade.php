@extends('layouts.layout')

@section('content')

    @foreach($posts as $post)
        {{-- формирование ссылки вида: /posts/{id} --}}
        <a href="{{ route('posts.show', $post->id) }}">{{$post->title}}</a>
        <br>

        <h5>Категория:</h5> {{$post->category->title}}
        <br>

        <h5>Тэги:</h5>
        @foreach($post->tags as $tag)
            <p>{{$tag->title_tag}}</p>
        @endforeach
        <hr>
    @endforeach

@endsection
