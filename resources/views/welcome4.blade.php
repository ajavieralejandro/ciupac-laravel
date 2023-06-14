<!DOCTYPE html>
<html lang="es" >

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ciupac</title>
    <meta name="author" content="Javier Amorosi">
    <meta name="description" content="Proyecto Ciupac">
    
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <link href="{{ mix('css/app.css') }}" rel="stylesheet" >
  <link rel="icon" href="{{asset('/public/images/ciupac_2.ico')}}">

    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" rel="stylesheet"/>

<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
<script src="https://cdn.tailwindcss.com/"></script>

<!-- jQuery, vinculado directo a cdn de google -->
<script  src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

<style>
html {
  scroll-behavior: smooth;
}
#mapid { height: 400px; width:100%; }

</style>

<style>
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
        html, body {
    margin: 0px;
    padding: 0px;
}


.carousel {
    position: relative;
    box-shadow: 0px 1px 6px rgba(0, 0, 0, 0.64);
    margin-top: 26px;
}

.carousel-inner {
    position: relative;
    overflow: hidden;
    width: 100%;
}

.carousel-open:checked + .carousel-item {
    position: static;
    opacity: 100;
}

.carousel-item {
    position: absolute;
    opacity: 0;
    -webkit-transition: opacity 0.6s ease-out;
    transition: opacity 0.6s ease-out;
}

.carousel-item img {
    display: block;
    height: auto;
    max-width: 100%;
}

.carousel-control {
    background: rgba(0, 0, 0, 0.28);
    border-radius: 50%;
    color: #fff;
    cursor: pointer;
    display: none;
    font-size: 40px;
    height: 40px;
    line-height: 35px;
    position: absolute;
    top: 50%;
    -webkit-transform: translate(0, -50%);
    cursor: pointer;
    -ms-transform: translate(0, -50%);
    transform: translate(0, -50%);
    text-align: center;
    width: 40px;
    z-index: 10;
}

.carousel-control.prev {
    left: 2%;
}

.carousel-control.next {
    right: 2%;
}

.carousel-control:hover {
    background: rgba(0, 0, 0, 0.8);
    color: #aaaaaa;
}

#carousel-1:checked ~ .control-1,
#carousel-2:checked ~ .control-2,
#carousel-3:checked ~ .control-3 {
    display: block;
}

.carousel-indicators {
    list-style: none;
    margin: 0;
    padding: 0;
    position: absolute;
    bottom: 2%;
    left: 0;
    right: 0;
    text-align: center;
    z-index: 10;
}

.carousel-indicators li {
    display: inline-block;
    margin: 0 5px;
}

.carousel-bullet {
    color: #fff;
    cursor: pointer;
    display: block;
    font-size: 35px;
}

.carousel-bullet:hover {
    color: #aaaaaa;
}

#carousel-1:checked ~ .control-1 ~ .carousel-indicators li:nth-child(1) .carousel-bullet,
#carousel-2:checked ~ .control-2 ~ .carousel-indicators li:nth-child(2) .carousel-bullet,
#carousel-3:checked ~ .control-3 ~ .carousel-indicators li:nth-child(3) .carousel-bullet {
    color: #428bca;
}

#title {
    width: 100%;
    position: absolute;
    padding: 0px;
    margin: 0px auto;
    text-align: center;
    font-size: 27px;
    color: rgba(255, 255, 255, 1);
    font-family: 'Open Sans', sans-serif;
    z-index: 9999;
    text-shadow: 0px 1px 2px rgba(0, 0, 0, 0.33), -1px 0px 2px rgba(255, 255, 255, 0);
}
    </style>
<link href="{{ asset('/css/estaciones.css') }}" rel="stylesheet">


    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</head>

<body class="scroll-smooth">
 


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
			<li><a class="text-sm text-gray-400 font-bold" 		href="{{route('welcome').'/#mediciones'}}">Mediciones</a></li>
			
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
<li class="mb-1">
						<a class="block navbar-burger p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" 		href="{{route('welcome').'/#mediciones'}}">
Mediciones</a>
					</li>
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
  <main class="h-screen w-screen py-6 font-serif flex items-center justify-center  flex-wrap">
   <div>

   


    
   <section class=" fade-in container  w-screen  mx-auto p-10 py-20 px-0 :p-10 md:px-0">
        <section class="relative px-10 md:p-0 transform duration-500 hover:shadow-2xl cursor-pointer hover:-translate-y-1 ">
        <img class="xl:max-w-6xl" src="{{asset($portrait->image_path.'/'.$portrait->image_name)}}" alt="">
            <div class=" group-hover:scale-100 content bg-white p-2 pt-8 md:p-12 pb-12 lg:max-w-lg w-full lg:absolute top-48 right-5">
                <div class="flex justify-between font-bold text-sm">
                 
                </div>
         
                <img class="float-right w-1/2" src="{{asset('/public/images/Ciupac.jpeg')}}" alt="logo ciupac"  />

                <h2 class="text-3xl font-semibold mt-4 md:mt-10">{{$portrait->title}}</h2>
    
                {!!$portrait->body!!}
   
            </div>
        </section>
    </section>
        </div>


       <!-- Posts Section  <div class="container mx-auto px-20">
 -->
 <a id="news"></a>
 <div class="container mx-auto flex flex-wrap w-screen">
@foreach($posts as $post)
@if ($loop->first)

 <article class="p-10 w-screen  rounded-xl text-gray-100  bg-center bg-cover transform duration-500 hover:-translate-y-1 cursor-pointer" style="background-image: url({{asset($post->image_path.'/'.$post->image_name)}})">
            <div class="w-fit opacity-80 bg-black">
             <h1 class=" mt-5 text-4xl text-white leading-snug  min-h-33">{{$post->title}}
             <h1 class=" text-4xl text-white leading-snug  min-h-33">{{$post->description}}

             </h1>
             </div>
             <div class="mt-20">
            
             </div>
             <div class="mt-16 flex justify-between ">
              <span   ></span>
                 <span class="p-3 px-5 bg-gray-200  rounded-md text-base hover:bg-blue-400 cursor-pointer hover:text-white text-black ">        <a  href="{{route('showPost', ['id' => $post->id]);}}">Leer más...</a>

         </span>
             </div>
         </article>
         
         
         
      
@endif
@endforeach
</div>
<a id="news"></a>


<section class="text-gray-600 body-font w-screen">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-wrap w-full mb-20">
      <div class="lg:w-1/2 grid w-full mb-6 lg:mb-0">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Últimas Novedades</h1>
        <div class="h-1 w-20 bg-indigo-500 rounded"></div>
      </div>
      <p class="lg:w-1/2 w-full leading-relaxed text-gray-500"></p>
    </div>


    <div class="flex flex-wrap -m-4">
    @foreach($posts as $post)
@if (!$loop->first)
      <div class="xl:w-1/4 md:w-1/2 p-4">
        <div class="bg-gray-100 p-6 rounded-lg">
          <img class="h-40 rounded w-full object-cover object-center mb-6" src="{{asset($post->image_path.'/'.$post->image_name)}}" alt="content">
          <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font">{{$post->created_at->format('d/m/Y')}}</h3>
          <h2 class="text-lg text-gray-900 font-medium title-font mb-4">{{$post->title}}</h2>
          <p class="leading-relaxed text-base">{{Str::limit($post->description,50)}}</p>
          <a class="text-indigo-500 inline-flex items-center" href="{{route('showPost', ['id' => $post->id]);}}">Leer más
            <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path d="M5 12h14"></path>
              <path d="M12 5l7 7-7 7"></path>
            </svg>
          </a>
        </div>
      </div>
@endif
@endforeach
     
    </div>
     <div class="mt-10   gap-x-6">
          <a href="{{route('showNoticias')}}"class="rounded-md bg-blue-400 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Ver más...</a>
        </div>
  </div>
 
</section>



<a id="about"></a>





    </section>
    


<!-- Posts Section -->




<aside class="w-full p-6 sm:w-60 dark:bg-gray-900 dark:text-gray-100">
<div class="px-8">
    <ul class="text-slate-700 text-sm leading-6">
 
        <li>
            <a href="#basic-usage" class="block py-1 font-medium font-medium  dark:text-sky-400">Mediciones
            </a>
        </li>
        <li class="ml-4">
            <a href="http://ciupacperfiles.iado-conicet.gob.ar/" class="group flex items-start py-1 dark:text-sky-400">
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
                </svg>Estaciones Meteorológicas en vivo 
            </a>
        </li>
        <li>
            <a href="{{route('showArchivos')}}"
                class="block py-1 font-medium hover:text-slate-900 dark:text-slate-400 dark:hover:text-slate-300">Archivos de Interes
            </a>
        </li>
    
     
        <li>
            <a href="#using-custom-values"
                class="block py-1 font-medium hover:text-slate-900 dark:text-slate-400 dark:hover:text-slate-300">Links
            </a>
        </li>
        <li class="ml-4">
            <a href="{{route('showTutoriales')}}"
                class="group flex items-start py-1 hover:text-slate-900 dark:text-slate-400 dark:hover:text-slate-300">
                <svg width="3" height="24" viewBox="0 -9 3 24"
                    class="mr-2 text-slate-400 overflow-visible group-hover:text-slate-600 dark:text-slate-600 dark:group-hover:text-slate-500">
                    <path d="M0 0L3 3L0 6" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                    </path>
                </svg>Tutoriales
            </a>
        </li>
        <li class="ml-4">
            <a href="{{route('showLinks')}}"
                class="group flex items-start py-1 hover:text-slate-900 dark:text-slate-400 dark:hover:text-slate-300">
                <svg width="3" height="24" viewBox="0 -9 3 24"
                    class="mr-2 text-slate-400 overflow-visible group-hover:text-slate-600 dark:text-slate-600 dark:group-hover:text-slate-500">
                    <path d="M0 0L3 3L0 6" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                    </path>
                </svg>Links de interés
            </a>
        </li>
    </ul>
</div>
</aside>

<section class="w-full grid md:w-2/3 flex flex-col items-center ">


<div class="  overflow-hidden ">
<div class="grid h-screen place-items-center">
<div class=" lg:px-0  text-gray-700 mx-auto " >


<div class="relative isolate px-6 pt-2  lg:px-8 rounded">

    <a name="mediciones"></a>

    <section class="flex h-screen items-center bg-stone-100 xl:h-screen font-poppins dark:bg-gray-800 ">
        <div class="justify-center flex-1 max-w-6xl py-4 mx-auto lg:py-6 md:px-6">
            <div class="flex flex-wrap ">
                <div class="w-full px-4 mb-10 lg:w-1/2 lg:mb-0">
                    <div class="relative lg:max-w-md">
                        <img src="{{asset($about->image_path.'/'.$about->image_name)}}" alt="aboutimage"
                            class="relative z-10 object-cover w-full rounded h-96">
                
                    </div>
                </div>
                <div class="w-full pt-6  px-6 mb-10 lg:w-1/2 lg:mb-0    ">
                    <div class="pl-4 mb-6 border-l-4 border-sky-500  ">
                        <span class="text-sm text-gray-600 uppercase dark:text-gray-400">Proyecto Ciupac</span>
                        <h1 class="mt-2 text-3xl font-black text-gray-700 md:text-5xl dark:text-gray-300">
                            Nosotros
                        </h1>
                    </div>
                    <div class="h-screen">
                    <p class="m-auto pt-2 text-base leading-7 text-gray-500 dark:text-gray-400 ">
                      {!!$about->body!!}
                    </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
 
  </div>
  
</div>
</div>
      



    

</div>

</section>



</section>

</section>


</section>
<div class="grid  place-items-center  ">

 
<div class="pt-10 ">
  
<div class="mx-auto sm:max-w-xl md:max-w-full  lg:max-w-screen-xl ">

<div class="container mx-auto pt-10 pb-10 overflow-hidden">
<h2 class="font-bold mb-5 text-gray-800">Localidades</h2>

<div class="grid grid-cols-1 sm:grid-cols-12 ">
<div class="col-span-4 ">
    <div class="p-4 col-span-4 " >
  <ul class="max-w-xs flex flex-col divide-y divide-gray-200 dark:divide-gray-700 max-h-80	overflow-y-scroll   ">
    @foreach($asambleas as $asamblea)

  <li class="inline-flex items-center gap-x-2  py-3 text-sm font-medium text-gray-800 dark:text-white">
   <a href="{{route('showAsamblea', ['id' => $asamblea->id]);}}">{{$asamblea->name}}</a>
  </li>

  
  
  @endforeach
  

</ul>

  </div>
    </div>
    <div class="col-span-8">
<div class="z-0" id="mapid"></div>

</div>

</div>




 
</div>

  <div class="max-w-xl mb-10 md:mx-auto sm:text-center lg:max-w-2xl md:mb-12">
    
   
    <a name="team"></a>

    
    <h2 class="max-w-lg mb-6 font-sans text-3xl font-bold leading-none tracking-tight text-gray-900 sm:text-4xl md:mx-auto">
      <span class="relative inline-block">
      <div class="flex justify-center items-center ">
        <svg class="w-10 h-10 content-center animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
      </div>
        <span class="relative">Conoce</span>
      </span>
      a nuestro equipo
    </h2>
    
    <p class="text-base text-gray-700 md:text-lg">
    </p>
  </div>
  <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-4">
    @foreach($members as $member)
    <div>
      <div class="relative overflow-hidden transition duration-300 transform rounded-lg shadow-lg lg:hover:-translate-y-2 hover:shadow-2xl">
        <img alt="team member" class="object-cover w-full h-56 md:h-64 xl:h-80"        src="{{asset($member->image_path.'/'.$member->image_name)}}"
 alt="Person" />
        <div class="absolute inset-0 flex flex-col justify-center px-5 py-4 text-center transition-opacity duration-300 bg-black bg-opacity-75 opacity-0 hover:opacity-100">
          <p class="mb-4 text-xs  text-white whitespace-pre-line	">
            {{$member->description}}
          </p>
          <div class="flex items-center justify-center space-x-3">
          
          </div>
        </div>
      </div>
      <p class="mb-1 text-lg font-bold text-center text-black">{{$member->name}}</p>
      <p class="mb-4 text-xs text-center text-black">{{$member->email}}</p>

</div>
    @endforeach
 
</div>
</div>
  
  
         <!-- Section: Design Block -->
  <section class="mb-32 w-screen text-gray-800 text-center">

    <h2 class="text-3xl font-bold mb-12">Instituciones contrapartes </h2>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2 content-center">
        @foreach($logos as $logo)
        <div class="mb-12 lg:mb-0">
        <img
        src="{{asset($logo->image_path.'/'.$logo->image_name)}}"
          class="img-fluid  px-6 md:px-12"
          alt="logo"
        />
      </div>
        @endforeach
    

    </div>
    <div class="pt-10">

    <h2 class="text-3xl font-bold mb-12">Financia </h2>

    <div class="grid grid-cols-1 gap-2 content-center w-full">
        @foreach($logos1 as $logo)
        <div class="grid place-items-center">        <img 
        src="{{asset($logo->image_path.'/'.$logo->image_name)}}"
          class="img-fluid  px-6 md:px-12"
          alt="logo"
        />
      </div>
        @endforeach
    </div>

    </div>
<div class="pt-10">
    <h2 class="text-3xl font-bold mb-12 pt-10">Instituciones que nos acompañan</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-2 content-center w-full">
    @foreach($logos2 as $logo)
    <div class="mb-12 pt-10 lg:mb-0 block">
    <img
    src="{{asset($logo->image_path.'/'.$logo->image_name)}}"
      class="img-fluid  px-6 md:px-12"
      alt="logo"
    />
  </div>
    @endforeach
    </div>

</div>

  </section>

  
  <a name="contactsection"></a>

  
<section class="w-screen" >


<div style="background-image:url({{asset($about->image_path.'/'.$about->image_name)}})">

<section class="bg-white dark:bg-gray-900">
  <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
      <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">Contactanos</h2>
      <p class="mb-8 lg:mb-16 font-light text-center text-gray-500 dark:text-gray-400 sm:text-xl">Hacenos conocer tu inquietud</p>
      <form id="myForm" class="space-y-8">
          <div>
              <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">e-mail</label>
              <input  name="email"
          type="email" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"  required>
          </div>
          <div>
              <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Título</label>
              <input     name="name" type="text" id="subject" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"  required>
          </div>
          <div class="sm:col-span-2">
              <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Mensaje</label>
              <textarea           name="message" id="message" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" ></textarea>
          </div>
          <button type="submit" class="py-3 px-5 w-full text-sm font-medium text-center text-white rounded-lg bg-blue-300 sm:w-fit hover:bg-blue-400 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 hover:bg-blue-500 dark:focus:ring-primary-800">Enviar mensaje</button>
      </form>
  </div>
</section>


</div>


  </section>
  <!-- Section: Design Block -->

</div>
<!-- Container for demo purpose -->

     @include('layouts.footerPage',['conf'=>$conf])

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
var greenIcon = L.icon({
    iconUrl: "{{url('/public/images/iconomalvinas.ico')}}" ,
    
    iconSize:     [159, 120 ], // size of the icon
    shadowSize:   [50, 64], // size of the shadow
    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
    shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});
var southWest = L.latLng(-20.712, -77.227),
    northEast = L.latLng(-41.774,  -42.227),
    bounds = L.latLngBounds(southWest, northEast);
  
var mymap = L.map('mapid',{
  maxBounds: bounds,
  minZoom:7,
  maxZoom:12,
 
}).setView([-38.505, -62.09], 4);
mymap.setZoom(8);
L.marker([-52.7, -61.29], {icon: greenIcon}).addTo(mymap);
var app = @json($locations);
var aux = @json($asambleas);
    app.forEach(element=>{
      var display=`<h1>${element.name}</h1>`;
        var asambleas = aux.filter(asamblea=> asamblea.location_id == element.id);
        asambleas.forEach(asamblea=>
          display+= `
          <div>
          <a href="/asamblea/${asamblea.id}">
          <img alt="asamblea" src="${asamblea.image_path}/${asamblea.image_name}" />
          <span className="text-light">${asamblea.name}</span>
          </div>
          </a>
          `
          
        );
        var marker = L.marker([element.latitude,element.longitude]).addTo(mymap);
        marker.bindPopup(display);
        
    });
L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(mymap);
</script>

<script>
$('#myForm').on('submit', function(event) {
  const inputs = document.getElementById("myForm").elements;
    event.preventDefault(); // prevent reload
  let username = inputs[0].value;
  let email = inputs[1].value;
  let message = inputs[2].value;
    var formData = new FormData(this);
    formData.append('from_name',username);
    formData.append('message',message);
    formData.append('email',email);
    formData.append('service_id', 'service_9dgk7kn');
    formData.append('template_id', 'template_xkto9ir');
    formData.append('user_id', 'user_KRxr45LRpsTkhXElJp8Wx');
    
 
    $.ajax('https://api.emailjs.com/api/v1.0/email/send-form', {
        type: 'POST',
        data: formData,
        contentType: false, // auto-detection
        processData: false // no need to parse formData to string
    }).done(function() {
        alert('Tu mail fue enviado!');
    }).fail(function(error) {
        alert('Oops... ' + JSON.stringify(error));
    });
});
</script>
     

     </main>


</body>



</html>
