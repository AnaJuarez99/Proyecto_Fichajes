@extends('layouts.app')

@section('na', 'Dashboard')

@section('content_header')
    <h1>Administracion</h1>
@stop

@section('content')

<div class="container mt-5">

    <div class="row justify-content-center">

      <div class="col-lg-8">

        <div class="card" style=" border-radius: 10px; border:solid #6565659c 2px">
          <div class="card-body">
            <div class="row">
              <div class="col-md-4 text-center">
                <img src="https://via.placeholder.com/150" alt="Foto de perfil" class="img-fluid rounded-circle mb-3">
              </div>

              <div class="col-md-8">
                <h3 class="mb-0">Nombre y apellidos</h3>
                <p class="text-muted">Cargo en la empresa</p>

                <div class="mb-3">
                  <i class="fas fa-phone-alt mr-2"></i>
                  <span>Teléfono:</span>
                  <a href="tel:+1234567890" class="text-decoration-none">+1234567890</a>
                </div>

                <div class="mb-3">
                  <i class="far fa-envelope mr-2"></i>
                  <span>Correo electrónico:</span>
                  <a href="mailto:correo@empresa.com" class="text-decoration-none">correo@empresa.com</a>
                </div>

                <div class="mb-3">
                  <i class="far fa-id-card mr-2"></i>
                  <span>DNI:</span>
                  <span>12345678A</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid p-0 m-0" style="background: linear-gradient(to bottom right, #3d3d3d, #6565652d); border-radius: 10px;">
    <div class="row justify-content-center m-0 my-5">
      <div class="col-md-6" style="max-width: 500px;">
        <div class="card shadow-lg" style="border-radius: 10px; margin-top: 15px;">
          <div class="card-header text-center" style="background-color: #6e6e6e; color: #fff; border-top-left-radius: 10px; border-top-right-radius: 10px; ">
            <h3 class="card-title mb-0 py-2 align-items: center text-center" >Editar perfil</h3>
          </div>
          <div class="card-body">
            <form>
              <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" value="" placeholder="Nombre">
              </div>
              <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="apellidos" value="" placeholder="Apellidos">
              </div>
              <div class="mb-3">
                <label for="dni" class="form-label">Dni</label>
                <input type="text" class="form-control" id="dni" value="" placeholder="Dni">
              </div>
              <div class="mb-3">
                <label for="correo" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="correo" value="" placeholder="Correo electrónico">
              </div>
              <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="tel" class="form-control" id="telefono" value="" placeholder="Teléfono">
              </div>
              <div class="mb-3">
                <label for="puesto-trabajo" class="form-label">Puesto de trabajo</label>
                <input type="text" class="form-control" id="puesto-trabajo" value="" placeholder="Puesto de trabajo">
              </div>
              <div class="card-body d-flex justify-content-center">
                <button type="submit" class="btn btn-light btn-lg shadow-sm" style="border-radius: 30px; background-color: #6e6e6e; color: #fff; border: none; width: 200px;"
                  onmouseover="this.style.backgroundColor='#8a8a8a'; this.style.color='#fff'"
                  onmouseout="this.style.backgroundColor='#6e6e6e'; this.style.color='#fff'">
                  Guardar cambios
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
