<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <title>IT service</title>
    {{ Html::style('css/style.css') }}
    {!! Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css')!!}
    {!! Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js')!!}


</head>

<header class="jumbotron">
    <div class="montitre">
        <h1>IT Helpdesk</h1>
    </div>
    <div class="container">

        @yield('header')
    </div>
</header>
<body class="monbackground">
<div class="container">
    @yield('identification')
</div>
<div class="container">
    @yield('contenu')
</div>
</body>
<footer>

    <div class="monfooter">
        <p class="monfooter">&copy; Copyright 2016 Maxime & Brandon.
            @if(Route::getCurrentRoute()->getPath()!='about')
                <a href="about" rel="nofollow">About </a>
            @endif
        </p>

    </div>
</footer>

</html>