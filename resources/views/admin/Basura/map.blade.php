@extends('layouts.app') <!-- Assuming you have a layout file -->

@section('content')
<div class="container mx-auto">
    <h2 class="text-2xl font-bold mb-4">Mapa de Basuras</h2>

    <div id="map" style="height: 500px;"></div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <script>
        // Initialize the map
        var map = L.map('map').setView([20.0, -100.0], 5);

        // Add OpenStreetMap tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);

        // Basuras data from the server
        var basuras = @json($basuras); // Pass the PHP variable to JavaScript
        console.log("basuras es : ", basuras);

        // Function to calculate total waste for a given localidad
        function calcularTotalResiduos(localidadData) {
            let total = 0;
            const keysToSum = [
                "residuos_papel", "residuos_goma", "residuos_vidrio", "residuos_ceramica",
                "residuos_cigarrillos", "desechos_sanitarios", "residuos_ropa", "residuos_madera",
                "residuos_metal", "residuos_otros"
            ];

            localidadData.forEach(entry => {
                keysToSum.forEach(key => {
                    total += entry[key] || 0;
                });
            });

            return total;
        }

        // Loop through the basuras and add markers to the map
        for (var localidadId in basuras) {
            if (basuras.hasOwnProperty(localidadId)) {
                var localidadData = basuras[localidadId];
                var lat = localidadData[0].localidad.latitude;
                var lng = localidadData[0].localidad.longitude;

                var totalResiduos = calcularTotalResiduos(localidadData);

                L.marker([lat, lng])
                    .addTo(map)
                    .bindPopup('Localidad ID: ' + localidadId + '<br>Total Residuos: ' + totalResiduos);
            }
        }

    </script>
</div>
@endsection
