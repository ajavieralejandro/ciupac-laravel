<html lang="en" >

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ciupac</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">
    
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" rel="stylesheet"/>

<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>

<!-- jQuery, vinculado directo a cdn de google -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

<style>

#mapid { height: 900px; width:100%; }

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
        html, body {
    margin: 0px;
    padding: 0px;
    background: url("http://digital.bnint.com/filelib/s9/photos/white_wood_4500x3000_lo_res.jpg");
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


    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</head>
</head>

<body class="scroll-smooth">
    <header>
    <nav class="  px-4 py-4 flex justify-between items-center bg-white shadow-md w-full
            fixed top-0 left-0 right-0 z-10">
		<a class="text-3xl font-bold leading-none" href="#">
    <img  src="{{asset('/public/images/ciupac.ico')}}"  />

		</a>
		<div class="lg:hidden">
			<button class="navbar-burger  flex items-center text-blue-600 p-3">
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
			<li><a class="text-sm text-gray-400 hover:text-gray-500 font-bold" 		href="{{route('welcome').'/#contactsection'}}">
Contacto</a></li>
		</ul>
	
	</nav>

	<div class="navbar-menu relative z-50 hidden">
		<div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
		<nav class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
			<div class="flex items-center mb-8">
				<a class="mr-auto text-3xl font-bold leading-none" href="#">
        <img class="float-right" src="{{asset('/public/images/ciupac.ico')}}"  />

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
					<span>Copyright © 2021</span>
				</p>
			</div>
		</nav>  </header>
  <main class="h-screen w-screen py-6 font-serif flex items-center justify-center  flex-wrap">
   <div>

   


    
   <section class="container  mx-auto p-10 py-20 px-0 :p-10 md:px-0">
        <section class="relative px-10 md:p-0 transform duration-500 hover:shadow-2xl cursor-pointer hover:-translate-y-1 ">
        <img class="xl:max-w-6xl" src="{{asset($portrait->image_path.'/'.$portrait->image_name)}}" alt="">
            <div class="group-hover:scale-100 content bg-white p-2 pt-8 md:p-12 pb-12 lg:max-w-lg w-full lg:absolute top-48 right-5">
                <div class="flex justify-between font-bold text-sm">
                 
                </div>
         
                <img class="float-right w-1/2" src="{{asset('/public/images/Ciupac.jpeg')}}"  />

                <h2 class="text-3xl font-semibold mt-4 md:mt-10">{{$portrait->title}}</h2>
    
                {!!$portrait->body!!}
   
            </div>
        </section>
    </section>
        </div>


       <!-- Posts Section  <div class="container mx-auto px-20">
 -->
 <a name="news"></a>
 <div class="container mx-auto flex flex-wrap">
<h1>Noticias</h1>
@foreach($posts as $post)
@if ($loop->first)

 <article class="p-10 w-screen  rounded-xl text-gray-100  bg-center bg-cover transform duration-500 hover:-translate-y-1 cursor-pointer" style="background-image: url({{asset($post->image_path.'/'.$post->image_name)}})">
             <h1 class="opacity-80 bg-black w-1/2 mt-5 text-4xl text-white leading-snug  min-h-33">{{$post->title}}
             <h1 class="opacity-80  bg-black w-1/2 text-4xl text-white leading-snug  min-h-33">{{$post->description}}

             </h1>
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
<a name="news"></a>

 <div class="container mx-auto flex flex-wrap">


 <section class="container  p-10 md:py-20 px-0 md:p-10 md:px-0">
 <section class="p-5 md:p-0 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-10">
         
<div class="p-4 m-auto grid">

 </div>

     </section>



<div class="p-4 m-auto grid grid-cols-1 gap-1 md:grid-cols-3">
  

@foreach($posts as $post)
@if (!$loop->first)

<div class="max-w-lg mx-auto ">

<div class="transform duration-300 hover:-translate-y-1 cursor-pointer  hover:shadow-2xl  bg-white  rounded-lg max-w-sm mb-5">
<a href="{{route('showPost', ['id' => $post->id]);}}">
  
        <img class="rounded-t-lg h-48 w-96 " src="{{asset($post->image_path.'/'.$post->image_name)}}" alt="">
    </a>
    <div class="p-5">
        <a href="#">
            <h5 class="text-gray-900 font-bold text-2xl tracking-tight mb-2">{{$post->title}}</h5>
        </a>
        <p class="font-normal text-gray-700 mb-3">{{$post->description}}</p>
        <a class="hover:text-green-500" href="{{route('showPost', ['id' => $post->id]);}}">Leer más...</a>
<p>{{$post->created_at->format('d-m-Y')}}</p>

    </div>

</div>

</div>
@endif

    @endforeach


  
</div>
<a name="about"></a>

<section class="pt-40 pb-32 relative">
  
<div class="absolute w-full h-full top-0 left-0 bg-cover bg-center bg-no-repeat opacity-80 bg-fixed" style="background-image:url({{asset($about->image_path.'/'.$about->image_name)}})"></div>
</section>

    </section>
    


<!-- Posts Section -->


<section class="w-full grid md:w-2/3 flex flex-col items-center ">

<section class="h-[200px] "></section>



<div class=" lg:px-0  text-gray-700 max-w-screen-md mx-auto text-lg leading-relaxed" >



<h2 class=" text-3xl font-semibold ">Nosotros </h2>

      {!!$about->body!!}

   
  
      </div>



    

  

</section>

<aside class=" py-2 bw-full text-center md:w-1/3 container gap-3 max-w-sm flex flex-col items-center px-3">
<article class="text-left flex flex-col   mx-auto  max-h-sm  px-12 transform duration-500 hover:-translate-y-2 cursor-pointer  rounded-md">
                <h1 class="mt-0 text-3xl text-black leading-snug  min-h-33">Archivos de Interes 
             </h1>
             <ul class="mt-10 ">
               @foreach($articles as $article)
               <a href="{{$article->path}}">
               <li class="hover:text-green-500 text-black">
       
               <svg class="inline-block w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg> {{$article->name}}
                 </li>
               </a>
               @endforeach
             </ul>
            </article>



</div>


</aside>







<article class="flex flex-col  mx-auto  h-screen py-20  transform duration-500 hover:-translate-y-2 cursor-pointer  rounded-md">
<h2 class="font-bold mb-5 text-gray-800">Localidades</h2>
<div id="mapid"></div>

                <p class="text-sm p-10 leading-relaxed text-gray-700">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Id beatae repellendus nam! Dolor dignissimos unde, dolore laboriosam atque numquam quam.
                </p>
             
            </article>


<div class="container mx-auto">


 

 
<div class="pt-10">
  
<div class="  px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">

  <div class="max-w-xl mb-10 md:mx-auto sm:text-center lg:max-w-2xl md:mb-12">
    <div>
      
    </div>
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
  <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-4">
    @foreach($members as $member)
    <div>
      <div class="relative overflow-hidden transition duration-300 transform rounded-lg shadow-lg lg:hover:-translate-y-2 hover:shadow-2xl">
        <img class="object-cover w-full h-56 md:h-64 xl:h-80"        src="{{asset($member->image_path.'/'.$member->image_name)}}"
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
  <section class="mb-32 text-gray-800 text-center">
    <style>
      .grayscale {
        filter: grayscale(100%);
      }
      .custom-img {
  background-image: url({{asset($about->image_path.'/'.$about->image_name)}});
  background-size: contain;
  background-repeat: no-repeat;


}
    </style>
    <h2 class="text-3xl font-bold mb-12">instituciones contrapartes </h2>

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

  </section>

  
  <a name="contactsection"></a>

  
<section >


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
              <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Subject</label>
              <input     name="name" type="text" id="subject" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"  required>
          </div>
          <div class="sm:col-span-2">
              <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Your message</label>
              <textarea           name="message" id="message" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" ></textarea>
          </div>
          <button type="submit" class="py-3 px-5 w-full text-sm font-medium text-center text-white rounded-lg bg-green-400 sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 hover:bg-green-700 dark:focus:ring-primary-800">Enviar mensaje</button>
      </form>
  </div>
</section>


</div>


  </section>
  <!-- Section: Design Block -->

</div>
<!-- Container for demo purpose -->

     @include('layouts.footerPage',['conf'=>$conf])
     

</main>


</body>


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
  minZoom:6,
  maxZoom:7
 
}).setView([-38.505, -62.09], 4);

L.marker([-52.7, -61.29], {icon: greenIcon}).addTo(mymap);

var app = @json($locations);
var aux = @json($asambleas);
    app.forEach(element=>{
      var display=`<h1>${element.name}</h1>`;

        var asambleas = aux.filter(asamblea=> asamblea.location_id == element.id);
        asambleas.forEach(asamblea=>

          display+= `
          <div class="overflor-scroll">
          <a href="/asamblea/${asamblea.id}">
          <img src="${asamblea.image_path}/${asamblea.image_name}" />
          <span className="text-light">${asamblea.name}</span>
          </div>
          </a>
          `
          
        );
        var marker = L.marker([element.latitude,element.longitude]).addTo(mymap);
        marker.bindPopup(display).openPopup();
        

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
        alert('Your mail is sent!');
    }).fail(function(error) {
        alert('Oops... ' + JSON.stringify(error));
    });
});

</script>

</html>