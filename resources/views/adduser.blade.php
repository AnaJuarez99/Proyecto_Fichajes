@extends('layouts.plantilla')

@section('content')
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-lg-6 col-sm-12 registro">
            <div class="card rounded-2 ">
                <div class="card-header text-center h3-custom fs-70">{{ __('REGISTRO') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('add') }}">
                        @csrf

                        <div class="form-group pl-pr-20">
                            <label for="nombre" class="fs-22 font-weight-normal fs-50">{{ __('Nombre') }}</label>

                            <div class="w-100">
                                <input id="nombre" type="text" class="fs-12 bg-E5E7E9 inputs2 @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group pl-pr-20">
                            <label for="apellidos" class="fs-22 font-weight-normal fs-50">{{ __('Apellidos') }}</label>

                            <div class="w-100">
                                <input id="apellidos" type="text" class="fs-12 bg-E5E7E9 inputs2 @error('apellidos') is-invalid @enderror" name="apellidos" value="{{ old('apellidos') }}" required autocomplete="apellidos" autofocus>

                                @error('apellidos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group pl-pr-20">
                            <label for="dni" class="fs-22 font-weight-normal fs-50">{{ __('DNI') }}</label>

                            <div class="w-100">
                                <input id="dni" type="text" class="fs-12 bg-E5E7E9 inputs2 @error('dni') is-invalid @enderror" name="dni" value="{{ old('dni') }}" required autocomplete="dni" autofocus>

                                @error('dni')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group pl-pr-20">
                            <label for="telefono" class="fs-22 font-weight-normal fs-50">{{ __('Teléfono') }}</label>

                            <div class="w-100">
                                <input id="telefono" type="number" class="fs-12 bg-E5E7E9 inputs2 @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus>

                                @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group pl-pr-20">
                            <label for="puesto" class="fs-22 font-weight-normal fs-50">{{ __('Puesto de trabajo') }}</label>

                            <div class="w-100">
                                <input id="puesto" type="text font-weight-normal" class="fs-12 bg-E5E7E9 inputs2 @error('puesto') is-invalid @enderror" name="puesto" value="{{ old('puesto') }}" required autocomplete="puesto" autofocus>

                                @error('puesto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group pl-pr-20">
                            <label for="email" class="fs-22 font-weight-normal fs-50">{{ __('Correo electrónico') }}</label>

                            <div class="w-100">
                                <input id="email" type="email" class="fs-12 bg-E5E7E9 inputs2 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group pl-pr-20">
                            <label for="password" class="fs-22 font-weight-normal fs-50">{{ __('Contraseña') }}</label>

                            <div class="w-100">
                                <input id="password" type="password" class="fs-12 bg-E5E7E9 inputs2 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group pl-pr-20 mb-50">
                            <label for="password-confirm" class="fs-22 font-weight-normal fs-50">{{ __('Confirmar Contraseña') }}</label>

                            <div class="w-100">
                                <input id="password-confirm" type="password" class="fs-12 bg-E5E7E9 inputs2" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="text-center">
                                <button type="submit" class=" btn-primary fs-27 w-50 fs-30">
                                    {{ __('Registrarse') }}
                                </button>
                            </div>
                        </div>

                        @guest
                        <div class="form-group">
                            <a href="{{ route('login') }}" class="text-center fs-22 text-decoration-none ">
                                <p class="fs-30">Login</p>
                            </a>
                        </div>
                        @endguest
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
