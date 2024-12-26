@extends('layouts.app') <!-- Assuming you have a layout file -->

@section('content')
<div class="container mx-auto">
    <h2 class="text-2xl font-bold mb-4">Mapa de Basuras</h2>

    <div id="map" style="height: 500px;"></div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <script>
        // Initialize the map
        var map = L.map('map').setView([20.0, -100.0], 5); // Set initial view (latitude, longitude, zoom level)

        // Add OpenStreetMap tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);

        // Basuras data from the server
        var basuras = @json($basuras); // Pass the PHP variable to JavaScript
        console.log(basuras);
        // Loop through the basuras and add markers to the map
        for (var localidadId in basuras) {
            if (basuras.hasOwnProperty(localidadId)) {
                var localidadData = basuras[localidadId];

                // Assuming each localidad has a lat and lng property
                // You may need to adjust this based on your actual data structure
                // Here we assume that the first item in the array has the location data
                var lat = localidadData[0].localidad.latitude; // Get latitude from the first item
                var lng = localidadData[0].localidad.longitude; // Get longitude from the first item

                // Create a marker for each localidad
                L.marker([lat, lng])
                    .addTo(map)
                    .bindPopup('Localidad ID: ' + localidadId + '<br>Waste Count: ' + localidadData
                        .length); // Customize popup content
            }
        }

    </script>
</div>
@endsection
