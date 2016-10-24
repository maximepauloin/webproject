@extends('posts.template')

@section('header')
    <div class="btn-group pull-right">
        @if(Auth::check())

            @if(Auth::user()->admin==1 )
            @else
                {!! link_to_route('post.create', 'Create an article', [], ['class' => 'btn btn-info']) !!}
            @endif
            {!! link_to('logout', 'Log out', ['class' => 'btn btn-danger']) !!}

        @else

            {!! link_to('login', 'Log in', ['class' => 'btn btn-primary']) !!}

    </div>
    @endif
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
    @if(isset($info))
        <div class="row alert alert-info">{{ $info }}</div>
    @endif
    <div class='row'>
        <div class="col-lg-2">{!! $links !!}
        </div>
    </div>
    @foreach($posts as $post)
        @if(Auth::check() and Auth::user()->admin==0 and Auth::user()->id==$post->user_id or Auth::user()->admin)
            <div class="monpost">
                <article class="row bg-default">
                    <div class="col-md-20">
                        <header>
                            @if ($post->resolv)
                                <h1>{{ $post->title }}
                                    <span class="postresolu">&#x2714 Resolved !</span>
                                </h1>
                            @else
                                <h1>{{ $post->title }}
                                    <span class="postnonresolu" ;>&#x2718 To Resolve !</span>
                                </h1>
                            @endif
                        </header>
                        <hr>
                        <section>
                            <p>{{ $post->content }}</p>
                            @if(Auth::user()->admin==0)
                                {!! link_to_route('post.edit', 'Edit', [$post->id], ['class' => 'btn btn-warning btn-xs']) !!}
                            @endif
                            @if(Auth::check() and Auth::user()->admin)
                                {!! link_to_route('post.show', 'View', [$post->id], ['class' => 'btn btn-success btn-xs']) !!}
                                @if($post->resolv==0)
                                    {!! link_to_route('post.edit', 'Resolved', [$post->id], ['class' => 'btn btn-primary btn-xs']) !!}
                                @else
                                    {!! link_to_route('post.edit', 'Resolved', [$post->id], ['class' => 'btn btn-primary btn-xs disabled']) !!}
                                @endif
                                <div class="btn-group">
                                </div>
                                <div class="btn-group">
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['post.destroy', $post->id]]) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs', 'onclick' => 'return confirm(\'Do you really want to delete this post ?\')']) !!}
                                    {!! Form::close() !!}
                                </div>
                            @endif
                            <em class="pull-right">
                                <span class="glyphicon glyphicon-pencil"></span> {{ $post->user->name }}
                                &nbsp &#9990 {{$post->user->phonenb}}
                                &nbsp
                                <small><i>Posted on {!! $post->created_at->format('M d, Y') !!}</i></small>
                            </em>
                        </section>
                    </div>
                </article>
                <br>
            </div>
            <div class="monspace">
            </div>
        @endif
    @endforeach
@endsection