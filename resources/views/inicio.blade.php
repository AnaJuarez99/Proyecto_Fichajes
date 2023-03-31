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
    var map = L.map('map').setView([51.505, -0.09], 13);
 L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
maxZoom: 19,
attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);
    </script>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />
@stop

@section('js')
@stop
