@extends('layouts.homelayout')
@section('content')
</div>
</div>
</div>
<link href="{{ asset('/css/estaciones.css') }}" rel="stylesheet">

<main class="pt-20 w-screen  font-serif flex items-center justify-center  flex-wrap">
<div class="container ">


<div class="grid grid-cols-12 gap-4 w-full">
  <div class="md:col-span-3 col-span-12 w-full overflow-hidden">
    <!-- Contenido de la primera columna -->
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
  <div class="p-4 overflow-y-auto" >
  <ul class="max-w-xs flex flex-col divide-y divide-gray-200 dark:divide-gray-700  ">
    @foreach($stations as $stationA)

  <li class="inline-flex items-center gap-x-2  py-3 text-sm font-medium text-gray-800 dark:text-white">
   <a href="{{route('showStation', ['id' => $stationA->id]);}}">{{$stationA->name}}</a>
  </li>
  @endforeach
  {{$stations->links()}}
  

</ul>

  </div>
</div>
  </div>
  <div class="md:col-span-9 col-span-12 w-full">
    <!-- Contenido de la segunda columna -->
    <div class="grid h-screen place-items-center">
         <!-- component -->
         <div class="flex justify-center">
<div
 class="card pt-22 min-w-sm max-w-sm border border-gray-100 bg-blue-400   transition-shadow test  shadow-lg hover:shadow-shadow-xl w-full bg-green-600 text-purple-50 rounded-md">
 <h2 class="text-md mb-2 px-4 pt-4">
   <div class="flex justify-between">
     <div class="badge relative top-0">
       <span class="mt-2 py-1 h-12px text-md font-semibold w-12px  rounded right-1 bottom-1 px-4">{{$station->name}}</span></div>
     <span class="text-lg font-bold ">{{ date('H:i:s') }}</span>
   </div>
 </h2>


 <div class="flex items-center p-4">
   <div class="flex justify-center items-center w-96"><div class="compass ">
<div class="direction">
<p>{{$windD}}<span>{{$wind}}</span></p>
</div>
<div class="arrow {{Str::lower($windD)}}"></div>
</div></div>
 </div>
 <div class="text-md pt-4 pb-4 px-4">
   <div class="flex justify-between items-center">
     <div class="space-y-2">
     <span class="flex space-x-2 items-center">UVI : {{$uvi}}</span>
     <span class="flex space-x-2 items-center">Lluvia: {{$rain}}</span>


     <span class="flex space-x-2 items-center">Presión Relativa : {{$pressureR}} </span>
     <span class="flex space-x-2 items-center">Presión Absoluta : {{$pressureA}}</span>




       <span class="flex space-x-2 items-center">Viento : <svg height="20" width="20" viewBox="0 0 32 32" class="fill-current"><path d="M13,30a5.0057,5.0057,0,0,1-5-5h2a3,3,0,1,0,3-3H4V20h9a5,5,0,0,1,0,10Z"></path><path d="M25 25a5.0057 5.0057 0 01-5-5h2a3 3 0 103-3H2V15H25a5 5 0 010 10zM21 12H6V10H21a3 3 0 10-3-3H16a5 5 0 115 5z"></path></svg> <span>{{$wind}} km/h</span></span><span class="flex space-x-2 items-center">Humedad : <svg height="20" width="20" viewBox="0 0 32 32" class="fill-current"><path d="M16,24V22a3.2965,3.2965,0,0,0,3-3h2A5.2668,5.2668,0,0,1,16,24Z"></path><path d="M16,28a9.0114,9.0114,0,0,1-9-9,9.9843,9.9843,0,0,1,1.4941-4.9554L15.1528,3.4367a1.04,1.04,0,0,1,1.6944,0l6.6289,10.5564A10.0633,10.0633,0,0,1,25,19,9.0114,9.0114,0,0,1,16,28ZM16,5.8483l-5.7817,9.2079A7.9771,7.9771,0,0,0,9,19a7,7,0,0,0,14,0,8.0615,8.0615,0,0,0-1.248-3.9953Z"></path></svg> <span>{{$humidity}}%</span></span>
     </div>
     <div>
       <h1 class="text-6xl"> {{$temperature}} º </h1>
     </div>
   </div>
 </div>
 </div>

</div>
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
