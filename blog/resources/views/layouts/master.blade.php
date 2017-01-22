<!doctype html>     <!--   !+tab   -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Новостной портал</title>
    <link rel="icon" href="http://ru.seaicons.com/wp-content/uploads/2015/06/Cat-Black-White-icon.png">


    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style1.css">


    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <link href="http://getbootstrap.com/examples/starter-template/starter-template.css" rel="stylesheet">
    <link href="http://getbootstrap.com/examples/sticky-footer-navbar/sticky-footer-navbar.css" rel="stylesheet">
    <link href="http://getbootstrap.com/examples/carousel/carousel.css" rel="stylesheet">

    <!--Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Archivo+Black" rel="stylesheet">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>


    <script src="/js/jquery.arcticmodal-0.3.min.js"></script>
    <script src="/js/jquery.cookie.min.js"></script>
    <script src="/js/1.js"></script>


</head>
<body>



<nav class="navbar navbar-inverse navbar-fixed-top">

    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a tabindex="-1" class="navbar-brand" href="/">Новостной портал</a>

    </div>
    <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                   aria-haspopup="true" aria-expanded="false">Категории <span class="caret"></span></a>
                <ul class="dropdown-menu">

                    @foreach($menu as $category)
                        <li class="menu-item dropdown dropdown-submenu"><a tabindex="-1"
                                                                           href="/category/{{$category->id}}">{{$category->title}}</a>
                            <ul class="dropdown-menu">
                                <li class="menu-item "><a href="#"> Link</a></li>
                                <li class="menu-item "><a href="#"> link</a></li>
                            </ul>
                        </li>

                    @endforeach
                </ul>
            </li>

            @if (($user = Auth::user()) && $user->moderator)
                <li><a href="/admin"   style="color:blue">Admin panel</a></li>
            @endif
        </ul>



        <form class="navbar-form navbar-left" method="get">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-info">Поиск</button>
        </form>



        <ul class="nav navbar-nav navbar-right" style="margin-right: 40px">
            <!-- Authentication Links -->
            @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Войти</a></li>
                <li><a href="{{ url('/register') }}">Регистрация</a></li>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ url('/logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Выйти
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>

    </div>

</nav>

<!--/.nav-collapse -->


<!-- Carousel-->
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">

        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">

                @foreach ($sliders as $key=>$slider)

                    @if($key==0)

                        <div class="item active">
                            <img class="first-slide" src="{{$slider->main_photo}}" alt="First slide">
                            <div class="container">
                                <div class="carousel-caption">
                                    <h1 class="h1">{{$slider->title}}</h1>
                                    <p><<>></p>
                                    <p><a class="btn btn-lg btn-primary" href="/article/{{$slider->id}}" role="button">Читать
                                            дальше..</a></p>
                                </div>
                            </div>
                        </div>


                    @elseif($key == 1)
                        <div class="item">
                            <img class="second-slide" src="{{$slider->main_photo}}" alt="Second slide">
                            <div class="container">
                                <div class="carousel-caption">
                                    <h1 class="h1">{{$slider->title}}</h1>
                                    <p><<>></p>
                                    <p><a class="btn btn-lg btn-primary" href="/article/{{$slider->id}}" role="button">Читать
                                            дальше..</a></p>
                                </div>
                            </div>
                        </div>



                    @else
                        <div class="item">
                            <img class="third-slide" src="{{$slider->main_photo}}" alt="Third slide">
                            <div class="container">
                                <div class="carousel-caption">
                                    <h1 class="h1">{{$slider->title}}</h1>
                                    <p><<>></p>
                                    <p><a class="btn btn-lg btn-primary" href="/article/{{$slider->id}}" role="button">
                                            Читать дальше..</a></p>
                                </div>
                            </div>
                        </div>

                    @endif
                @endforeach

            </div>
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </div>


</div>
<!-- /.carousel -->


<!-- Main content -->

<h1 style="text-align: center"> Новостной портал, будь в курсе всего... </h1><br>
<div class="container" id="categories">


    <div class="row">

        <!--sidebar - left -->
        <div class="col-md-2">


            @for($i=0;$i<4;$i++)
                <div class="thumbnail">
                    <div class="caption">
                        <h4><a href="{{$advertisements[$i]->path}}">{{$advertisements[$i]->title}} </a></h4>

                        <p><a href="{{$advertisements[$i]->path}}" ><img src="{{$advertisements[$i]->image}}" style="height: 100px"></a></p>
                    </div>
                    <p class="small">Лучшая цена -{{$advertisements[$i]->price}}$ </p>
                    <p style="text-align: center">{{$advertisements[$i]->name_company}}</p>

                </div>

            @endfor

            <style>
                p.small{
                    font-size: 100%;


                }
                p.small:hover{
                    color:red;
                    font-size: 90%;
                    font-family: 'Archivo Black', sans-serif;;

                }


            </style>


        </div>

        <div class="col-md-8">

            @yield('content')

        </div>

        <!--sidebar - right -->
        <div class="col-md-2">

            @for($i=4;$i<8;$i++)
                <div class="thumbnail">
                    <div class="caption">
                        <h4><a href="{{$advertisements[$i]->path}}">{{$advertisements[$i]->title}} </a></h4>

                        <p><a href="{{$advertisements[$i]->path}}" > <img src="{{$advertisements[$i]->image}}" style="height: 100px"> </a></p>
                    </div>
                    <p class="small">Лучшая цена -{{$advertisements[$i]->price}}$ </p>
                    <p style="text-align: center">{{$advertisements[$i]->name_company}}</p>

                </div>

            @endfor

        </div>


    </div> <!-- /row -->

</div> <!-- /container -->
<!-- End main content -->


<div class="container">

    <hr class="featurette-divider">

    <!-- FOOTER -->

    <footer>
        <p class="pull-right"><a href="#">Вверх</a></p>
        <p>&copy; 2016 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>

    </footer>
</div>



<!-- Modal subscribe -->

<div id="parent_popup">
    <div id="popup">
    <span style="font:24px Monotype Corsiva, Arial;
	      color: #008000;
	      text-align: left;
	      text-shadow: 0 1px 3px rgba(0,0,0,.3);">Оформить подписку...</span><br><br/>
        <form action="" method="post">
            <input type="text" name="name" id="name" placeholder="Your name"><br><br>
            <input type="text" name="email" id="email" placeholder="Your email"><br><br>
        </form>
        <p style="text-align: center; font-size:18px;"><strong><a href="#">Подписаться »</a></strong></p>
        <a class="close" title="Закрыть" onclick="document.getElementById('parent_popup').style.display='none';">X</a>
    </div>
</div>


<script>


    //window.onbeforeunload = function(){return confirm('Покинуть страницу?');};

</script>

</body>
</html>