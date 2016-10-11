@extends('posts.template    ')

@section('header')
    @if(Auth::check())
        <div class="btn-group pull-right">
            {!! link_to_route('post.create', 'Create an article', [], ['class' => 'btn btn-info']) !!}
            {!! link_to('logout', 'Log out', ['class' => 'btn btn-warning']) !!}
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

    @if(isset($info))
        <div class="row alert alert-info">{{ $info }}</div>
    @endif
    {!! $links !!}
    @foreach($posts as $post)
        <article class="row bg-primary">
            <div class="col-md-12">
                <header>

                    @if ($post->resolv)
                        <h1>{{ $post->title }}
                            <span style="color:#40D76B">&#x2714 Resolved !</span>
                        </h1>
                    @else
                        <h1>{{ $post->title }}
                            <span style="color:#ff4d4d">&#x2718 To Resolve !</span>
                        </h1>
                    @endif
                </header>
                <hr>
                <section>
                    <p>{{ $post->content }}</p>
                    @if(Auth::check() and Auth::user()->admin)
                        {!! Form::open(['method' => 'DELETE', 'route' => ['post.destroy', $post->id]]) !!}
                        {!! Form::submit('Supprimer cet article', ['class' => 'btn btn-danger btn-xs ', 'onclick' => 'return confirm(\'Vraiment supprimer cet article ?\')']) !!}
                        {!! Form::close() !!}
                    @endif
                    <em class="pull-right">
                        <span class="glyphicon glyphicon-pencil"></span> {{ $post->user->name }}
                        &nbsp &#9990 {{$post->user->phonenb}}
                        &nbsp the {!! $post->created_at->format('d-m-Y') !!}
                    </em>
                </section>
            </div>
        </article>
        <br>
    @endforeach
    {!! $links !!}
@endsection