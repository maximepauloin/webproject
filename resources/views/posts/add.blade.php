@extends('posts.template')
@section('header')
    <div class="btn-group pull-right">
        @if(Auth::check())
            {!! link_to_route('post.index', 'Posts page', [], ['class' => 'btn btn-info']) !!}
            {!! link_to('logout', 'Log out', ['class' => 'btn btn-danger']) !!}
        @else
            {!! link_to('login', 'Log in', ['class' => 'btn btn-primary']) !!}

        @endif
    </div>
@endsection
@section('identification')
    <br>
    <div class="col-sm-offset-3 col-sm-6">
        <div class="panel panel-info">

            <div class="panel-heading">Informations</div>
            <div class="panel-body">
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
    </div>
    </br>
@endsection
@section('contenu')
    <br>

    <div class="col-sm-offset-3 col-sm-6">
        <div class="panel panel-primary">

            <div class="panel-heading">Add an article</div>
            <div class="panel-body">
                {!! Form::open(['route' => 'post.store']) !!}
                <div class="form-group {!! $errors->has('title') ? 'has-error' : '' !!}">
                    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'title']) !!}
                    {!! $errors->first('title', '<small class="help-block">:message</small>') !!}
                </div>
                <div class="form-group {!! $errors->has('content') ? 'has-error' : '' !!}">
                    {!! Form::textarea ('content', null, ['class' => 'form-control', 'placeholder' => 'content']) !!}
                    {!! $errors->first('content', '<small class="help-block">:message</small>') !!}
                </div>
                {!! Form::submit('Send !', ['class' => 'btn btn-info pull-right']) !!}
                {!! Form::close() !!}
            </div>
        </div>
        <a href="javascript:history.back()" class="btn btn-primary">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Back
        </a>

    </div>
    </br>
@endsection