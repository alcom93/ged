@extends('layout.default')
@section('pageTitle')
settings
@endsection
@section('content')
        <h1> <center>page settings</center></h1>
        <div class="mt-3">
                <a href="{{ route('setting-category-page') }}" class="btn ">Go to Categories</a>
            </div>

@endsection


