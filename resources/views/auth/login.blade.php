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
            <h3>Sign in Job Profile</h3>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <div class="form-style-agile">
                    <label>Email</label>
                    <div class="pom-agile">
                        <span class="fa fa-envelope-open"></span>
                        <input id="email" type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>

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
                <div class="form-group row">
                    <div class="col-md-5">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                    <div class="col-md-7">
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Password?') }}
                            </a>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                       

                        
                    </div>
                </div>
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</div>
    @include('layouts.footer')
@endsection

