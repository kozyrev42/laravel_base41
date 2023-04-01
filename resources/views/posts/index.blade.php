@extends('layouts.layout')

@section('content')

    <div class="container">

        <div>Фильтр</div>
        <form class="col-6" action="{{route('post.index')}}" method="get">
            <div>
                <label for="title">найти по заголовку</label>
                <input name="title" type="text" class="form-control" id="title" placeholder="введите заголовок">
            </div>
            <br>

            <div>
                <label for="post_content">найти по контенту</label>
                <input name="post_content" type="text" class="form-control" id="post_content" placeholder="введите контент">
            </div>
            <br>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Найти</button>
            </div>
        </form>
        <hr>

        @foreach($posts as $post)
            {{-- формирование ссылки вида: /posts/{id} --}}
            <b>id:{{$post->id}}</b> <a href="{{ route('posts.show', $post->id) }}">title: {{$post->title}}</a>
            <br>

            <p>Контент: {{$post->post_content}}</p>
            <h4>Категория:</h4> {{$post->category->title}}
            <br><br>

            <h4>Тэги:</h4>
                @foreach($post->tags as $tag)
                    <div>{{$tag->title_tag}}</div>
                @endforeach
            <hr>
        @endforeach

        <div>
            {{-- withQueryString() - ссылка будет формироваться с учетом того, что уже прописано в url-e --}}
            {{$posts->withQueryString()->links()}}
        </div>
    </div>

@endsection
