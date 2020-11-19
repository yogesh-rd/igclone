@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 style="text-align: center;">Discover new people</h1>
        <hr>
        <div class="row">
            @foreach($users as $user)
                <div class="col-3 mr-5">
                    <div class="card" style="width: 18.0rem">
                        <a href="/profile/{{$user->id}}"><img class="card-img-top" style="border-bottom: 1px solid grey" src="{{$user->profile->profileImage()}}" alt="pfp"></a>
                        <div class="card-body d-flex align-items-baseline">
                            <a class="text-dark" href="/profile/{{$user->id}}"><h5 class="card-title">{{ $user->username }}</h5></a>
                            <follow-button class="ml-auto" user-id="{{$user->id}}" follows="{{(auth()->user()) ? auth()->user()->following->contains($user->id) : false}}"></follow-button>
                        </div>
                        @if($user->profile->description)
{{--                        <hr>--}}
                        <p style="border-top: 1px solid lightgray; padding-top: 1%;" class="card-text mx-2">{{ $user->profile->description }}</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        <div class="pt-3 row d-flex justify-content-center">
            <div class="col-12">
                {{$users->links()}}
            </div>
        </div>
    </div>
@endsection
