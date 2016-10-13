@extends('posts.template')
@section('header')
    @if(Auth::check())
        <div class="btn-group pull-right">
            @if(Auth::user()->admin==1 )
                {{-- TO MODIFY WITH ADMIN VIEW --}}
                {!! link_to_route('post.create', 'Admin page', [], ['class' => 'btn btn-primary']) !!}
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
@section('contenu')
    <br>
    <div class="col-sm-offset-3 col-sm-6">
        <div class="panel panel-primary">

                <div class="panel-heading">Add an article</div>
                <div class="panel-body">
                    {!! Form::open(['route' => 'post.store']) !!}
                    <div class="form-group {!! $errors->has('title') ? 'has-error' : '' !!}">
                        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
                        {!! $errors->first('title', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('content') ? 'has-error' : '' !!}">
                        {!! Form::textarea ('content', null, ['class' => 'form-control', 'placeholder' => 'Content']) !!}
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