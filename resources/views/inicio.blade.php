@extends('layouts.app')

@section('na', 'Historial')

@section('content_header')
    <h1>Inicio</h1>
@stop

@section('content')
    <div id="map" style="height: 400px; "></div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>


    <script>
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
            }
        });


        //Graficas
        // Obtener los datos de prueba


// Datos de ejemplo (hora y nombre de directores)
// Datos de ejemplo (hora y cantidad de usuarios)
var data = {
  labels: ['08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00'],
  datasets: [
    {
      label: 'Juan Pérez',
      backgroundColor: 'rgba(255, 99, 132, 0.5)',
      data: [1, 0, 3, 4, 3, 2, 0, 0, 0]
    },
    {
      label: 'María González',
      backgroundColor: 'rgba(54, 162, 235, 0.5)',
      data: [0, 0, 2, 3, 4, 5, 2, 1, 0]
    },
    {
      label: 'Pedro Rodríguez',
      backgroundColor: 'rgba(255, 206, 86, 0.5)',
      data: [0, 1, 2, 2, 2, 2, 2, 2, 0]
    }
  ]
};

// Configuración del gráfico
var options = {
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
  }
};

// Configurar el gráfico
var ctx = document.getElementById('miGrafico').getContext('2d');
var myChart = new Chart(ctx, {
  type: 'bar',
  data: data,
  options: options
});

//as


    </script>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />
@stop

@section('js')
@stop
