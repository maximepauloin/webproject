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
    </div>

@endsection

@section('contenu')
    <div class="col-sm-offset-3 col-sm-6">
        <br>
        <div class="panel panel-primary">
            <div class="panel-heading">{{ $posts->title }}</div>
            <div class="panel-body">
                <p><b>Mentionned issue:</b> {{ $posts->content }}</p>
                <p><b>Posted:</b> {{ $posts->created_at->format('H:i:s') }}, {{ $posts->created_at->format('M d, Y') }}
                </p>
                @if($posts->updated_at!=$posts->created_at)
                    <p><b>Last modification:</b> {{ $posts->updated_at->format('H:i:s') }}
                        , {{ $posts->updated_at->format('M d, Y') }}</p>
                @endif
                @if($posts->resolv!=1)
                    <p><b>Resolved: </b>Not yet</p>
                @else
                    <p><b>Resolved: </b>Yes</p>
                @endif
            </div>
        </div>
        <a href="javascript:history.back()" class="btn btn-primary">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Back
        </a>
    </div>
@endsection