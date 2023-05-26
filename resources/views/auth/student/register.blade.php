@extends('layouts.app_auth')

@section('content')
<div class="sign_in_up_bg">
    <div class="container">
        <div class="row justify-content-lg-center justify-content-md-center">
            <div class="col-lg-12">
                <div class="main_logo25" id="logo">
                    <!--<a href="index.php"><img src="./inc/images/Atlas-logo.png" alt="" style="text-align:center;"></a>-->
                    <!--<a href="index.php"><img class="img-responsive" src="./inc/images/Atlas-logo.png" alt="Atlas"></a>-->
                </div>
            </div>

            <div class="col-lg-8 col-md-8">
                <div class="sign_form">
                    <h2>Welcome to {{ config('app.name', 'Laravel') }} </h2>
                    <p>Register Now & Start Learning Today!</p>
                    <form action="{{ route('student_register') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3 row">
                            @php
                            $code_feed = "0123456789";
                            $code_length = 5; // Set this to be your desired code length
                            $final_code = "";
                            $feed_length = strlen($code_feed);

                            for ($i = 0; $i < $code_length; $i++) { $feed_selector=rand(0, $feed_length - 1); $final_code .=substr($code_feed, $feed_selector, 1); } @endphp <label for="stnumber" class="col-md-4 col-form-label-lg text-md-end text-start">Student Number</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control form-control-lg @error('stnumber') is-invalid @enderror" id="stnumber" name="stnumber" value="{{ $final_code }}" readonly>
                                    @if ($errors->has('stnumber'))
                                    <span class="text-danger">{{ $errors->first('stnumber') }}</span>
                                    @endif
                                </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email" class="col-md-4 col-form-label-lg text-md-end text-start">Email Address</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="fullname" class="col-md-4 col-form-label-lg text-md-end text-start">Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control form-control-lg @error('fullname') is-invalid @enderror" id="fullname" name="fullname" value="{{ old('fullname') }}">
                                @if ($errors->has('fullname'))
                                <span class="text-danger">{{ $errors->first('fullname') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="dob" class="col-md-4 col-form-label-lg text-md-end text-start">Birthday</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control form-control-lg @error('dob') is-invalid @enderror" id="dob" name="dob">
                                @if ($errors->has('dob'))
                                <span class="text-danger">{{ $errors->first('dob') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="gender" class="col-md-4 col-form-label-lg text-md-end text-start">Gender</label>
                            <div class="col-md-6">
                                <select class="form-select @error('gender') is-invalid @enderror" name="gender" id="gender">
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Other</option>
                                </select>
                                @if ($errors->has('gender'))
                                <span class="text-danger">{{ $errors->first('gender') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="district" class="col-md-4 col-form-label-lg text-md-end text-start">District</label>
                            <div class="col-md-6">
                                <select class="form-select @error('district') is-invalid @enderror" name="district" id="district">
                                    <option>Colombo</option>
                                    <option>Gampaha</option>
                                    <option>Kalutara</option>
                                    <option>Kandy</option>
                                    <option>Matale</option>
                                    <option>Nuwara Eliya</option>
                                    <option>Galle</option>
                                    <option>Matara</option>
                                    <option>Hambantota</option>
                                    <option>Jaffna</option>
                                    <option>Kilinochchi</option>
                                    <option>Mannar</option>
                                    <option>Vavuniya</option>
                                    <option>Mullaitivu</option>
                                    <option>Batticaloa</option>
                                    <option>Ampara</option>
                                    <option>Trincomalee</option>
                                    <option>Kurunegala</option>
                                    <option>Puttalam</option>
                                    <option>Anuradhapura</option>
                                    <option>Polonnaruwa</option>
                                    <option>Badulla</option>
                                    <option>Moneragala</option>
                                    <option>Ratnapura</option>
                                    <option>Kegalle</option>
                                </select>
                                @if ($errors->has('district'))
                                <span class="text-danger">{{ $errors->first('district') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="town" class="col-md-4 col-form-label-lg text-md-end text-start">Town</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control form-control-lg @error('town') is-invalid @enderror" id="town" name="town">
                                @if ($errors->has('town'))
                                <span class="text-danger">{{ $errors->first('town') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="contactnumber" class="col-md-4 col-form-label-lg text-md-end text-start">Contact Number</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control form-control-lg @error('contactnumber') is-invalid @enderror" id="contactnumber" name="contactnumber">
                                @if ($errors->has('contactnumber'))
                                <span class="text-danger">{{ $errors->first('contactnumber') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="address" class="col-md-4 col-form-label-lg text-md-end text-start">Address</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control form-control-lg @error('address') is-invalid @enderror" id="address" name="address">
                                @if ($errors->has('address'))
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="course" class="col-md-4 col-form-label-lg text-md-end text-start">Course</label>
                            <div class="col-md-6">
                                <select class="form-select @error('course') is-invalid @enderror" name="course" id="course">
                                    @foreach ( $courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endforeach


                                </select>
                                @if ($errors->has('course'))
                                <span class="text-danger">{{ $errors->first('course') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="batch" class="col-md-4 col-form-label-lg text-md-end text-start">Batch</label>
                            <div class="col-md-6">
                                <select class="form-select @error('batch') is-invalid @enderror" name="batch" id="batch">
                                </select>
                                @if ($errors->has('batch'))
                                <span class="text-danger">{{ $errors->first('batch') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="password" class="col-md-4 col-form-label-lg text-md-end text-start">Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" name="password">
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="password_confirmation" class="col-md-4 col-form-label-lg text-md-end text-start">Confirm Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control form-control-lg" id="password_confirmation" name="password_confirmation">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Register">
                        </div>

                    </form>
                </div>
            </div>
        </div>



        @endsection