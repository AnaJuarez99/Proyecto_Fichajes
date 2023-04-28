@extends('layouts.plantilla')

@section('content')
<div class="container">
    <div class="row justify-content-center w-100 min-vh-100 mt-mb-50">
        <div class="col-md-6">
            <div>
                <div class="h1 font-weight-bold mb-50">Login</div>

                <div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group mb-50">
                            <label for="email" class="fs-22 font-weight-medium">{{ __('Correo electrónico') }}</label>

                            <div class="w-100">
                                <input id="email" type="email" class="fs-18 p-20 form-control @error('email') is-invalid @enderror h-50" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Introduzca el correo electrónico">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="fs-22 font-weight-medium">{{ __('Contraseña') }}</label>

                            <div class="w-100">
                                <input id="password" type="password" class="fs-18 p-20 form-control @error('password') is-invalid @enderror h-50" name="password" required autocomplete="current-password" placeholder="Introduzca la contraseña">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="form-group">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> --}}

                        <div class="form-group text-right mb-50">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link p-0 text-decoration-none fs-18" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary w-50 fs-27 font-weight-bold">
                                    {{ __('Login') }}
                                </button>

                            </div>
                        </div>

                        <div class="form-group">
                            <a href="{{ route('register') }}" class="text-center text-decoration-none fs-22">
                                <p>Registrarse</p>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
