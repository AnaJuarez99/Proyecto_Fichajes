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



    </script>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />
@stop

@section('js')
@stop
