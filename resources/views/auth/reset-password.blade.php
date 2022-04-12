@extends('frontend.main_master')

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class="active">Reset Password</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">
                    <div class="col-md-6 col-sm-6 sign-in">
                        <h4 class="">Reset Password</h4>

                        <form method="POST"  role="form" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <div class="form-group">
                                <label class="info-title" for="email">{{ __('Email') }} <span>*</span></label>
                                <input type="email" id="email" name="email" class="form-control unicase-form-control text-input" value="{{ old('email', $request->email) }}">
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="password">{{ __('Password') }} <span>*</span></label>
                                <input type="password" id="password" name="password" class="form-control unicase-form-control text-input">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="password_confirmation">{{ __('Confirm Password') }} <span>*</span></label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control unicase-form-control text-input">

                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">
                                {{ __('Reset Password') }}
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
