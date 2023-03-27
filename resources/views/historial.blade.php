@extends('layouts.app')

@section('na', 'Historial')

@section('content_header')
<div class="container-fluid bg-dark py-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center display-3 fw-bold text-light animate__animated animate__fadeInDown">
                <i class="fas fa-history text-danger mr-3"></i>Historial de Usuarios
            </h1>
        </div>
    </div>
</div>

  
  
@stop

@section('content')


  
<div class="container my-5">

    <div class="row justify-content-center">
      <div class="col-md-10">
        <h1 class="text-center mb-5"></h1>
        <div class="row justify-content-end mb-3">
            <div class="col-auto">
              <a href="#" class="btn btn-primary" role="button">
                <i class="fas fa-user-plus mr-2"></i>Agregar nuevo usuario
              </a>
            </div>
          </div>
        <div class="table-responsive">
            
          <table class="table table-hover">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Email</th>
                <th scope="col" colspan="2" class="text-center">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Juan</td>
                <td>Apellidos</td>
                <td>a@gmail.com</td>
                <td>
                    <div class="d-flex justify-content-between">
                      <a class="btn btn-outline-primary mr-2" href="#" data-toggle="tooltip" data-placement="top" title="Ver detalles">
                        <span class="fa fa-eye"></span>
                        <i>Ver detalles</i>
                      </a>
                      <form action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Eliminar">
                          <span class="fa fa-trash"></span>
                          <i>Eliminar</i>
                        </button>
                      </form>
                    </div>
                  </td>
              </tr>
              <tr>
                <td>Juan</td>
                <td>Apellidos</td>
                <td>a@gmail.com</td>
                <td>
                    <div class="d-flex justify-content-between">
                      <a class="btn btn-outline-primary mr-2" href="#" data-toggle="tooltip" data-placement="top" title="Ver detalles">
                        <span class="fa fa-eye"></span>
                        <i>Ver detalles</i>
                      </a>
                      <form action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Eliminar">
                          <span class="fa fa-trash"></span>
                          <i>Eliminar</i>
                        </button>
                      </form>
                    </div>
                  </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
  <script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>
  
  
  
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop