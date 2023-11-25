@extends('layout.default')

@section('pageTitle')
    Categories
@endsection


@section('content')
    <div class="container">
        <h1>
            <center>Add category</center>
        </h1>
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add a category</h4>
                        @error('name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('add-form-cat-action') }}" method="POST">
                            @csrf
                            <table class="table">
                                <tr>
                                    <th>Name of the category</th>
                                    <td><input id="name" type="text" class="form-control" name="name" required>

                                    </td>
                                </tr>
                            </table>
                            <button type="submit" class="btn btn-primary">Add category</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mt-3">
                    <div class="card-body">
                        <h4 class="card-title">Categories List</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            <a href="{{ route('remove-cat', ['id' => $category->id]) }}"> delete</a>
                                        </td>
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
