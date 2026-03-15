<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ciupac</title>
	<link rel="icon" href="{{asset('/public/images/ciupac_2.ico')}}">

    <meta name="author" content="David Grzyb">
    <meta name="description" content="">
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">

        <!-- Tailwind -->
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" rel="stylesheet"/>

<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>

<!-- jQuery, vinculado directo a cdn de google -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<!-- ArgenMap v2, vinculado directo desde el Instituto Geográfico Nacional -->
<script type="text/javascript" src="https://www.ign.gob.ar/argenmap2/argenmap.jquery.min.js"></script>

<style>

#mapid { height: 400px; width:300px; }

</style>

<style type="text/css">
@font-face {
    font-family: LucidaGrande;
    src: url('{{ public_path('lucida-grande/LucidaGrande.tff') }}');
}
</style>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }
    </style>


    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</head>

<body class="bg-white		">
   
<header>
    @include('layouts.navbar')
</header>
  <main class="h-screen w-screen py-6  flex items-center justify-center  flex-wrap">
   <div style="">
    @yield('content')
    </div>

</main>


</body>
</html>