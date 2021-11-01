@extends('layouts.app')

@push('head')
    <style>
        .feather{
            height: 15px;
        }
    </style>
    <script src="https://unpkg.com/feather-icons"></script>
@endpush

@section('content')

    @include('partials.errors')

    <div class="container-md">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <strong>Posts</strong>
                        <a href="{{ route('post.create') }}" class="btn btn-success btn-sm btn-rounded mb-2">New Post</a>
                    </div>

                    <div class="card-body">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $loop->iteration + ($posts->currentPage()-1) * $posts->perPage() }}</td>
                                    <td>{{ $post->created_at->format('d M Y') }}</td>
                                    <td>{{ Str::limit($post->title, 25, '...') }}</td>
                                    <td>{{ Str::limit($post->desc, 45, '...') }}</td>
                                    <td class="text-right" style="width: 100px">
                                        <a href="{{ route('post.show', ['id'=>$post->id]) }}" class="btn btn-outline-info btn-sm p-0">
                                            <span data-feather="zap"></span>
                                        </a>
                                        <a href="{{ route('post.edit', ['id'=>$post->id]) }}" class="btn btn-outline-info btn-sm p-0">
                                            <span data-feather="edit"></span>
                                        </a>
                                        <form method="post" class="d-inline" action="{{ route('post.delete', ['id'=>$post->id]) }}"
                                            onsubmit="return confirm('Are you sure?')">@method('delete')@csrf
                                            <button class="btn btn-outline-danger btn-sm p-0" type="submit">
                                                <span data-feather="trash-2"></span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('end')
    <script>
        feather.replace()
    </script>
@endpush
