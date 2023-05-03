@extends('layouts.app')

@section('na', 'Historial')

{{-- @section('content_header')
    <h1>Inicio</h1>
@stop --}}

@section('content')
<div id="error-message" style="display: none;">La geolocalización no está disponible en tu dispositivo.</div>
    <div id="map" style="height: 400px; "></div>


    <div class="d-flex justify-content-center align-items-center">
        <button style="width: 50%;" onclick="fichar()" class="btn btn-dark btn-lg border-10 my-5">Fichar</button>
    </div>




    <div class="d-flex justify-content-center">
        <button id="btn-dia" class="btn btn-outline-dark active mx-1">Fichaje por día</button>
        <button id="btn-semana" class="btn btn-outline-dark mx-1">Fichajes por semana</button>
        <button id="btn-mes" class="btn btn-outline-dark mx-1">Fichajes por mes</button>
    </div>

    <div style="max-width: 100%; padding-bottom: 50px;">
        <canvas id="miGrafico"></canvas>
    </div>
    



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>

        $(document).ready(function() {
        $('#btn-dia').click(function() {
            $(this).addClass('active');
            $('#btn-semana, #btn-mes').removeClass('active');
            // Resto del código para mostrar gráfico por día
        });

        $('#btn-semana').click(function() {
            $(this).addClass('active');
            $('#btn-dia, #btn-mes').removeClass('active');
            // Resto del código para mostrar gráfico por semana
        });

        $('#btn-mes').click(function() {
            $(this).addClass('active');
            $('#btn-dia, #btn-semana').removeClass('active');
            // Resto del código para mostrar gráfico por mes
        });
        });

        $(function() {
            let watcher = navigator.geolocation.watchPosition(success, error, {
                enableHighAccuracy: true,
                timeout: 5000,
                maximumAge: 0,
                accuracy: 10
            });

            function error(err) {
                if (err.code === 1) {
                    console.log("Asegúrate de dar permisos de geolocalización a tu navegador...");
                }
                if (err.code === 2) {
                    console.log("La geolocalizción de tu dispositivo no está disponible...");
                    document.getElementById('error-message').style.display = 'block';
                }
                if (err.code === 3) {
                    console.log("Se ha agotado el tiempo de espera para geolocalizar tu dispositivo...");
                }
            }

            function success(pos) {
                navigator.geolocation.clearWatch(watcher);
                console.log(pos);

                var map = L.map('map').setView([pos.coords.latitude, pos.coords.longitude], 13);
                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                }).addTo(map);

                var redIcon = L.icon({
                    iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
                    iconSize: [25, 41],
                    iconAnchor: [12, 41],
                    popupAnchor: [1, -34],
                });

                var marker = L.marker([pos.coords.latitude, pos.coords.longitude], {icon: redIcon}).addTo(map);

                setInterval(function() {
                    // Aquí puedes actualizar la posición de los marcadores y polígonos
                    // por ejemplo:
                    marker.setLatLng([pos.coords.latitude, pos.coords.longitude]);
                }, 5000);
                document.getElementById('error-message').style.display = 'none';
            }
        });

        // Datos de ejemplo (hora y nombre de directores)
        // Datos de ejemplo (hora y cantidad de usuarios)

        var fechaActual = new Date();
        var mesActual = fechaActual.getMonth();
        var anioActual = fechaActual.getFullYear();
        var diasDelMes = [];

        // Obtenemos el número de días del mes actual
        var numDias = new Date(anioActual, mesActual + 1, 0).getDate();

        // Generamos la lista de días del mes actual
        for (var i = 1; i <= numDias; i++) {
            diasDelMes.push(i.toString());
        }


        var dataDia = {
            labels: ['08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00'],
            datasets: [
                {
                label: 'Juan Pérez',
                backgroundColor: 'rgba(255, 0, 0, 0.7)',
                data: [1, 0, 3, 4, 3, 2, 0, 0, 0]
                },
                {
                label: 'María González',
                backgroundColor: 'rgba(0, 0, 255, 0.7)',
                data: [0, 0, 2, 3, 4, 5, 2, 1, 0]
                },
                {
                label: 'Pedro Rodríguez',
                backgroundColor: 'rgba(0, 156, 34, 0.7)',
                data: [0, 1, 2, 2, 2, 2, 2, 2, 0]
                }
            ]
        };

        var dataSemana = {
            labels: ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'],
            datasets: [
                {
                label: 'Juan Pérez',
                backgroundColor: 'rgba(255, 0, 0, 0.7)',
                data: [10, 8, 12, 9, 15, 11, 7]
                },
                {
                label: 'María González',
                backgroundColor: 'rgba(0, 0, 255, 0.7)',
                data: [5, 6, 4, 7, 8, 9, 10]
                },
                {
                label: 'Pedro Rodríguez',
                backgroundColor: 'rgba(0, 156, 34, 0.7)',
                data: [3, 2, 1, 3, 2, 1, 0]
                }
            ]
        };

        var dataMes = {
        labels: diasDelMes,
            datasets: [
                {
                label: 'Juan Pérez',
                backgroundColor: 'rgba(255, 0, 0, 0.7)',
                data: [5, 6, 4, 7, 8, 9, 10, 12, 11, 9, 10, 11, 12, 13, 15, 14, 13, 12, 11, 9, 8, 7, 6, 5, 4, 3, 2, 1, 2, 3, 4]
                },
                {
                label: 'María González',
                backgroundColor: 'rgba(0, 0, 255, 0.7)',
                data: [3, 2, 1, 3, 2, 1, 0, 2, 3, 4, 5, 6, 7, 8, 9, 8, 7, 6, 5, 4, 3, 2, 1, 0, 1, 2, 3, 4, 5, 6, 7]
                },
                {
                label: 'Pedro Rodríguez',
                backgroundColor: 'rgba(0, 156, 34, 0.7)',
                data: [1, 0, 3, 4, 3, 2, 0, 2, 4, 6, 8, 10, 9, 7, 5, 4, 3, 2, 1, 0, 2, 4, 6, 8, 9, 7, 5, 4, 3, 2, 1]
                }
            ]
        };


        var options = {
            responsive: true,
            scales: {
                x: {
                stacked: true
                },
                y: {
                stacked: true
                }
            },
            plugins: {
                legend: {
                position: 'bottom'
                }
            },
            tooltips: {
                mode: 'index',
                intersect: false
            },
        };

        var ctx = document.getElementById('miGrafico').getContext('2d');
        var myChart = new Chart(ctx, {
        type: 'bar',
        data: dataDia,
        options: options
        });

        document.getElementById('btn-dia').addEventListener('click', function() {
        myChart.data = dataDia;
        myChart.update();
        });

        document.getElementById('btn-semana').addEventListener('click', function() {
        myChart.data = dataSemana;
        myChart.update();
        });

        document.getElementById('btn-mes').addEventListener('click', function() {
        myChart.data = dataMes;
        myChart.update();
        });

        //Funcion fichar
        function fichar() {
        // código para fichar
        console.log("Has fichado correctamente");
        }


</script>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />
@stop

@section('js')
@stop
