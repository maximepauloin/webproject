@extends('posts.template')

@section('header')

    <div class="btn-group pull-right">
        @if(Auth::check())
            {!! link_to_route('post.index', 'Posts page', [], ['class' => 'btn btn-info']) !!}
            {!! link_to_route('post.create', 'Create an article', [], ['class' => 'btn btn-info']) !!}
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
    </div>

@endsection

@section('contenu')
    <div class="col-sm-offset-3 col-sm-6">
        <br>
        <div class="panel panel-primary">
            <div class="panel-heading">Modification of the post "{{ $post->title }}"</div>
            <div class="panel-body">
                <div class="col-sm-12">
                    {!! Form::model($post, ['route' => ['post.update', $post->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
                    <div class="form-group {!! $errors->has('title') ? 'has-error' : '' !!}">
                        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
                        {!! $errors->first('title', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('content') ? 'has-error' : '' !!}">
                        {!! Form::text('content', null, ['class' => 'form-control', 'placeholder' => 'Message']) !!}
                        {!! $errors->first('content', '<small class="help-block">:message</small>') !!}
                    </div>
                    @if(Auth::user()->admin==1)
                        <div class="form-group {!! $errors->has('resolv') ? 'has-error' : '' !!}">Resolved
                            {{ Form::hidden('resolv', 0, null, ['class' => 'field']) }}
                            {{ Form::checkbox('resolv', 1, null, ['class' => 'field']) }}
                        </div>
                    @else
                        <div style="visibility: hidden"
                             class="form-group {!! $errors->has('resolv') ? 'has-error' : '' !!}">Resolved
                            {{ Form::hidden('resolv', 0, null, ['class' => 'field']) }}
                            {{ Form::checkbox('resolv', 1, null, ['class' => 'field']) }}
                        </div>
                    @endif
                    {!! Form::submit('Send', ['class' => 'btn btn-primary pull-right']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <a href="javascript:history.back()" class="btn btn-primary">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Back
        </a>
    </div>
@endsection