@extends('layouts.layout')

@section('content')
    <div class="container">
        <h3>страница редактирования поста</h3>

        <form class="col-6" action="{{route('posts.update', $post->id)}}" method="post">

            @csrf
            @method('patch')

            <div>
                <label for="title" >Title</label>
                <input name="title" value="{{$post->title}}" type="text" class="form-control" id="title" placeholder="title" >
            </div>
            <br>


            <div>
                <label for="post_content">Content</label>
                <textarea name="post_content" type="text" class="form-control" id="post_content" placeholder="post_content">{{$post->post_content}}</textarea>
            </div>
            <br>


            <div>
                <label for="image" >Image</label>
                <input name="image" value="{{$post->image}}" type="text" class="form-control" id="image" placeholder="image">
            </div>
            <br>

            <label for="category" >Категория</label>
            <select name="category_id" class="form-select" id="category">
                @foreach($categories as $category)
                    <option
                        {{-- если категория поста соответствует какой-либо категории из доступных, она "выбирается" --}}
                        {{$category->id === $post->category->id ? 'selected' : ''}}
                        value="{{$category->id}}">
                            {{$category->title}}
                    </option>
                @endforeach
            </select>
            <br>

            {{-- также получим все теги, и отметим те, которые есть у поста --}}
            <label for="tags">Теги</label>
            {{-- name="tags[]" // форма передаст переменную "tags", которая будет содержать массив выбранных опций --}}
            <select name="tags[]" id="tags" class="form-select" multiple>
                {{-- перебираем теги из базы --}}
                @foreach($tags as $tag)
                    <option
                        {{-- перебираем теги которые принадлежат посту, чтобы в option указать 'selected' --}}
                        @foreach($post->tags as $tagPost)
                            {{$tag->id === $tagPost->id ? 'selected' : ''}}
                        @endforeach
                        value="{{$tag->id}}">
                            {{$tag->title_tag}}
                    </option>
                @endforeach
            </select>
            <br>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">редактировать пост</button>
            </div>
        </form>
    </div>

@endsection
