@extends('layouts.app')

@section('content')
<div class="form-bg d-flex align-items-center"  id="my-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-5">
                <div class="form-container rounded">
                    <h1 class="fw-bold mb-5 text-white">My Account</h1>
                    <form method="POST" action="{{ route('login') }}" class="form-horizontal">
                        @csrf
                        <div class="form-icon">
                            <i class="fa fa-user-circle"></i>
                        </div>

                        <div class="form-group">
                            <span class="input-icon"><i class="fa fa-user"></i></span>
                            <div>
                                <input placeholder="E-Mail" id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="input-icon"><i class="fa fa-lock"></i></span>
                            <div>
                                <input placeholder="Password" id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password" autofocus>

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-check d-flex justify-content-between align-items-center">
                                <div>
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{
                                        old('remember') ? 'checked' : '' }}>
    
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                <div>
                                    <a class="btn btn-link" href="{{ route('register') }}">
                                        {{ __('Sign in') }}
                                    </a>
                                </div>
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-12">
                                <button type="submit" class="btn signin">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
