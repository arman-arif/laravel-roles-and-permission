@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-10">
            <div class="card">
                <div class="card-header">Create Post</div>

                <div class="card-body">
                    <div class="w-md-75 mx-auto">
                        <form action="{{ route('post.update', $post->id) }}" method="post">
                            @csrf
                            @method('put')

                            <input type="text" class="form-control @error('title') is-invalid @enderror" required name="title" id="title" value="{{ old('title', $post->title) }}" placeholder="Post Title">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <textarea class="form-control @error('desc') is-invalid @enderror mt-3" required name="desc" id="desc" rows="8" placeholder="Post Description">{{ old('desc', $post->desc) }}</textarea>
                            @error('desc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div class="mt-3">
                                <input type="submit" value="Submit" class="btn btn-success btn-rounded float-right w-25">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
