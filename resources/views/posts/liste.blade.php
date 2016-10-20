@extends('posts.template')

@section('header')

    @if(Auth::check())
        <div class="row">
            <div class="col-sm-4">
                <h1 class="page-header" style="color:#003399">IT Helpdesk</h1>

            </div>
            <div class="col-sm-4"></div>
            <div class="col-sm-4" style="padding-top:65px">

                @if(Auth::user()->admin==1 )
                    {{--CHANGE TO ADMIN PAGE--}}
                    {!! link_to_route('post.create', 'Admin page', [], ['class' => 'btn btn-primary']) !!}
                @else
                    {!! link_to_route('post.create', 'Create an article', [], ['class' => 'btn btn-info']) !!}
                @endif
                {!! link_to('logout', 'Log out', ['class' => 'btn btn-danger']) !!}
            </div>


        </div>
    @else
        <div class="row">
            <div class="col-sm-4">
                <h1 class="page-header" style="color:#003399">IT Helpdesk</h1>

            </div>
            <div class="col-sm-4"></div>
            <div class="col-sm-4" style="padding-top:65px">


                {!! link_to('login', 'Log in', ['class' => 'btn btn-primary']) !!}
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
    {!! Html::style('css/search2.css')!!}
    @if(isset($info))
        <div class="row alert alert-info">{{ $info }}</div>
    @endif

    <div class='row'>
        <div class="col-lg-2">{!! $links !!}
        </div>
        {{--<div class="container">
           <div id="quick-access">
               <form class="form-inline quick-search-form" role="form" action="#">
                   <div class="form-group">
                       <input type="text" class="form-control" placeholder="Search here">
                   </div>
                   <button type="submit" id="quick-search" class="btn btn-custom"><span
                               class="glyphicon glyphicon-search custom-glyph-color"></span></button>
               </form>
           </div>
       </div>
       --}}


    </div>

    @foreach($posts as $post)
        @if(Auth::check() and Auth::user()->admin==0 and Auth::user()->id==$post->user_id or Auth::user()->admin)

        <div class="cad" style="padding-left: 25px;padding-right: 25px;border: 2px solid lightgrey; ">


            <article class="row bg-default">
                <div class="col-md-20">
                    <header>

                        @if ($post->resolv)
                            <h1>{{ $post->title }}
                                <span style="font-size:20px; color:#40D76B;">&#x2714 Resolved !</span>
                            </h1>
                        @else
                            <h1>{{ $post->title }}
                                <span style="font-size:20px;color:#ff4d4d" ;>&#x2718 To Resolve !</span>
                            </h1>
                        @endif
                    </header>
                    <hr>
                    <section>
                            <p>{{ $post->content }}</p>
                        @if(Auth::check() and Auth::user()->admin)
                            {!! link_to_route('post.show', 'View', [$post->id], ['class' => 'btn btn-success btn-xs']) !!}
                            {!! link_to_route('post.edit', 'Edit', [$post->id], ['class' => 'btn btn-success btn-xs']) !!}
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
        @endif
        <div class="cad" style="padding: 15px ;">
        </div>
    @endforeach
    {!! $links !!}
@endsection