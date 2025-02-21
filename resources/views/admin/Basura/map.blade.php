@extends('layouts.homelayout')

@section('content')
<div class="relative w-screen h-screen">
    <div id="map" class="absolute top-0 left-0 w-full" style="top: 64px; bottom: 0;"></div>
</div>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

<script>
    document.addEventListener("DOMContentLoaded", function () {
        console.log("Iniciando mapa...");

        // Ajustar la altura del mapa para que no pase la navbar
        var navbarHeight = document.querySelector('nav').offsetHeight;
        document.getElementById('map').style.height = `calc(100vh - ${navbarHeight}px)`;

        // Inicializar el mapa centrado en la Provincia de Buenos Aires
        var map = L.map('map').setView([-36.6769, -60.5586], 6);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);

        console.log("Mapa cargado correctamente.");

        // Obtener datos de basuras desde Laravel
        var basuras = @json($basuras); // Pasamos datos del backend al frontend
        console.log("Datos de basuras recibidos:", basuras);

        // Función para calcular total de residuos de cada localidad
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

        // Recorrer los datos de basuras y agregar marcadores al mapa
        for (var localidadId in basuras) {
            if (basuras.hasOwnProperty(localidadId)) {
                var localidadData = basuras[localidadId];
                var lat = localidadData[0].localidad.latitude;
                var lng = localidadData[0].localidad.longitude;

                var totalResiduos = calcularTotalResiduos(localidadData);

                L.marker([lat, lng])
                    .addTo(map)
                    .bindPopup(
                        `<strong>Localidad ID:</strong> ${localidadId}<br>
                         <strong>Total Residuos:</strong> ${totalResiduos}`
                    );
            }
        }

    });

</script>
@endsection
