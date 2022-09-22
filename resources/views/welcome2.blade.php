<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
   integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
   crossorigin=""/>
   <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
   integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
   crossorigin=""></script>
</head>
<body class="smooth-scroll bg-gray-100 h-screen antialiased leading-none font-sans">
<!-- This example requires Tailwind CSS v2.0+ -->
<nav class="bg-gray-800">
  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
    <div class="relative flex h-16 items-center justify-between">
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <!-- Mobile menu button-->
        <button type="button" class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <!--
            Icon when menu is closed.

            Heroicon name: outline/bars-3

            Menu open: "hidden", Menu closed: "block"
          -->
          <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
          <!--
            Icon when menu is open.

            Heroicon name: outline/x-mark

            Menu open: "block", Menu closed: "hidden"
          -->
          <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
        <div class="flex flex-shrink-0 items-center">
          <img class="block h-8 w-auto lg:hidden" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
          <img class="hidden h-8 w-auto lg:block" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
        </div>
        <div class="hidden sm:ml-6 sm:block">
          <div class="flex space-x-4">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="#" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Dashboard</a>

            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Team</a>

            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Projects</a>

            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Calendar</a>
          </div>
        </div>
      </div>
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
        <button type="button" class="rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
          <span class="sr-only">View notifications</span>
          <!-- Heroicon name: outline/bell -->
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
          </svg>
        </button>

        <!-- Profile dropdown -->
        <div class="relative ml-3">
          <div>
            <button type="button" class="flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
              <span class="sr-only">Open user menu</span>
              <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
            </button>
          </div>

          <!--
            Dropdown menu, show/hide based on menu state.

            Entering: "transition ease-out duration-100"
              From: "transform opacity-0 scale-95"
              To: "transform opacity-100 scale-100"
            Leaving: "transition ease-in duration-75"
              From: "transform opacity-100 scale-100"
              To: "transform opacity-0 scale-95"
          -->
          <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
            <!-- Active: "bg-gray-100", Not Active: "" -->
            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Mobile menu, show/hide based on menu state. -->
  <div class="sm:hidden" id="mobile-menu">
    <div class="space-y-1 px-2 pt-2 pb-3">
      <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
      <a href="#" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Dashboard</a>

      <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Team</a>

      <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Projects</a>

      <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Calendar</a>
    </div>
  </div>
</nav>


    <div class="min-h-screen flex items-center justify-center">
        
        <div class="flex flex-col justify-around h-full">
            <div>
                <h1 class="mb-6 text-gray-600 text-center font-light tracking-wider text-4xl sm:mb-8 sm:text-6xl">
                    {{ config('app.name', 'Laravel') }}
                </h1>
                <ul class="flex flex-col space-y-2 sm:flex-row sm:flex-wrap sm:space-x-8 sm:space-y-0">
                    <li>
                        <a href="https://laravel.com/docs" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="Documentation">Documentation</a>
                    </li>
                    <li>
                        <a href="https://laracasts.com" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="Laracasts">Laracasts</a>
                    </li>
                    <li>
                        <a href="https://laravel-news.com" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="News">News</a>
                    </li>
                    <li>
                        <a href="https://nova.laravel.com" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="Nova">Nova</a>
                    </li>
                    <li>
                        <a href="https://forge.laravel.com" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="Forge">Forge</a>
                    </li>
                    <li>
                        <a href="https://vapor.laravel.com" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="Vapor">Vapor</a>
                    </li>
                    <li>
                        <a href="https://github.com/laravel/laravel" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="GitHub">GitHub</a>
                    </li>
                    <li>
                        <a href="https://tailwindcss.com" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="Tailwind Css">Tailwind CSS</a>
                    </li>
                </ul>
                
            </div>
            
        </div>
        
    </div>
    <img class="mix-blend-hard-light flex items-center justify-center h-screen m-auto mb-12 bg-fixed bg-center bg-cover"src="{{asset($image->path.'/'.$image->name)}}" alt="image description">

</div>
<div class="flex">
</div>  


<section class="bg-transparent dark:bg-gray-900 content-center">
  <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 ">
      <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
          <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Our Team</h2>
          <p class="font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">Explore the whole collection of open-source web components and elements built with the utility classes from Tailwind</p>
      </div> 
      <div class="m-auto grid  gap-6 md:grid-cols-2 lg:grid-cols-3 justify-center">

      @foreach($members as $member)
      <div class="max-w-sm  overflow-hidden ">
      <figure class="relative max-w-sm transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">

        <img class="w-1/2 " src="{{asset($member->image_path.'/'.$member->image_name)}}" alt="Sunset in the mountains">
</figure>
  <div class="px-6 py-4">
    <div class="font-bold text-xl mb-2">The Coldest Sunset</div>
    <p class="text-gray-700 text-base">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
    </p>
  </div>

</div>
       
          @endforeach
 
          </div> 
         
         
          </div>  
</section>
<div class="relative">
    <div class="sticky top-0 h-screen flex flex-col items-center justify-center bg-green-400">
        <h2 class="text-4xl">The First Title</h2>
        <p>Scroll Down</p>
    </div>
    <div class="sticky top-0 h-screen flex flex-col items-center justify-center bg-indigo-600 text-white">
        <h2 class="text-4xl">The Second Title</h2>
        <p>Scroll Down</p>
    </div>
    <div class="sticky top-0 h-screen flex flex-col items-center justify-center bg-purple-600 text-white">
        <h2 class="text-4xl">The Third Title</h2>
        <p>Scroll Down</p>
    </div>
    <div class="sticky top-0 h-screen flex flex-col items-center justify-center bg-neutral-800 text-white">
        <h2 class="text-4xl">The Fourth Title</h2>
    </div>
</div>

<!-- This is an example component -->
    <div class="sm:mb-10 lg:grid lg:grid-cols-5 md:grid-cols-none md:bg-gray-300 bg-gray-300 lg:bg-white lg:h-full">
      <div class=" px-10 py-10 max-w-md m-auto lg:col-span-2 mt-20 mb-20 shadow-xl rounded-xl lg:mt-10 md:shadow-xl md:rounded-xl lg:shadow-none lg:rounded-none lg:w-full lg:mb-10 lg:px-5 lg:pt-5 lg:pb-5 lg:max-w-lg bg-white">
        <img class="h-10" src="data:image/png;base64,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" alt="Workcation logo">
        <img class="h-64 sm:h-52 sm:w-full sm:object-cover lg:hidden object-center mt-2 rounded-lg shadow-2xl" src="{{asset($image->path.'/'.$image->name)}}" alt="Ad- woman on a beach">
        <h1 class="mt-5 font-bold text-lg lg:mt-7">You can school from home!</h1>
        <h1 class="font-bold text-lg text-gray-600">Get started today!</h1>
        <h1 class="text-lg text-gray-600 text-justify pt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h1>
        <button class="mt-5 bg-gray-600 p-3 shadow-2xl rounded-xl text-white font-bold hover:bg-gray-800">START STUDYING</button>
      </div>

      <div class="hidden relative lg:block  lg:col-span-3">
        <img class="absolute inset-0 w-full h-full object-cover object-center" src="{{asset($image->path.'/'.$image->name)}}" alt="Ad- woman on a beach">
      </div>
    </div>




<!-- ====== Brands Section Start -->
<section class="bg-white py-20 lg:py-[120px]">
   <div class="container m-auto">
      <div class="flex flex-wrap -mx-4">
         <div class="w-full px-4">
            <div class="flex flex-wrap justify-center items-center">
                @foreach($logos as $logo)
                <a
                  href="javascript:void(0)"
                  class="
                 
                  py-5
                  flex
                  items-center
                  justify-center
                  mx-4
                  "
                  >
               <img
               src="{{asset($logo->image_path.'/'.$logo->image_name)}}"
                  alt="image"
                  class="w-full "
                  />
               </a>
                @endforeach
               <a
                  href="javascript:void(0)"
                  class="
                  w-[150px]
                  2xl:w-[180px]
                  py-5
                  flex
                  items-center
                  justify-center
                  mx-4
                  "
                  >
               <img
                  src="https://cdn.tailgrids.com/1.0/assets/images/brands/graygrids.svg"
                  alt="image"
                  class="w-full h-10"
                  />
               </a>
               <a
                  href="javascript:void(0)"
                  class="
                  w-[150px]
                  2xl:w-[180px]
                  py-5
                  flex
                  items-center
                  justify-center
                  mx-4
                  "
                  >
               <img
                  src="https://cdn.tailgrids.com/1.0/assets/images/brands/lineicons.svg"
                  alt="image"
                  class="w-full h-10"
                  />
               </a>
               <a
                  href="javascript:void(0)"
                  class="
                  w-[150px]
                  2xl:w-[180px]
                  py-5
                  flex
                  items-center
                  justify-center
                  mx-4
                  "
                  >
               <img
                  src="https://cdn.tailgrids.com/1.0/assets/images/brands/uideck.svg"
                  alt="image"
                  class="w-full h-10"
                  />
               </a>
               <a
                  href="javascript:void(0)"
                  class="
                  w-[150px]
                  2xl:w-[180px]
                  py-5
                  flex
                  items-center
                  justify-center
                  mx-4
                  "
                  >
               <img
                  src="https://cdn.tailgrids.com/1.0/assets/images/brands/ayroui.svg"
                  alt="image"
                  class="w-full h-10"
                  />
               </a>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- ====== Brands Section End -->



</body>
<script>
    const button = document.querySelector('#menu-button');
const menu = document.querySelector('#menu');


button.addEventListener('click', () => {
  menu.classList.toggle('hidden');
});

</script>
</html>
