@extends('layouts.app')

@section('na', 'Historial')

@section('content_header')
<div class="container-fluid bg-dark py-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center display-3 fw-bold text-light animate__animated animate__fadeInDown">
                @if (Auth::user()->type === 1)
                  <i class="fas fa-history text-danger mr-3"></i><b>Historial de Usuarios</b>

                  @else
                  <i class="fas fa-history text-danger mr-3"></i><b>Historial de Fichajes</b>
                @endif
            </h1>
        </div>
    </div>
</div>

@stop

@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if(session('mensaje'))
<div class="alert alert-success">
    {{ session('mensaje') }}
</div>
@endif

@if (Auth::user()->type === 0)
<div class="container my-5">
  <div class="d-flex justify-content-center">
    <button id="btn-semana" class="btn btn-outline-dark mx-1">Fichajes por semana</button>
    <button id="btn-mes" class="btn btn-outline-dark mx-1">Fichajes por mes</button>
  </div>
  <div style="max-width: 100%; padding-top: 50px; text-align: center;">
    <canvas id="miGrafico"></canvas>
    <button id="btn-generar-pdf-semanal" class="btn btn-outline-dark mx-1" style="margin-top: 50px;">Generar PDF</button>
  </div>
  
  <div style="max-width: 100%; padding-bottom: 50px; text-align: center;">
    <canvas id="miGraficoMes" style="display: none;"></canvas>
    <button id="btn-generar-pdf-mensual" class="btn btn-outline-dark mx-1" style="margin-top: 50px; display: none;">Generar PDF</button>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

  var fichajesSemana = {
      "Lunes": {{ isset($fichajesSemana[0]->horas) ? $fichajesSemana[0]->horas : 0 }},
      "Martes": {{ isset($fichajesSemana[1]->horas) ? $fichajesSemana[1]->horas : 0 }},
      "Miércoles": {{ isset($fichajesSemana[2]->horas) ? $fichajesSemana[2]->horas : 0 }},
      "Jueves": {{ isset($fichajesSemana[3]->horas) ? $fichajesSemana[3]->horas : 0 }},
      "Viernes": {{ isset($fichajesSemana[4]->horas) ? $fichajesSemana[4]->horas : 0 }}
  };

  var fichajesMes = {
    @foreach ($fichajesMes as $index => $fichaje)
        {{ $index + 1 }} : {{ isset($fichaje->horas) ? $fichaje->horas : 0 }},
    @endforeach
  };


  // Configuración del gráfico para fichajes por semana
  var ctxSemana = document.getElementById('miGrafico').getContext('2d');
  var myChartSemana = new Chart(ctxSemana, {
      type: 'bar',
      data: {
          labels: Object.keys(fichajesSemana),
          datasets: [{
              label: 'Horas trabajadas',
              data: Object.values(fichajesSemana),
              backgroundColor: 'rgba(54, 162, 235, 0.5)',
              borderColor: 'rgba(54, 162, 235, 1)',
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });

  // Configuración del gráfico para fichajes por mes
  var ctxMes = document.getElementById('miGraficoMes').getContext('2d');
  var myChartMes = new Chart(ctxMes, {
      type: 'bar',
      data: {
          labels: Object.keys(fichajesMes),
          datasets: [{
              label: 'Horas trabajadas',
              data: Object.values(fichajesMes),
              backgroundColor: 'rgba(255, 99, 132, 0.5)',
              borderColor: 'rgba(255, 99, 132, 1)',
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });

  // Funcionalidad de los botones
  $(document).ready(function() {
      $('#btn-semana').click(function() {
          $('#miGrafico').show();
          $('#miGraficoMes').hide();
          $('#btn-generar-pdf-semanal').show();
          $('#btn-generar-pdf-mensual').hide();
          $('#btn-semana').addClass('active');
          $('#btn-mes').removeClass('active');
      });

      $('#btn-mes').click(function() {
          $('#miGrafico').hide();
          $('#miGraficoMes').show();
          $('#btn-generar-pdf-semanal').hide();
          $('#btn-generar-pdf-mensual').show();
          $('#btn-semana').removeClass('active');
          $('#btn-mes').addClass('active');
      });
  });

  $('#btn-generar-pdf-semanal').click(function() {
        // Redirige a la ruta de generación de PDF
        window.location.href = '{{ route("generarPDFSemanal") }}';
    });

    $('#btn-generar-pdf-mensual').click(function() {
        // Redirige a la ruta de generación de PDF
        window.location.href = '{{ route("generarPDFMensual") }}';
    });
</script>
@endif

@if (Auth::user()->type === 1)
<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="row justify-content-end mb-3">
          <div class="col-auto">
            <a href="{{ route('addUser') }}" class="btn btn-primary" role="button">
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
            @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->nombre }}</td>
                    <td>{{ $usuario->apellidos }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>
                        <div class="d-flex justify-content-between">
                            <form action="{{ route('verDetalles') }}" method="POST">
                                @csrf
                                @method('POST')
                                <input type="hidden" name="id" value="{{ $usuario->id }}">
                                <button type="submit" class="btn btn-outline-primary mr-2" data-toggle="tooltip" data-placement="top" title="Ver detalles">
                                    <span class="fa fa-trash"></span>
                                    <i>Ver detalles</i>
                                </button>
                            </form>
                            <form action="{{ route('usuarios.destroy', $usuario) }}" method="POST">
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
            @endforeach
            </tbody>      
        </table>
      </div>
    </div>
  </div>
</div>
@endif

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