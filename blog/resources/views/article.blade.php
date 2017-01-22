@extends('layouts.master')

@section('content')

    <big><em>{!!$new->content!!}</em></big><br><br>


    <p class="text-success"><b> Прочитало : </b> {{$new->hits}} </p>
    <p class="text-info"><b>Сейчас читает : </b> <span id="online"></span></p>


    @if(Auth::user())
        <h3>Оставить комментарий..</h3>
        <form method="post" action="/article/{{ $new->id }}">
            {{csrf_field()}}

                <textarea name="comment" rows="8"  cols="50"></textarea></br>
                <button type="submit" class="btn btn-info">Оставить комментарий</button>
        </form>
        <hr>
        @else
        <h3>Чтобы оставить комментарий необходимо залогиниться..</h3>
        @endif







    <script type="text/javascript">

        setInterval(function () {
            var min = 0;
            var max = 5;
            var online = Math.floor(Math.random() * (max - min + 1) + min);
            $('#online').text(online);
        },3000)
    </script>




@endsection


