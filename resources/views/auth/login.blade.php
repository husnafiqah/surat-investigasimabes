@extends('layouts.app')

@section('content')
<div class="container"  >
    <div class="row d-flex justify-content-center align-items-center" style=" height: 80vh;" >
        <div class="col-md-8 ">
            <div class="card">
            <!-- <div class="card-header">{{ __('Login') }}</div> -->

                <div class="card-body" style="background-color: #ffffff; padding: 50px;">
                    <div class="text-center mb-3">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" height="200">
                        <h2 style="font-weight: bold; margin-top: 20px;">Welcome!</h2>
                        <h6>Silahkan Login</h6>
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3 justify-content-center">

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"  name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 justify-content-center">
                        
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> -->

                        <div class="row mb-3 justify-content-center ">
                            <div class="d-grid gap-2 col-4 mx-auto">
                                <button type="submit" class="btn btn-danger">
                                    {{ __('Login') }}
                                </button>

                                <!-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
