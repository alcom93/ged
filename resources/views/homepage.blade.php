@extends('layout.default')
@section('content')
    @if (session('out'))
        <div class="alert alert-primary" role="alert">
            {{ session('out') }}
        </div>
    @endif
    <div class="row justify-content-center mt-5">
        <!-- Card Contracts -->
        <div class="col-6 col-md-4 col-lg-3 mb-3">
            <div class="card text-center">
                <div class="card-body">
                    <div class="card-icon mb-3">
                        <img src="{{ asset('img/btn-contract.png') }}" alt="Contracts" class="card-img-top"
                            style="width: 60px; height: 60px;">
                    </div>
                    <h5 class="card-title">Search</h5>
                    <a href="{{ route('all-docs-page') }}" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <!-- Card New -->
        <div class="col-6 col-md-4 col-lg-3 mb-3">
            <div class="card text-center">
                <div class="card-body">
                    <div class="card-icon mb-3">
                        <img src="{{ asset('img/btn-add-document.png') }}" alt="New" class="card-img-top"
                            style="width: 60px; height: 60px;">
                    </div>
                    <h5 class="card-title">New</h5>
                    <a href="{{ route('add-form-doc-page') }}" class="btn btn-success">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <!-- Card Clients -->
            <div class="col-6 col-md-4 col-lg-3 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="card-icon mb-3">
                            <img src="{{ asset('img/btn-customers.png') }}" alt="Clients" class="card-img-top"
                                style="width: 60px; height: 60px;">
                        </div>
                        <h5 class="card-title">Clients</h5>
                        <a href="{{ route('setting-user-page') }}" class="btn btn-info " disabled>Go somewhere</a>
                    </div>
                </div>
            </div>
            <!-- Card Settings -->
            <div class="col-6 col-md-4 col-lg-3 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="card-icon mb-3">
                            <img src="{{ asset('img/btn-settings.png') }}" alt="Settings" class="card-img-top"
                                style="width: 60px; height: 60px;">
                        </div>
                        
                        @if(Auth::user()->isAdmin())
                        <h5 class="card-title">Settings</h5>
                        <a href="{{ route('settings-page') }}" class="btn btn-dark">Go somewhere</a>
                        @else
                        <h5 class="card-title" style="color: gray" >Settings</h5>
                        <button class="btn btn-dark"  disabled>Go somewhere</button>
                        @endif
                    </div>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
