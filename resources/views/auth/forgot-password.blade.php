@extends('frontend.main_master')

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class="active">Forget Password</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">
                    <div class="col-md-6 col-sm-6 sign-in">
                        <h4 class="">Forget Password</h4>

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST"  role="form" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group">
                                <label class="info-title" for="email">Email Address <span>*</span></label>
                                <input type="email" id="email" name="email" class="form-control unicase-form-control text-input">
                            </div>

                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">
                                {{ __('Email Password Reset Link') }}
                            </button>
                        </form>

                    </div>
                </div>
            </div>

            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('frontend.body.brands')
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div>
    </div>
@endsection
