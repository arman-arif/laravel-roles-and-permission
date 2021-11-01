@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-lg-8 mx-auto">
            @foreach ($posts as $post)
                <div class="card mb-2">
                    <div class="card-body">
                        <h3 class="card-title h4">{{ $post->title }}</h3>
                        <p class="card-text">{{ Str::limit($post->desc, 100, '...') }}</p>
                        <a href="{{ route('post.show', ['id'=>$post->id]) }}">Read more...</a>
                    </div>
                </div>
            @endforeach

            <div class="mt-3">
                {{ $posts->links() }}
            </div>
        </div>
    </div>

</div>
@endsection
