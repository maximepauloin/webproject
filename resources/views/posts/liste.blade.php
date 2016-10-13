@extends('posts.template')

@section('header')
    {!! Html::style('css/search.css')!!}
    @if(Auth::check())
        <div class="align-right">

            <div class="btn-group pull-right">

                @if(Auth::user()->admin==1 )
                    {{--CHANGE TO ADMIN PAGE--}}
                    {!! link_to_route('post.create', 'Admin page', [], ['class' => 'btn btn-primary']) !!}
                @else
                    {!! link_to_route('post.create', 'Create an article', [], ['class' => 'btn btn-info']) !!}
                @endif
                {!! link_to('logout', 'Log out', ['class' => 'btn btn-danger']) !!}
            </div>

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
    <div class='container'>
        <div class="align-left">{!! $links !!}</div>
        <div class="align-right">

            <div class="form-group has-feedback">
                <label for="search" class="sr-only">Search</label>
                <input type="text" class="form-control" name="search" id="search" placeholder="search">

                <span class="glyphicon glyphicon-search form-control-feedback"></span>
            </div>

        </div>
    </div>

    @foreach($posts as $post)

        <div class="cad" style="border: 1px solid grey;">

            <div class="media" enctype="multipart/form-data">
                <div class="media-left">
                    {{ HTML::image('image/avatar1.png') }}
                    <img src="{{URL::asset('image/avatar1.png')}}" alt=""/>

                </div>
                <div class="media-body">
                    <div class="align-left">
                        <h4 class="media-heading">
                            {{$post->user->name}}
                            <small><i>Posted on {!! $post->created_at->format('M d, Y') !!}</i></small>
                        </h4>

                    </div>
                    <div class="align-right">

                        @if ($post->resolv)
                            <h5>{{ $post->title }}
                                <span style="color:#40D76B">&#x2714 Resolved !</span>
                            </h5>
                        @else
                            <h5>{{ $post->title }}
                                <span style="color:#ff4d4d">&#x2718 To Resolve !</span>
                            </h5>
                        @endif


                        <p>{{ $post->content }}</p>
                    </div>
                </div>
            </div>
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
        </div>
    @endforeach
    {!! $links !!}
@endsection