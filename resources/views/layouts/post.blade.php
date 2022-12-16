@extends('layouts.homelayout')
@section('content')
  
    <!-- header ends here -->

    <main class="pt-20 w-screen  font-serif flex items-center justify-center  flex-wrap">
      

      <div class=" w-full max-w-screen-md mx-auto relative" style="height: 24em;">
        <div class="absolute left-0 bottom-0 w-full h-full "
          style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.7));"></div>
        <img src="{{asset($post->image_path.'/'.$post->image_name)}}" class="absolute left-0 top-0 w-full h-full z-0 object-cover" />
        <div class="p-4 absolute bottom-0 left-0">
          <div 
            class="px-4 py-1 bg-black text-gray-200 inline-flex items-center justify-center ">
            <h2 class="text-4xl font-semibold text-gray-100 leading-tight">
            {{$post->title}}
          </h2>
</div>
         
          <div class="flex mt-1 bg-black text-white">

             
              <p class="font-semibold   text-xs">{{$post->created_at->format('d-m-Y')}} </p>
            </div>
          </div>
          
        </div>
        
     
      </div>

      <div class="text-gray-700 max-w-screen-md mx-auto text-lg leading-relaxed">
     {!!$post->body!!}

      </div>
      

    

      @include('layouts.footerPage')

      
      
    </main>
    <!-- main ends here -->
    

    <!-- footer -->
    
   
  </div>
  
@endsection