@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-7">
                <img src="/storage/{{$post->image}}" class="w-80" alt="">
            </div>
            <div class="col-5">
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <img src="{{$post->user->profile->profileImage()}}" class="rounded-circle" style="max-width: 65px;">
                    </div>
                    <div>
                        <div class="font-weight-bold d-flex align-items-center">
                            <a href="/profile/{{$post->user->id}}"><span class="text-dark">{{$post->user->username}}</span></a>
                            @if(auth()->user())
                                <follow-button user-id="{{$post->user->id}}" follows="{{auth()->user() ? auth() ->user()->following->contains($post->user->id) : false}}"></follow-button>
                            @endif
                        </div>
                    </div>
                </div>
                <hr>
                <p><span class="font-weight-bold"><a href="/profile/{{$post->user->id}}"><span class="text-dark">{{$post->user->username}}</span></a></span> {{$post->caption}}</p>
            </div>
        </div>
    </div>
@endsection
