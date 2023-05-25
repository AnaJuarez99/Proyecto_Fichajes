@extends('layouts.app')

@section('na', 'Dashboard')

@section('content_header')
    <h1>Detalles</h1>
@stop

@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<table class="table table-hover">
    <thead class="thead-dark">
      <tr>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Email</th>
        <th>DNI</th>
        <th>Teléfono</th>
        <th>Puesto</th>
        <th>Centro</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{ $usuario->nombre }}</td>
        <td>{{ $usuario->apellidos }}</td>
        <td>{{ $usuario->email }}</td>
        <td>{{ $usuario->dni }}</td>
        <td>{{ $usuario->telefono }}</td>
        <td>{{ $usuario->puesto }}</td>
        <td>
                <form method="POST" action="{{ route('updateCenter') }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $usuario->id }}">
                    <select id="centro" name="centro">
                        @foreach ($centros as $centro)
                          <option value="{{ $centro->id }}" @if ($centro->id == $usuario->centro) selected @endif>{{ $centro->direccion }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-outline-primary mr-2" data-toggle="tooltip" data-placement="top" title="Editar">Editar</button>
                </form>          
        </td>
      </tr>
    </tbody>
  </table>

  <table class="table table-hover text-center">
    <thead class="thead-dark">
      <tr>
        <th>Fecha</th>
        <th>Hora entrada</th>
        <th>Localización entrada</th>
        <th>Hora salida</th>
        <th>Localización salida</th>
        <th>Horas</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($fichajes as $fichaje)
            <tr>
                <td>{{$fichaje->fecha}}</td>
                <td>{{$fichaje->hora_entrada}}</td>
                <td>{{$fichaje->localizacion_entrada}}</td>
                <td>{{$fichaje->hora_salida}}</td>
                <td>{{$fichaje->localizacion_salida}}</td>
                <td>{{$fichaje->horas}}</td>
            </tr>
        @endforeach
    </tbody>
  </table>

  @stop

  @section('css')
    <link rel="stylesheet" href="{{ asset('css/admin_custom.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/dist/css/adminlte.min.css') }}">
  @stop
  
  @section('js')
      <script> console.log('Hi!'); </script>
  @stop