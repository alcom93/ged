@extends('layout.default')
@section('pageTitle')
    users
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3 style="margin:35px 0 ; ">
                    <img src="{{asset('img/btn-customers.png')}}" alt=""style="width: 50px; height: 50px;">
                    Add New User
                </h3>
                @if (session('success'))
                    <div class="alert alert-primary" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('add-form-us-action') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                        @error('name')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ old('email') }}">
                        @error('email')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password">
                        @error('password')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password:</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    </div> <br>
                    <div class="form-group">
                        <label for="role">Role:</label>
                        <select class="form-control" id="role_id" name="role_id">
                            <option value="1">admin</option>
                            <option value="2">guest</option>
                        </select> <br>
                    </div>
                        <button type="submit" class="btn btn-primary">Create User</button>
                </form>
            </div>
            <div class="col-md-6">
                <!-- Liste des utilisateurs -->
                <table class="table table-bordered mt-4">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role->name }}</td>
                                <td><a href="{{ route('remove-us', ['id' => $user->id]) }}"> delete</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
