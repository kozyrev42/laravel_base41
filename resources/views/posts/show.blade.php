@extends('layouts.layout')

@section('content')
    <div class="container">
        id: {{$post->id}}
        <br>

        title: {{$post->title}}
        <br>

        content: {{$post->post_content}}
        <br>

        image: {{$post->image}}
        <br>

        <hr>
        <h5>Тэги поста:</h5>
        @foreach($post->tags as $tag)
            <div>{{$tag->title_tag}}</div>
        @endforeach


        <a href="{{route('posts.edit', $post->id)}}">Редактировать Пост</a>
        <br>

        <form action="{{route('posts.destroy', $post->id)}}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-primary">Удалить Пост</button>
        </form>
    </div>
@endsection
