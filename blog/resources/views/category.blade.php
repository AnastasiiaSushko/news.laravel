@extends('layouts.master')


@section('content')



    <div class="thumbnail">
            <h3 style="text-align: center"><a href="/category/{{$category->id}}">{{$category->title}}</a> </h3>

            <ul>

                @foreach($articles as $article)
                        <li><a href="/article/{{$article->id}}"> {{$article->title}}</a> </li> <br>
        @endforeach
            </ul>
    </div>

            {{$articles->links()}}


@endsection
