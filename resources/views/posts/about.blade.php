@extends('posts.template')

@section('header')
    @if(Auth::check())
        <div class="btn-group pull-right">
            {!! link_to_route('post.index', 'Posts page', [], ['class' => 'btn btn-info']) !!}
            @if(Auth::user()->admin==1 )
            @else
                {!! link_to_route('post.create', 'Create an article', [], ['class' => 'btn btn-info']) !!}
            @endif
            {!! link_to('logout', 'Log out', ['class' => 'btn btn-danger']) !!}
        </div>
    @else
        {!! link_to('login', 'Log in', ['class' => 'btn btn-info pull-right']) !!}
    @endif
@endsection
@section('identification')
    <br>
    <div class="col-sm-offset-3 col-sm-6">
        <div class="panel panel-info">
            @if(Auth::check())
                <p>You are connected
                    as {{Auth::user()->name}} {{ Auth::user()->admin==1 ? ' - Administrator' : ''}}  </p>
                <p>&#9990 {{Auth::user()->phonenb}}</p>
                <p>Job: {{Auth::user()->jobtitle}}</p>
            @else
                <p>You are not logged in</p>
            @endif
        </div>
    </div>

@endsection
@section('contenu')<br>
<div class="col-sm-offset-3 col-sm-6">
    <div class="panel panel-primary">

        <div class="panel-heading">About</div>
        <div class="panel-body">
            <p>This website was been created by two ESIEA students Maxime & Brandon.</p>
            <p>We used the Laravel Framework, Git and PhpStorm.</p>
        </div>
    </div>
</div>
</div>


@endsection