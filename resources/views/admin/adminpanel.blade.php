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
                1. Equipo
              </h3>
              
    <p class="text-sm leading-6 text-gray-600">
      Crea, edita o elimina miembros del equipo. 
              </p>
              
            
  </div>

  
            
  <div class="p-6 bg-gray-100 rounded-lg">
              
    <div class="mb-5">
    <a href={{route('uploadImage')}} rel='stylesheet'>
               
    <svg class="hover:text-green-500 h-8 w-8 text-red-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />  <circle cx="8.5" cy="8.5" r="1.5" />  <polyline points="21 15 16 10 5 21" /></svg>
</a>       
    </div>
              
    <h3 class="text-lg font-bold mb-2">
                2. Portada
              </h3>
              
    <p class="text-sm leading-6 text-gray-600">
Actualiza la imagen de portada a la página              </p>
            
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
                3. Locaciones
              </h3>
              
    <p class="text-sm leading-6 text-gray-600">
      Agrega, edita o elimina una locación. 
              </p>
            
  </div>
            
  <div class="p-6 bg-gray-100 rounded-lg">
              
    <div class="mb-5">
    <a href={{route('logos')}} rel='stylesheet'>

                
    <svg class="h-8 w-8 text-red-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
</svg>
</a>


    </div>
    
              
    <h3 class="text-lg font-bold mb-2">
                4. Logos
              </h3>
              
    <p class="text-sm leading-6 text-gray-600">
      Agrega, edita o elimina logos. 
              </p>
              
            
  </div>

            
  <div class="p-6 bg-gray-100 rounded-lg">
              
    <div class="mb-5">
    <a href={{route('showAbout')}} rel='stylesheet'>

                
    <svg class="hover:text-green-500 h-8 w-8 text-red-500"  fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
</svg>
</a>


    </div>
    
              
    <h3 class="text-lg font-bold mb-2">
                5. About
              </h3>
              
    <p class="text-sm leading-6 text-gray-600">
      Modifica la imágen y el texto de la sección about.  
              </p>
              
            
  </div>

            
  <div class="p-6 bg-gray-100 rounded-lg">
              
    <div class="mb-5">
    <a href={{route('showArticles')}} rel='stylesheet'>

                
    <svg class="w-8 h-8 text-red-500 hover:text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
</svg>
</a>


    </div>
    
              
    <h3 class="text-lg font-bold mb-2">
                6. Articulos
              </h3>
              
    <p class="text-sm leading-6 text-gray-600">
      Agrega, edita o elimina los archivos pdf. 
              </p>
              
            
  </div>

            
  <div class="p-6 bg-gray-100 rounded-lg">
              
    <div class="mb-5">
    <a href={{route('logos')}} rel='stylesheet'>

                
    <svg class="h-8 w-8 text-red-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
</svg>
</a>


    </div>
    
              
    <h3 class="text-lg font-bold mb-2">
                4. Logos
              </h3>
              
    <p class="text-sm leading-6 text-gray-600">
      Agrega, edita o elimina logos. 
              </p>
              
            
  </div>

            
<div class="p-6 bg-gray-100 rounded-lg">
              
              <div class="mb-5">
              <a href={{route('posts')}} rel='stylesheet'>
          
                          
              <svg class="h-8 w-8 text-red-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
          </svg>
          </a>
          
          
              </div>
              
                        
              <h3 class="text-lg font-bold mb-2">
                          4. Posts
                        </h3>
                        
              <p class="text-sm leading-6 text-gray-600">
                Agrega, edita o elimina noticias. 
                        </p>
                        
                      
            </div>

            

            
                    
          </div>
          
</div>


</div>





          
          

          

          </div>

</div>

@endsection