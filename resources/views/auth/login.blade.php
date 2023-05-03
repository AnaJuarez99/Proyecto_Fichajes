@extends('layouts.plantilla')

@section('content')
<div class="container ">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-lg-6 col-sm-12 ">
            <div class="bg-light p-5 rounded ">
                <h1 class="font-weight-bold mb-5 text-center fs-70">Login</h1>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <label for="email" class="font-weight-medium fs-50">Correo electrónico</label>
                        <input id="email" type="email" class="inputs2 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Introduzca el correo electrónico">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password" class="font-weight-medium fs-50">Contraseña</label>
                        <input id="password" type="password" class="inputs2  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Introduzca la contraseña">

                        @error('password')
                            <span class="invalid-feedback fs-50" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div> --}}

                    <div class="form-group text-right">
                        @if (Route::has('password.request'))
                            <a class=" btn-link p-0 text-decoration-none fs-30" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn-primary w-100 font-weight-bold fs-30">
                            {{ __('Login') }}
                        </button>
                    </div>

                    <div class="form-group text-center">
                        <a href="{{ route('register') }}" class="text-decoration-none">
                            <p class="fs-30">Registrarse</p>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
