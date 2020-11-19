@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/p" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-8 offset-2">
                    <div class="row">
                        <h1>Add new post</h1>
                    </div>
                    <div class="form-group row">
                        <label for="caption" class="col-md-4 col-form-label">Caption</label>
                        <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}"  autocomplete="caption" autofocus>
                        @error('caption')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="row form-group">
                        <label for="image" class="col-md-4 col-form-label">Image</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                        <span class="text-danger" role="alert">
                        @error('image')
                            <strong>{{ $message }}</strong>
                        @enderror
                        </span>
                    </div>
                    <div class="row form-group">
                        <button class="btn btn-primary">Add new post</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
