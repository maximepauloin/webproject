<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../../favicon.ico">
    <title>IT service</title>
    {!! Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css')!!}
    {!! Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js')!!}
    <![endif]-->
    <style> textarea {
            resize: none;
        } </style>
</head>
<body>
<header class="jumbotron">
    <div class="container">
        <h1 class="page-header">{!! link_to_route('post.index', 'IT helpdesk') !!}</h1>
        @yield('header')
    </div>
</header>
<div class="container">
    @yield('identification')
</div>
<div class="container">
    @yield('contenu')
</div>
</body>
<footer>
    <div>
        <center> &copy; Copyright 2016 Maxime & Brandon.</center>
    </div>
</footer>

</html>