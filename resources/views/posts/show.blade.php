@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-lg-8 mx-auto">
            <div class="card mb-2">
                <div class="card-body">
                    <h3 class="card-title">{{ $post->title }}</h3>
                    <p class="card-text">{{ $post->desc }}</p>

                    {{ $post->likes->count() }} likes
                    <a class="btn btn-link" href="{{ route('post.like', ['id'=>$post->id]) }}">Like</a>
                    <a class="btn btn-link" href="{{ route('post.edit', ['id'=>$post->id]) }}">Edit</a>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection
