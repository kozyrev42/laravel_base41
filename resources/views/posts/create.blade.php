@extends('layouts.layout')

@section('content')
    <div class="container">
        <h3>страница создания поста</h3>

        <form class="col-6" action="{{route('posts.store')}}" method="post">
            @csrf
            <div>
                <label for="title" >Title</label>
                <input name="title" type="text" class="form-control" id="title" placeholder="title">
            </div>
            <br>

            <div>
                <label for="post_content" >Content</label>
                <textarea name="post_content" type="text" class="form-control" id="post_content" placeholder="post_content"></textarea>
            </div>
            <br>

            <div>
                <label for="image" >Image</label>
                <input name="image" type="text" class="form-control" id="image" placeholder="image">
            </div>
            <br>

            <label for="category" >Категория</label>
            <select name="category_id" class="form-select" id="category">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
            <br>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Создать пост</button>
            </div>
        </form>
    </div>
@endsection
