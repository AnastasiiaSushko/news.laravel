@extends('layouts.master')

@section('content')

    @foreach($categories as $category)
        <div class="thumbnail">
                <div class="caption">
                    <h3><a href="/category/{{$category->id}}">{{$category->title}}</a></h3>
                    <p>
                    <ul>
                        @foreach($category->lastArticles() as $article)

                            <li><a href="/article/{{$article->id}}"> {{$article->title}}</a></li> <br>
                        @endforeach
                    </ul>
                    </p>
                </div>

        </div>
        @endforeach

@endsection



















