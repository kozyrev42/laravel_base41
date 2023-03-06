@extends('layouts.layout')

@section('content')

    <h3>страница создания поста</h3>

    <form class="row g-3" action="{{route('posts.store')}}" method="post">
        @csrf
        <div class="col-md-6">
            <label for="title" >Title</label>
            <input name="title" type="text" class="form-control" id="title" placeholder="title">
        </div>

        <div class="col-md-6">
            <label for="post_content" >Content</label>
            <textarea name="post_content" type="text" class="form-control" id="post_content" placeholder="post_content"></textarea>
        </div>

        <div class="col-md-6">
            <label for="image" >Image</label>
            <input name="image" type="text" class="form-control" id="image" placeholder="image">
        </div>


        <div class="col-12">
            <button type="submit" class="btn btn-primary">Создать пост</button>
        </div>
    </form>
@endsection
