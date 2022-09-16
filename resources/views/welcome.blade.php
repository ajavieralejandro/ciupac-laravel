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


<div class="flex flex-col">
    @if(Route::has('login'))
        <div class="absolute top-0 right-0 mt-4 mr-4 space-x-4 sm:mt-6 sm:mr-6 sm:space-x-6">
            @auth
                <a href="{{ url('/home') }}" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase">{{ __('Home') }}</a>
            @else
                <a href="{{ route('login') }}" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase">{{ __('Login') }}</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase">{{ __('Register') }}</a>
                @endif
            @endauth
        </div>
    @endif

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

<
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
</html>
