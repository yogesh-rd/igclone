@extends('layouts.app')

@section('content')
    <div class="container">
        @if($posts->count())
            @if($explore)
                <h1 style="text-align: center">All posts</h1>
                <hr>
            @endif
            @foreach($posts as $post)
                <div class="row">
                    <div class="col-6 offset-3 d-flex align-items-center">
                        <img class="rounded-circle" style="max-width: 10%" src="{{$post->user->profile->profileImage()}}" alt="">
                        <a href="/profile/{{$post->user->id}}"><span class="text-dark font-weight-bold pl-3">{{$post->user->username}}</span></a>
                        @if($explore)
                            @if(auth()->user())
                            <follow-button class="ml-auto" user-id="{{$post->user->id}}" follows="{{auth()->user() ? auth() ->user()->following->contains($post->user->id) : false}}"></follow-button>
                            @endif
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 offset-3">
                        <a href="/p/{{$post->id}}"><img src="/storage/{{$post->image}}" class="w-100 mt-2" alt=""></a>
                    </div>
                </div>
                @if($post->caption)
                    <div class="row pt-2">
                        <div class="col-6 offset-3">
                            <p><span class="font-weight-bold"><a href="/profile/{{$post->user->id}}"><span class="text-dark">{{$post->user->username}}</span></a></span> {{$post->caption}}</p>
                        </div>
                    </div>
                @else
                    <div class="pb-4"></div>
                @endif
                <hr width="50%">
            @endforeach
            <div class="row d-flex justify-content-center">
                <div class="col-12">
                    {{ $posts->links() }}
                </div>
            </div>
        @else
            <div style="text-align: center; margin-top: 30%"><h2>No posts available,
                    <a href="/p/create">make your own</a>
                    @if(!$explore)
                        or <a href="/discover">discover</a> people to follow
                    @endif
                </h2></div>
        @endif
    </div>
@endsection
