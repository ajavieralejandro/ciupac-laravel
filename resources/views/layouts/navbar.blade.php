<nav class="px-4 py-4 flex justify-between items-center bg-white shadow-md w-full fixed top-0 left-0 right-0 z-10">
	<a class="text-3xl font-bold leading-none" href="#">
		<img src="{{ asset('/public/images/ciupac_2.ico') }}" alt="logo" />
	</a>
	<div class="lg:hidden">
		<button class="navbar-burger flex items-center text-gray-600 p-3">
			<svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
				<title>Mobile menu</title>
				<path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
			</svg>
		</button>
	</div>
	<ul class="hidden absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:flex lg:mx-auto lg:flex lg:items-center lg:w-auto lg:space-x-6">
		<li><a class="text-sm text-gray-400 hover:text-gray-500 font-bold" href="{{ route('welcome') }}">Home</a></li>
		<li class="text-gray-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" /></svg></li>
		<li><a class="text-sm text-gray-400 font-bold" href="{{ route('welcome').'/#about' }}">Nosotros</a></li>
		<li class="text-gray-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" /></svg></li>
		<li><a class="text-sm text-gray-400 hover:text-gray-500 font-bold" href="{{ route('welcome').'/#news' }}">Novedades</a></li>
		<li class="text-gray-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" /></svg></li>
		<li><a class="text-sm text-gray-400 hover:text-gray-500 font-bold" href="{{ route('welcome').'/#team' }}">Equipo</a></li>
		<li class="text-gray-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" /></svg></li>
		<li>
			<a onClick="myFunction()" class="cursor-pointer text-sm text-gray-400 hover:text-gray-500 font-bold">Mediciones</a>
			<div id="menuMediciones" class="hidden absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
				<div class="py-1" role="none">
					<ul>
						<li><a href="http://ciupaceventos.iado-conicet.gob.ar/" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem">Eventos y Tormentas</a></li>
						<li><a href="http://ciupacperfiles.iado-conicet.gob.ar/" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem">Perfiles de Playa</a></li>
						<li><a href="{{ route('estaciones') }}" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem">Estaciones Meteorológicas</a></li>
						<li><a href="{{ route('mediciones_basura', ['month' => \Carbon\Carbon::now()->format('m')]) }}" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem">Mediciones Basura</a></li>
						<li><a href="http://ciupaccoastsnap.iado-conicet.gob.ar/" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem">CoastSnap</a></li>
					</ul>
				</div>
			</div>
		</li>
		<li class="text-gray-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" /></svg></li>
		<li><a class="text-sm text-gray-400 hover:text-gray-500 font-bold" href="{{ route('welcome').'/#contactsection' }}">Contacto</a></li>
	</ul>
</nav>

<div class="navbar-menu relative z-50 hidden">
	<div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
	<nav class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-scroll">
		<div class="flex items-center mb-8">
			<a class="mr-auto text-3xl font-bold leading-none" href="#">
				<img class="float-right" src="{{ asset('/public/images/ciupac_2.ico') }}" alt="icono" />
			</a>
			<button class="navbar-close">
				<svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
			</button>
		</div>
		<div>
			<ul>
				<li class="mb-1"><a class="block navbar-burger p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" href="{{ route('welcome') }}">Home</a></li>
				<li class="mb-1"><a class="block navbar-burger p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" href="{{ route('welcome').'/#about' }}">Nosotros</a></li>
				<li><a onClick="showDropdown()" href="#basic-usage" class="cursor-pointer block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded">Mediciones</a></li>
				<div id="dropdown" class="hidden">
					<li class="ml-4"><a href="http://ciupacperfiles.iado-conicet.gob.ar/" class="group flex items-start py-1 hover:text-slate-900 dark:text-slate-400 dark:hover:text-slate-300">Perfiles de Playa</a></li>
					<li class="ml-4"><a href="http://ciupaceventos.iado-conicet.gob.ar/" class="group flex items-start py-1 hover:text-slate-900 dark:text-slate-400 dark:hover:text-slate-300">Eventos y tormentas</a></li>
					<li class="ml-4"><a href="{{ route('estaciones') }}" class="group flex items-start py-1 hover:text-slate-900 dark:text-slate-400 dark:hover:text-slate-300">Estaciones Meteorológicas</a></li>
					<li class="ml-4"><a href="{{ route('mediciones_basura', ['month' => \Carbon\Carbon::now()->format('m')]) }}" class="group flex items-start py-1 hover:text-slate-900 dark:text-slate-400 dark:hover:text-slate-300">Mediciones Basura</a></li>
					<li class="ml-4"><a href="http://ciupaccoastsnap.iado-conicet.gob.ar/" class="group flex items-start py-1 hover:text-slate-900 dark:text-slate-400 dark:hover:text-slate-300">CoastSnap</a></li>
				</div>
				<li class="mb-1"><a class="block navbar-burger p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" href="{{ route('welcome').'/#news' }}">Novedades</a></li>
				<li class="mb-1"><a class="block p-4 navbar-burger text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" href="{{ route('welcome').'/#team' }}">Equipo</a></li>
				<li class="mb-1"><a class="block p-4 navbar-burger text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" href="{{ route('welcome').'/#contactsection' }}">Contacto</a></li>
			</ul>
		</div>
		<div class="mt-auto">
			<p class="my-4 text-xs text-center text-gray-400"><span>Copyright © 2023</span></p>
		</div>
	</nav>
</div>

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
		if (x.classList.contains("hidden")) {
			x.classList.remove("hidden");
		} else {
			x.classList.add("hidden");
		}
	}
</script>

<script>
	document.addEventListener('DOMContentLoaded', function() {
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