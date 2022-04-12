@extends('frontend.main_master')

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class="active">Login</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div>

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">
                    <!-- Sign-in -->
                    <div class="col-md-6 col-sm-6 sign-in">
                        <h4 class="">Sign in</h4>
                        <p class="">Hello, Welcome to your account.</p>
                        <div class="social-sign-in outer-top-xs">
                            <a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
                            <a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
                        </div>

                        <form class="register-form outer-top-xs" method="POST"  role="form" action="{{ isset($guard) ? url($guard . '/login') : route('login') }}">
                            @csrf

                            <div class="form-group">
                                <label class="info-title" for="email">Email Address <span>*</span></label>
                                <input type="email" id="email" name="email" class="form-control unicase-form-control text-input">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="password">Password <span>*</span></label>
                                <input type="password" id="password" name="password" class="form-control unicase-form-control text-input">
                            </div>
                            <div class="form-group checkbox">
                                <label>
                                    <input type="checkbox" id="remember_me" name="remember">{{ __('Remember me') }}
                                </label>
                                <a href="{{ route('password.request') }}" class="forgot-password pull-right">{{ __('Forgot your password?') }}</a>
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">{{ __('Log in') }}</button>
                        </form>

                    </div>
                    <!-- Sign-in -->

                    <!-- create a new account -->
                    <div class="col-md-6 col-sm-6 create-new-account">
                        <h4 class="checkout-subtitle">Create a new account</h4>
                        <p class="text title-tag-line">Create your new account.</p>

                        <form class="register-form outer-top-xs" method="POST"  role="form" action="{{ route('register') }}">
                            @csrf
                            <form class="register-form outer-top-xs" role="form">
                                <div class="form-group">
                                    <label class="info-title" for="name">Name <span>*</span></label>
                                    <input type="text" id="name" name="name" class="form-control unicase-form-control text-input">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="email">Email Address <span>*</span></label>
                                    <input type="email" id="email" name="email" class="form-control unicase-form-control text-input">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="phone">Phone Number <span>*</span></label>
                                    <input type="text" id="phone" name="phone" class="form-control unicase-form-control text-input">

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="password">Password <span>*</span></label>
                                    <input type="password" id="password" name="password" class="form-control unicase-form-control text-input">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="password_confirmation">Confirm Password <span>*</span></label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control unicase-form-control text-input">

                                    @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>

                                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                    <div class="form-group checkbox">
                                        <label>
                                            <input type="checkbox" id="terms" name="terms">
                                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'">'.__('Terms of Service').'</a>',
                                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'">'.__('Privacy Policy').'</a>',
                                            ]) !!}
                                        </label>

                                        @error('terms')
                                        <span class="invalid-feedback" role="alert">
                                            <br><strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                @endif

                                <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
                            </form>


                    </div>
                    <!-- create a new account -->			</div><!-- /.row -->
            </div><!-- /.sigin-in-->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('frontend.body.brands')
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
    </div>
@endsection
