@extends('layouts.layout')

@section('content')
    {{$post->id}}
    <br>
    {{$post->title}}
    <br>
    {{$post->post_content}}

@endsection
