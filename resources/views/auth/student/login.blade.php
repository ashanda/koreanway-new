@extends('layouts.app_auth')

@section('content')

<div class="sign_in_up_bg">
    <div class="container">
        <div class="row justify-content-lg-center justify-content-md-center">
            <!--<div class="col-lg-12">-->

            <!--</div>-->

            <div class="col-lg-6 col-md-8">
                <div class="sign_form">
                    <div class="main_logo25" id="logo">
                        <a href="index.html" title="Home "> <img src="{{ asset('images/logo.png')}}" class="img-responsive" alt="Atlas"></a>
                    </div>
                    <h2>Welcome to {{ config('app.name', 'Laravel') }}</h2>
                    <p>Log In to {{ 'Student'}} Account!</p>

                    <form method="POST" action="{{ route('student_login') }}">
                        @csrf

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="single-form">
                                    <label class="col-form-label-lg " style="font-weight:bold;float:left;">PHONE NUMBER</label>
                                    <input type="text" id="contactnumber" class="form-control form-control-lg phone_val" required placeholder="Your Phone Number" maxlength="10" minlength="10" style="border: 2px solid #ccc;" name="contactnumber" required autofocus>
                                    @if ($errors->has('contactnumber'))
                                    <span class="text-danger">{{ $errors->first('contactnumber') }}</span>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="single-form">
                                    <label class="col-form-label-lg " style="font-weight:bold;float:left;">Password </label>
                                    <input type="password" placeholder="Your Password" style="border: 2px solid #ccc;" id="password" class="form-control form-control-lg" name="password" required>
                                    @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="single-form">
                                    <input name="login" type="submit" value="Login" class="btn btn-lg btn-primary btn-block">
                                </div>
                            </div>
                        </div>
                    </form>
                    <p class="sgntrm145">Or <a href="forgot_password.php">Forgot My Password</a>.</p>

                    <p class="mb-0 mt-30 hvsng145">Don't have an account? <a href="{{ route('student_register') }}">Register</a></p>

                </div>
                <!-- <div class="sign_footer">
                    Copyrights 2021
                    © {{ config('app.name', 'Laravel') }} | Website by <a target="_blank" title="Click to visit" href="https://yogeemedia.com/">yogeemedia.com</div> -->
            </div>
        </div>
    </div>
</div>
<!-- Signup End -->

@endsection