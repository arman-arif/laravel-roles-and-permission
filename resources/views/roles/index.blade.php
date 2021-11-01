@extends('layouts.app')

@section('content')
<div class="container">

    @include('partials.errors')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Role</div>

                <div class="card-body">
                    <div class="w-75 mx-auto">
                        <form action="{{ route('role.store') }}" method="post">
                            @csrf
                            <div class="row"><div class="col-8">
                                <input type="text" class="form-control rounded @error('name') is-invalid @enderror" required name="name" id="name" value="{{ old('name') }}" placeholder="Role name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-4">
                                <input type="submit" value="Submit" class="btn btn-success btn-rounded btn-block">
                            </div></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header">Roles</div>

                <div class="card-body">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th class="text-right pr-2">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td class="text-right"><form action="{{ route('role.delete', $role->id) }}" method="POST">@csrf @method('delete')<button type="submit" class="btn btn-sm badge badge-danger">Delete</button></form></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
