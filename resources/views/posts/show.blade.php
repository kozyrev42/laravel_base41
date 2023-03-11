@extends('layouts.layout')

@section('content')
    {{$post->id}}
    <br>
    {{$post->title}}
    <br>
    {{$post->post_content}}
    <br>
    {{$post->image}}
    <br>

    <a href="{{route('posts.edit', $post->id)}}">Редактировать Пост</a>
    <br>

    <form action="{{route('posts.destroy', $post->id)}}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-primary">Удалить Пост</button>
    </form>
@endsection
