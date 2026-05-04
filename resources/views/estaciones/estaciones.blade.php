@extends('layouts.homelayout')
@section('content')
<main class="w-screen bg-slate-50 pt-24 pb-10 font-serif">
  <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">
    <section class="mb-6 overflow-hidden rounded-2xl border border-sky-100 bg-gradient-to-r from-cyan-50 to-blue-50 p-6 shadow-sm sm:p-8">
      <div class="flex flex-col gap-3">
        <span class="inline-flex w-fit rounded-full bg-white/80 px-3 py-1 text-xs font-semibold uppercase tracking-wider text-sky-700">Monitoreo costero</span>
        <h1 class="text-3xl font-bold text-slate-900 sm:text-4xl">Estaciones</h1>
        <p class="max-w-2xl text-sm text-slate-600 sm:text-base">Explorá las estaciones meteorológicas activas, buscá por nombre y visualizá cada ubicación en el mapa interactivo.</p>
      </div>
    </section>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-12">
      <aside class="lg:col-span-4 xl:col-span-3">
        <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">
          <div class="border-b border-slate-200 p-4">
            <form name="search_station" id="search_station" method="POST" action="{{route('searchStations')}}" class="space-y-3">
              @csrf
              <label for="search" class="block text-sm font-semibold text-slate-700">Buscar estación</label>
              <div class="relative w-full">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                  <svg aria-hidden="true" class="h-5 w-5 text-slate-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
                <input type="text" id="search" name="search" class="block w-full rounded-lg border border-slate-300 bg-slate-50 py-2.5 pl-10 pr-3 text-sm text-slate-900 focus:border-sky-500 focus:ring-sky-500" placeholder="Ej: Monte Hermoso" required />
              </div>
            </form>
          </div>

          <div class="max-h-[540px] overflow-y-auto p-2 sm:p-3">
            <ul class="space-y-2">
              @foreach($stations as $station)
                <li>
                  <a href="{{route('showStation', ['id' => $station->id]);}}" class="group flex items-center justify-between rounded-lg border border-slate-200 bg-slate-50 px-3 py-3 text-sm font-medium text-slate-700 transition hover:border-sky-200 hover:bg-sky-50 hover:text-sky-700">
                    <span class="truncate">{{$station->name}}</span>
                    @if(!is_null($station->status))
                      <span class="ml-3 inline-flex shrink-0 rounded-full px-2 py-0.5 text-xs font-semibold {{ $station->status ? 'bg-emerald-100 text-emerald-700' : 'bg-rose-100 text-rose-700' }}">{{ $station->status ? 'Activa' : 'Inactiva' }}</span>
                    @endif
                  </a>
                </li>
              @endforeach
            </ul>

            <div class="mt-4 border-t border-slate-200 pt-4">
              {{$stations->links()}}
            </div>
          </div>
        </div>
      </aside>

      <section class="lg:col-span-8 xl:col-span-9">
        <div class="h-full overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
          <div class="flex items-center justify-between border-b border-slate-200 px-4 py-3 sm:px-6">
            <h2 class="text-base font-semibold text-slate-800 sm:text-lg">Mapa de estaciones</h2>
            <span class="rounded-full bg-sky-100 px-3 py-1 text-xs font-semibold text-sky-700">{{ $stations->total() }} registradas</span>
          </div>
          <div class="z-0 w-full" id="map" style="min-height: 620px;"></div>
        </div>
      </section>
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
  var app = @json($stations);
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
