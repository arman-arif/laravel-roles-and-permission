@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p class="text-center">{{ __('You are logged in!') }}</p>

                    <div class="my-3 mx-auto text-center w-50">
                        <a href="{{ route('post.index') }}" class="btn btn-primary btn-rounded btn-block mb-2">Posts</a>
                        <a href="{{ route('post.create') }}" class="btn btn-success btn-rounded btn-block mb-2">New Post</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
