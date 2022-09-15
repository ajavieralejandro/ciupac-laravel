@extends('layouts.app')
@section('content')


<div class="container mx-auto px-20">

<div>
  <div class="grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-4 pt-20 pb-10 lg:pt-40 lg:pb-20" style="cursor: auto;">
            
  <div class="p-6 bg-gray-100 rounded-lg">
              
    <div class="mb-5">
    <a href={{route('team')}} rel='stylesheet'>

    <svg class="hover:text-green-500 h-8 w-8 text-red-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
</svg>
</a>

              
    </div>
              
    <h3 class="text-lg font-bold mb-2">
                1. Product
              </h3>
              
    <p class="text-sm leading-6 text-gray-600">
Metus potenti velit sollicitudin porttitor magnis elit lacinia tempor varius, ut cras orci vitae parturient id nisi vulputate consectetur, primis venenatis cursus tristique malesuada viverra congue risus.
              </p>
              
            
  </div>
            
  <div class="p-6 bg-gray-100 rounded-lg">
              
    <div class="mb-5">
    <a href={{route('uploadImage')}} rel='stylesheet'>
               
    <svg class="hover:text-green-500 h-8 w-8 text-red-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />  <circle cx="8.5" cy="8.5" r="1.5" />  <polyline points="21 15 16 10 5 21" /></svg>
</a>       
    </div>
              
    <h3 class="text-lg font-bold mb-2">
                2. Features
              </h3>
              
    <p class="text-sm leading-6 text-gray-600">
Metus potenti velit sollicitudin porttitor magnis elit lacinia tempor varius, ut cras orci vitae parturient id nisi vulputate consectetur, primis venenatis cursus tristique malesuada viverra congue risus.
              </p>
            
  </div>
            
  <div class="p-6 bg-gray-100 rounded-lg" style="cursor: auto;">
              
    <div class="mb-5" style="cursor: auto;">
    <a href={{route('locations')}} rel='stylesheet'>
     
    <svg class="h-8 w-8 text-red-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
</svg>
</a>
              
    </div>
              
    <h3 class="text-lg font-bold mb-2">
                3. Card
              </h3>
              
    <p class="text-sm leading-6 text-gray-600">
Metus potenti velit sollicitudin porttitor magnis elit lacinia tempor varius, ut cras orci vitae parturient id nisi vulputate consectetur, primis venenatis cursus tristique malesuada viverra congue risus.
              </p>
            
  </div>
            
  <div class="p-6 bg-gray-100 rounded-lg">
              
    <div class="mb-5">
                
    <svg class="h-8 w-8 text-red-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
</svg>


    </div>
              
    <h3 class="text-lg font-bold mb-2">
                4. Design
              </h3>
              
    <p class="text-sm leading-6 text-gray-600">
Metus potenti velit sollicitudin porttitor magnis elit lacinia tempor varius, ut cras orci vitae parturient id nisi vulputate consectetur, primis venenatis cursus tristique malesuada viverra congue risus.
              </p>
            
  </div>
          
</div>
</div>
</div>
@endsection