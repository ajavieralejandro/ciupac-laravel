@extends('layouts.homelayout')

@section('content')
<div class="relative w-screen">
    <div id="map" class="absolute top-0 left-0 w-full"></div>
</div>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

<script>
    document.addEventListener("DOMContentLoaded", function () {
        console.log("Iniciando mapa...");

        function ajustarAlturaMapa() {
            var navbar = document.querySelector('nav');
            var navbarHeight = navbar ? navbar.offsetHeight : 64; // Default 64px si no encuentra navbar
            var mapElement = document.getElementById('map');

            if (mapElement) {
                mapElement.style.height = `calc(100vh - ${navbarHeight}px)`;
            }
        }

        // Ejecutar ajuste cuando se carga la página
        ajustarAlturaMapa();

        // Si la navbar cambia de tamaño (por ejemplo, en un responsive), reajustamos
        window.addEventListener("resize", ajustarAlturaMapa);

        // Definir límites para Buenos Aires
        var southWest = L.latLng(-41.774, -77.227);
        var northEast = L.latLng(-20.712, -42.227);
        var bounds = L.latLngBounds(southWest, northEast);

        // Inicializar el mapa centrado en Buenos Aires
        var map = L.map('map', {
            center: [-36.6769, -60.5586], // Coordenadas de Buenos Aires
            zoom: 7,
            minZoom: 7,
            maxZoom: 12,
            maxBounds: bounds,
            maxBoundsViscosity: 1.0, // Evita que el usuario se desplace fuera de los límites
        });

        // Agregar capa de OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);

        console.log("Mapa cargado correctamente.");

        // Obtener datos de basuras desde Laravel
        var basuras = @json($basuras);
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
