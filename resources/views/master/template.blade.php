<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">

    @stack('css')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script
            src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
            integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
            crossorigin="anonymous"></script>

    @stack('js')

</head>
<body>

<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand blue" href="#">Ayojon.com</a>
            @yield('leftNavContent')
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">

            <ul class="nav navbar-nav navbar-right uppercase bold">

                {{--<li><a href="#" class=""> Demo</a></li>--}}
                {{--<li><a href="#" class=""> Demo</a></li>--}}
                {{--<li><a href="#"> Demo</a></li>--}}
                {{--<li><a href="#"> About</a></li>--}}
                {{--<li><a href="#"> Sign-in</a></li>--}}
                @if(Auth::check())
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome, {{ App\User::find(Auth::id())->username }}<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="/user/logout"><i class="icon-off"></i> Logout</a></li>
                        </ul>
                    </li>
                @elseif(Auth::guard('client')->check())
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome, {{ App\Client::find(Auth::guard('client')->id())->username }}<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="/client/logout"><i class="icon-off"></i> Logout</a></li>
                        </ul>
                    </li>
                @endif
                @yield('rightNavContent')
            </ul>
        </div>
    </div>
</nav>


    <div class="container-fluid">
        <div class="row">
            @yield('content')
        </div>
    </div>




<!-- Footer - Right Social/Left Menu -->




<footer>
    <div class="container">
        <div class="search-text">

        </div>
        <div class="row text-center">

            <div class="col-md-6 col-sm-6 col-xs-12 padding-t-1">
                <ul class="menu list-inline">

                    <li>
                        <a href="#">Home</a>
                    </li>

                    <li>
                        <a href="#">About</a>
                    </li>

                    <li>
                        <a href="#">Blog</a>
                    </li>

                    <li>
                        <a href="#">Gallery</a>
                    </li>

                    <li>
                        <a href="#">Contact</a>
                    </li>

                </ul>
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12">
                <ul class="list-inline">

                    <li>
                        <a href="#"><i class="fa fa-facebook fa-2x"></i></a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-dropbox fa-2x"></i></a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-flickr fa-2x"></i></a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-github fa-2x"></i></a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-linkedin fa-2x"></i></a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-tumblr fa-2x"></i></a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-google-plus fa-2x"></i></a>
                    </li>

                </ul>
            </div>


        </div>
    </div>
</footer>


<div class="copyright">
    <div class="container">

        <div class="row text-center">
            <p class="bold">Copyright © 2018 All rights reserved</p>
        </div>

    </div>
</div>


<!-- footer End -->



<!-- body content  start -->
</body>
</html>
