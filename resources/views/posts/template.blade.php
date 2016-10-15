<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <title>IT service</title>
    {!! Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css')!!}
    {!! Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js')!!}
    {!! Html::style('css/search.css')!!}
    <style> textarea {
            resize: none;
        } </style>
</head>

<header class="jumbotron">
    <div class="container">
        @yield('header')
    </div>
</header>
<body style="background-color: #F5F5F5;">
<div class="container">
    @yield('identification')
</div>
<div class="container">
    @yield('contenu')
</div>
</body>
<footer>
    <div>
        <center> &copy; Copyright 2016 Maxime & Brandon.
            @if(Route::getCurrentRoute()->getPath()!='about')
                <a href="about" rel="nofollow">About </a>
            @endif
        </center>

    </div>
</footer>

</html>