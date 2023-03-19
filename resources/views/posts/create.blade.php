@extends('layouts.layout')

@section('content')
    <div class="container">
        <h3>страница создания поста</h3>

        <form class="col-6" action="{{route('posts.store')}}" method="post">
            @csrf
            <div>
                <label for="title">Title:</label>
                {{-- old("title") не удалится введённое значение после ответа сервера --}}
                <input name="title" value="{{ old("title") }}" type="text" class="form-control" id="title" placeholder="title">

                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <br>

            <div>
                <label for="post_content">Content:</label>
                <textarea name="post_content" type="text" class="form-control" id="post_content" placeholder="post_content">{{ old("post_content") }}</textarea>

                @error('post_content')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <br>

            <div>
                <label for="image">Image:</label>
                <input name="image" type="text" class="form-control" id="image" placeholder="image">

                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <br>

            <label for="category">Категория:</label>
            <select name="category_id" class="form-select" id="category">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
            <br>

{{--                Выбор тегов мультиселектом--}}
{{--            <label for="tags">Теги</label>--}}
{{--             name="tags[]" // форма передаст переменную "tags", которая будет содержать массив выбранных опций --}}
{{--            <select name="tags[]" id="tags" class="form-select" multiple aria-label="multiple select example">--}}
{{--                @foreach($tags as $tag)--}}
{{--                    <option value="{{$tag->id}}">{{$tag->title_tag}}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--            <br>--}}

            <h5>Выбор тегов:</h5>
            @foreach($tags as $tag)
                <input name="tags[]" class="form-check-input" type="checkbox" value="{{$tag->id}}" id="tags">
                <label class="form-check-label" for="tags">
                    {{$tag->title_tag}}
                </label>
            @endforeach
            <br><br>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Создать пост</button>
            </div>
        </form>
    </div>
@endsection
