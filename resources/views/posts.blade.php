@extends('layouts.layout')

@section('content')

    @foreach($posts as $post)
        {{$post->title}}
        <hr>
    @endforeach

@endsection
