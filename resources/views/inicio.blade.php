@extends('layouts.app')

@section('na', 'Historial')

@section('content_header')
    <h1>Inicio</h1>
@stop

@section('content')
<div id="map" style="height: 400px;"></div>
<button id="enable-location-btn" onclick="showmap()" style="display: none;">Habilitar geolocalización</button>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>

<script>

    function showmap(){
	var map = L.map('map').setView([40.416775, -3.703790], 13);

	L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		maxZoom: 19
	}).addTo(map);

	L.marker([40.416775, -3.703790]).addTo(map)
		.bindPopup("Madrid, España").openPopup();
}
function showPosition(position) {
  alert("Latitude: " + position.coords.latitude +
  "<br>Longitude: " + position.coords.longitude);
}


  navigator.geolocation.getCurrentPosition(showPosition);

</script>

    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />
@stop

@section('js')
@stop
