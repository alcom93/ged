@extends('layout.default')

@section('pageTitle')
    settings
@endsection

@section('content')
    <div class="container">
        <h3 style="margin:35px 0 ; ">
            <img src="{{ asset('img/btn-settings.png') }}" alt="" style="width: 50px; height: 50px;">
            page settings
        </h3>

        <div class="row justify-content-center align-items-center">
            <!-- Card Clients -->
            <div class="col-6 col-md-4 col-lg-3 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Clients</h5>
                        <div class="card-icon mb-3">
                            <img src="{{ asset('img/btn-customers.png') }}" alt="Clients" class="card-img-top"
                                style="width: 60px; height: 60px;">
                        </div>
                        <a href="{{ route('setting-user-page') }}" class="btn btn-info">Go somewhere</a>
                    </div>
                </div>
            </div>

            <!-- Card categories -->
            <div class="col-6 col-md-4 col-lg-3 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Categories</h5>
                        <div class="card-icon mb-3">
                            <img src="{{ asset('img/images.png') }}" alt="Categories" class="card-img-top"
                                style="width: 60px; height: 60px;">
                        </div>
                        <a href="{{ route('setting-category-page') }}" class="btn btn-info">Go somewhere</a>
                    </div>
                </div>
            </div>
            
                <div class="col-md-6" style="backface-visibility: hidden">
                    <div class="text-center mt-4">
                        <img src="{{ asset('img/image123.png') }}" alt="Votre Image" style="width: 400px;">
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection
