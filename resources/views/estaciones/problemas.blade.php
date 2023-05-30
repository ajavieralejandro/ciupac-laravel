@extends('layouts.homelayout')
@section('content')
</div>
</div>
</div>
<link href="{{ asset('/css/estaciones.css') }}" rel="stylesheet">

<main class="pt-20 w-screen  font-serif flex items-center justify-center  flex-wrap">
<div class="container ">


<div class="grid grid-cols-12 gap-4 w-full ">
  <div class="md:col-span-3 col-span-6 w-full overflow-hidden ">
    <!-- Contenido de la primera columna -->
    <div class="grid h-screen place-items-center bg-gray-50 border-x-4 border-white shadow-2xl">

    <div class="flex flex-col h-screen ">

  <div class="p-4">
    <!-- Contenido principal aquí -->

    <label for="simple-search" class="sr-only">Buscar</label>
    <form name="search_station" id="search_station" method="POST" action="{{route('searchStations')}}">
    @csrf <!-- {{ csrf_field() }} -->

    <div class="relative w-full">
        <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
        </div>
        <input type="text" id="search" name="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Buscar" required />
    </div>
  <form />

  </div>
  <div class="p-4 overflow-y-auto " >
  <ul class="max-w-xs flex flex-col divide-y divide-gray-200 dark:divide-gray-700  ">
    @foreach($stations as $station)

  <li class="inline-flex items-center gap-x-2  py-3 text-sm font-medium text-gray-800 dark:text-white">
   <a href="{{route('showStation', ['id' => $station->id]);}}">{{$station->name}}</a>
  </li>
  @endforeach
  {{$stations->links()}}
  

</ul>
</div>
  </div>
</div>
  </div>
  <div class="md:col-span-9 col-span-6 w-full">
    <!-- Contenido de la segunda columna -->
    <div class="grid h-screen place-items-center">
         <!-- component -->
<div
 class="card pt-22 min-w-sm max-w-sm border border-gray-100 bg-blue-400   transition-shadow test  shadow-lg hover:shadow-shadow-xl w-full bg-green-600 text-purple-50 rounded-md">
 <img src="https://images.unsplash.com/photo-1433840496881-cbd845929862?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80" alt="technical issues"/>
 <h2 class="text-md mb-2 px-4 pt-4">
  Problemas técnicos con la estación seleccionada, pruebe más tarde
 </h2>



  </div>
</div>

</div>
</main>

@include('layouts.footerPage')

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script>
    var southWest = L.latLng(-20.712, -77.227),
    northEast = L.latLng(-41.774,  -42.227),
    bounds = L.latLngBounds(southWest, northEast);
  var map = L.map('map',{
  maxBounds: bounds,
  minZoom:7,
  maxZoom:12,
 
}).setView([-38.505, -62.09], 7);
  var app = @json($station);
  app = app.data;
  app.forEach(element=>{
    var display=`<a href="/estacion/${element.id}">${element.name}</a>`;
    var marker = L.marker([element.latitude,element.longitude]).addTo(map);
    marker.bindPopup(display);


  })



  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
  }).addTo(map);


</script>

@endsection
