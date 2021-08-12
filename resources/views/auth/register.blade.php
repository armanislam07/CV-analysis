@extends('layouts.app')

@section('content')
<div class="main-w3ls">
    <div class="left-content">
        <div class="w3ls-content">
            
        </div>
    </div>
    <div class="right-form-agile">
        <!-- content -->
        <div class="sub-main-w3">
            <h3>Signup Now</h3>
            <h5>Creating an account is free..</h5>
            <p>and won't take longer than a couple os seconds</p>
            <form method="POST" action="{{ route('register') }}">
            @csrf
                <div class="form-style-agile">
                    <label>Your Name</label>
                    <div class="pom-agile">
                        <span class="fa fa-user"></span>
                        <input id="name" type="text" class="{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Your Name" required autofocus>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                    </div>
                </div>
                <div class="form-style-agile">
                    <label>Email</label>
                    <div class="pom-agile">
                        <span class="fa fa-envelope-open"></span>
                        <input id="email" type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-style-agile">
                    <label>Password</label>
                    <div class="pom-agile">
                        <span class="fa fa-key"></span>
                        <input id="password" type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-style-agile">
                    <label>Confirm Password</label>
                    <div class="pom-agile">
                        <span class="fa fa-key"></span>
                        <input id="password-confirm" type="password" class="" name="password_confirmation" placeholder="Confirm Password"  required>
                    </div>
                </div>
                
                <input type="submit" value="Submit">
            </form>
            <!-- social icons -->
            <div class="w3ls-social">
                <h3>or Login with</h3>
                <ul class="social-nav model-3d-0 footer-social social two">
                    <li>
                        <a href="#" class="facebook">
                            <span class="fa fa-facebook"></span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="twitter">
                            <span class="fa fa-twitter"></span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="instagram">
                            <span class="fa fa-instagram"></span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="pinterest">
                            <span class="fa fa-linkedin"></span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- //social icons -->
        </div>
    </div>
</div>
    @include('layouts.footer')
@endsection
