<html lang="en" class="scroll-smooth">

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ciupac</title>
	<link rel="icon" href="{{asset('/public/images/ciupac_2.ico')}}">

    <meta name="author" content="David Grzyb">
    <meta name="description" content="">
    
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
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
</head>

<body class="bg-white		">
   
<header>
    <nav class="  px-4 py-4 flex justify-between items-center bg-white shadow-md w-full
            fixed top-0 left-0 right-0 z-10">
		<a class="text-3xl font-bold leading-none" href="#">
    <img  src="{{asset('/public/images/ciupac_2.ico')}}" alt="logo"  />

		</a>
		<div class="lg:hidden">
			<button class="navbar-burger  flex items-center text-gray-600 p-3">
				<svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
					<title>Mobile menu</title>
					<path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
				</svg>
			</button>
		</div>
		<ul class="hidden absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:flex lg:mx-auto lg:flex lg:items-center lg:w-auto lg:space-x-6">
			<li><a class="text-sm text-gray-400 hover:text-gray-500 font-bold" 		href="{{route('welcome')}}">
Home</a></li>
			<li class="text-gray-300">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
				</svg>
			</li>
			<li><a class="text-sm text-gray-400 font-bold" 		href="{{route('welcome').'/#about'}}">Nosotros</a></li>
			<li class="text-gray-300">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
				</svg>
			</li>
			<li><a class="text-sm text-gray-400 hover:text-gray-500 font-bold" 		href="{{route('welcome').'/#news'}}">
Novedades</a></li>
			<li class="text-gray-300">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
				</svg>
			</li>
			<li><a class="text-sm text-gray-400 hover:text-gray-500 font-bold" 		href="{{route('welcome').'/#team'}}">
Equipo</a></li>
<li class="text-gray-300">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
				</svg>
			</li>
			<li><a onClick="myFunction()" class="cursor-pointer text-sm text-gray-400 hover:text-gray-500 font-bold" >Mediciones</a>
      <div id="menuMediciones" class="hidden	 absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
    <div class="py-1" role="none">
      <ul>
        <li>      <a href="http://ciupaceventos.iado-conicet.gob.ar/" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">Eventos y Tormentas</a>
</li>
        <li>      <a href="http://ciupacperfiles.iado-conicet.gob.ar/" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-1">Perfiles de Playa</a>
</li>
        <li>      <a href="{{route('estaciones')}}" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-2">Estaciones Meteorológicas</a>
</li>
        <li>      <a href="{{route('estaciones')}}"class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-3">Coast Snap</a>
</li>

      </ul>
      <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->

    </div>
  </div>
    </li>
			
			<li class="text-gray-300">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
				</svg>
			</li>
     
      
			<li><a class="text-sm text-gray-400 hover:text-gray-500 font-bold" 		href="{{route('welcome').'/#contactsection'}}">
Contacto</a></li>
		</ul>
	
	</nav>

	<div class="navbar-menu relative z-50 hidden">
		<div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
		<nav class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-scroll">
			<div class="flex items-center mb-8">
				<a class="mr-auto text-3xl font-bold leading-none" href="#">
        <img class="float-right" src="{{asset('/public/images/ciupac_2.ico')}}" alt="icono"  />

				</a>
				<button class="navbar-close">
					<svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
					</svg>
				</button>
			</div>
			<div>
				<ul>
					<li class="mb-1">
						<a class="block navbar-burger p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" 		href="{{route('welcome')}}">
Home</a>
					</li>
					<li class="mb-1">
						<a class="block navbar-burger p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" 		href="{{route('welcome').'/#about'}}">
Nosotros</a>
</li>
<li>
            <a onClick="showDropdown()" href="#basic-usage" class="cursor-pointer block  p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" >Mediciones
            </a>
        </li>
        <div id="dropdown" class="hidden">
        <li class="ml-4">
            <a href="http://ciupacperfiles.iado-conicet.gob.ar/"   class="group flex items-start py-1 hover:text-slate-900 dark:text-slate-400 dark:hover:text-slate-300">
                <svg width="3" height="24" viewBox="0 -9 3 24"
                    class="mr-2 text-slate-400 overflow-visible group-hover:text-slate-600 dark:text-slate-600 dark:group-hover:text-slate-500">
                    <path d="M0 0L3 3L0 6" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                    </path>
                </svg>Perfiles de Playa
            </a>
        </li>
        <li class="ml-4">
            <a href="http://ciupaceventos.iado-conicet.gob.ar/"
                class="group flex items-start py-1 hover:text-slate-900 dark:text-slate-400 dark:hover:text-slate-300">
                <svg width="3" height="24" viewBox="0 -9 3 24"
                    class="mr-2 text-slate-400 overflow-visible group-hover:text-slate-600 dark:text-slate-600 dark:group-hover:text-slate-500">
                    <path d="M0 0L3 3L0 6" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                    </path>
                </svg>Eventos y tormentas
            </a>
        </li>
        <li class="ml-4">
            <a href="{{route('estaciones')}}"
                class="group flex items-start py-1 hover:text-slate-900 dark:text-slate-400 dark:hover:text-slate-300">
                <svg width="3" height="24" viewBox="0 -9 3 24"
                    class="mr-2 text-slate-400 overflow-visible group-hover:text-slate-600 dark:text-slate-600 dark:group-hover:text-slate-500">
                    <path d="M0 0L3 3L0 6" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                    </path>
                </svg>Estaciones Meteorológicas
            </a>
        </li>

        <li class="ml-4">
            <a href="{{route('coastSnap')}}"
                class="group flex items-start py-1 hover:text-slate-900 dark:text-slate-400 dark:hover:text-slate-300">
                <svg width="3" height="24" viewBox="0 -9 3 24"
                    class="mr-2 text-slate-400 overflow-visible group-hover:text-slate-600 dark:text-slate-600 dark:group-hover:text-slate-500">
                    <path d="M0 0L3 3L0 6" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                    </path>
                </svg>CoastSnap
            </a>
        </li>
        </div>
      
					<li class="mb-1">
						<a class="block navbar-burger p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" 		href="{{route('welcome').'/#news'}}">
Novedades</a>
					</li>
					<li class="mb-1">
						<a class="block p-4 navbar-burger text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" 		href="{{route('welcome').'/#team'}}">
Equipo</a>
					</li>
					<li class="mb-1">
						<a class="block p-4 navbar-burger text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" 		href="{{route('welcome').'/#contactsection'}}">
Contacto</a>
					</li>
				</ul>
			</div>
			<div class="mt-auto">
			
				<p class="my-4 text-xs text-center text-gray-400">
					<span>Copyright © 2023</span>
				</p>
			</div>
		</nav> 
</div> 
  </header>
  <main class="h-screen w-screen py-6  flex items-center justify-center  flex-wrap">
   <div style="">
    @yield('content')
    </div>

</main>


</body>

<script>
  function myFunction() {
  var x = document.getElementById("menuMediciones");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function showDropdown() {
  var x = document.getElementById("dropdown");
  if(x.classList.contains("hidden"))
  x.classList.remove("hidden");
  else
  x.classList.add("hidden");
  

}
</script>

<script>
// Burger menus
document.addEventListener('DOMContentLoaded', function() {
    // open
    const burger = document.querySelectorAll('.navbar-burger');
    const menu = document.querySelectorAll('.navbar-menu');

    if (burger.length && menu.length) {
        for (var i = 0; i < burger.length; i++) {
            burger[i].addEventListener('click', function() {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('hidden');
                }
            });
        }
    }

    // close
    const close = document.querySelectorAll('.navbar-close');
    const backdrop = document.querySelectorAll('.navbar-backdrop');

    if (close.length) {
        for (var i = 0; i < close.length; i++) {
            close[i].addEventListener('click', function() {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('hidden');
                }
            });
        }
    }

    if (backdrop.length) {
        for (var i = 0; i < backdrop.length; i++) {
            backdrop[i].addEventListener('click', function() {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('hidden');
                }
            });
        }
    }
});
</script>
<script>
    
</script>


</html>