@extends('layout.default')
@section('pageTitle')
    LOGIN
@endsection
@section('content')
    <h1>
        <center>my login</center>
    </h1>
    <div class="row justify-content-center " style="margin-top: 120px">
    <form class="col-3" action="{{route('login-action')}}" method="POST">
        @csrf
@error('failed')
<p class="alert alert-danger">{{$message}}</p>
  
@enderror
  

      
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" class="form-control" id="email" name="email">
          @error('email')
        <p><span class="text-danger">{{$message}}</span></p>
        @enderror
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password">
          @error('password')
          <p><span class="text-danger">{{$message}}</span></p>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
@endsection
