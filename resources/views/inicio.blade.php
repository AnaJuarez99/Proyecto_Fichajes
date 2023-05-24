@extends('layouts.app')

@section('na', 'Historial')

@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">

@if(session()->has('mensaje'))
    <div class="alert alert-success">
        {{ session()->get('mensaje') }}
    </div>
@endif

<div id="error-message" style="display: none;">La geolocalización no está disponible en tu dispositivo.</div>
    <div id="map" style="height: 400px; "></div>

    <div class="d-flex justify-content-center align-items-center">
        <form action="{{ route('inicio.fichar') }}" method="post" enctype="multipart/form-data" class="d-flex justify-content-center align-items-center w-100">
            @csrf
            <input type="hidden" name="address" id="address" value="">
            <button type="submit" class="w-50 btn btn-dark btn-lg border-10 my-5">Fichar</button>
        </form>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


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
                    document.getElementById('error-message').style.display = 'block';
                }
                if (err.code === 3) {
                    console.log("Se ha agotado el tiempo de espera para geolocalizar tu dispositivo...");
                }
            }

            function success(pos) {
                navigator.geolocation.clearWatch(watcher);

                $.getJSON('https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=' + pos.coords.latitude + '&lon=' + pos.coords.longitude, function(data) {
                    $('#address').val(data.display_name);
                });

                var map = L.map('map').setView([pos.coords.latitude, pos.coords.longitude], 19);

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

</script>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />
@stop

@section('js')
@stop