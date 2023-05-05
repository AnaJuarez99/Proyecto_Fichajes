@extends('layouts.app')

@section('na', 'Dashboard')

{{-- @section('content_header')
    <h1>Administración</h1>
@stop --}}

@section('content')

<div class="container mt-5">

    <div class="row justify-content-center">

      <div class="col-lg-8">

        <div class="card" style=" border-radius: 10px; border:solid #6565659c 2px">
          <div class="card-body">
            <div class="row">
              <div class="col-md-4 text-center">
                @if (Auth::check() && Auth::user()->photo)
                <img src="{{ asset('photos/' . Auth::user()->photo) }}" alt="Foto de perfil" class="rounded-circle img-thumbnail" style="width: 150px; height: 150px;">

                @else
                  <img src="https://via.placeholder.com/150" alt="Foto de perfil" class="img-fluid rounded-circle mb-3">
                @endif


              </div>

              <div class="col-md-8">

                <form action="{{ route('administracion.upload_photo') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="photo">Foto de perfil</label>
                        <input type="file" name="photo" id="photo" class="form-control-file">
                        @error('photo')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar foto de perfil</button>
                </form>
            </div>

              <div class="col-md-8">
                <h3 class="mb-0">{{Auth::user()->nombre}} {{Auth::user()->apellidos}}</h3>
                {{-- <p class="text-muted">Cargo en la empresa</p> --}}
                <br>

                <div class="mb-3">
                  <i class="fas fa-phone-alt mr-2"></i>
                  <span>Teléfono:</span>
                  <a href="tel:{{Auth::user()->telefono}}" class="text-decoration-none">{{Auth::user()->telefono}}</a>
                </div>

                <div class="mb-3">
                  <i class="far fa-envelope mr-2"></i>
                  <span>Correo electrónico:</span>
                  <a href="mailto:{{Auth::user()->email}}" class="text-decoration-none">{{Auth::user()->email}}</a>
                </div>

                <div class="mb-3">
                  <i class="far fa-id-card mr-2"></i>
                  <span>DNI:</span>
                  <span>{{Auth::user()->dni}}</span>
                </div>

                <div class="mb-3">
                  @if(Auth::check())
                      <form action="{{ route('logout') }}" method="POST">
                          @csrf
                          <button type="submit" class="btn btn-primary"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</button>
                      </form>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid p-0 m-0">
    <div class="row justify-content-center m-0 my-5">
      <div class="col-md-6" style="max-width: 500px;">
        <div class="card shadow-lg rounded-0" style="border-radius: 20px;   border:solid #6565659c 1px; margin-top: 15px;">
          <div class="card-header rounded-0 bg-E5E7E9 text-black text-center d-flex justify-content-center" style="border-top-left-radius: 10px; border-top-right-radius: 10px;">
            <h3 class="card-title mb-0 py-2 text-center fs-22 font-weight-medium" style="border-radius: 20px;">Editar perfil</h3>
          </div>
          <div class="card-body">
            <form>
              <div class="mb-3">
                <label for="nombre" class="form-label fs-18 font-weight-normal">Nombre</label>
                <input type="text" class="form-control bg-E5E7E9" id="nombre" value="" placeholder="{{Auth::user()->nombre}}">
              </div>
              <div class="mb-3">
                <label for="apellidos" class="form-label fs-18 font-weight-normal">Apellidos</label>
                <input type="text" class="form-control bg-E5E7E9" id="apellidos" value="" placeholder="{{Auth::user()->apellidos}}">
              </div>
              <div class="mb-3">
                <label for="dni" class="form-label fs-18 font-weight-normal">DNI</label>
                <input type="text" class="form-control bg-E5E7E9" id="dni" value="" placeholder="{{Auth::user()->dni}}">
              </div>
              <div class="mb-3">
                <label for="correo" class="form-label fs-18 font-weight-normal">Correo electrónico</label>
                <input type="email" class="form-control bg-E5E7E9" id="correo" value="" placeholder="{{Auth::user()->email}}">
              </div>
              <div class="mb-3">
                <label for="telefono" class="form-label fs-18 font-weight-normal">Teléfono</label>
                <input type="tel" class="form-control bg-E5E7E9" id="telefono" value="" placeholder="{{Auth::user()->telefono}}">
              </div>
              <div class="mb-3">
                <label for="puesto-trabajo" class="form-label fs-18 font-weight-normal">Puesto de trabajo</label>
                <input type="text" class="form-control bg-E5E7E9" id="puesto-trabajo" value="" placeholder="{{Auth::user()->puesto}}">
              </div>
              <div class="card-body d-flex justify-content-center">
                <button type="submit" class="btn btn-primary btn-lg shadow-sm font-weight-bold" style="border-radius: 30px; color: #fff; border: none; width: 200px;">
                  GUARDAR
                </button>
              </div>


            </form>
          </div>
        </div>
      </div>
    </div>
  </div>








@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
