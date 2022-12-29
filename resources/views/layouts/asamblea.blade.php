@extends('layouts.homelayout')
@section('content')
  
    <!-- header ends here -->

    <main class="mt-10 container py-20 ">


 

      <div class="grid md:grid-cols-2 grid-cols-1  gap-2 pt-10 mb-20">
        <div class="grid place-items-center">
        <article class="p-10 min-h-116 max-w-xl w-full bg-blue-100 rounded-xl text-black transform duration-500 hover:-translate-y-1 cursor-pointer">

                <h1 class="mt-5 text-3xl text-black-100 leading-snug  min-h-33">{{$asamblea->name}} </h1>
                <img class="mx-auto p-5"  src="{{asset($asamblea->image_path.'/'.$asamblea->image_name)}}" alt="">

                <div class="mt-20">
                    <span class="text-xl">Ubicación :  </span>
                    <span class="font-bold text-xl">{{$asamblea->location->name}}</span>
                </div>
               
            </article>

           
<div class="max-w-lg m-auto">

  <p class="mb-4">
    
  {!!$asamblea->description!!}
  </p>
 
</div>
          
        </div>
        
        <div >
        <div class="container grid grid-cols-1 md:grid-cols-3 gap-2 mx-auto">
            @foreach($images as $image)
    <div class="w-full">
        <img  onclick="openModal({{$image}})"  src="{{asset($image->image_path.'/'.$image->image_name)}}"
            alt="image">
    </div>
    @endforeach

        </div>
        {{$images->links()}}
        

      </div>

        

      
      
    </main>

    <!-- main ends here -->

    <!-- footer -->
    
    <div id="modal"  class="relative z-10 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <!--
    Background backdrop, show/hide based on modal state.

    Entering: "ease-out duration-300"
      From: "opacity-0"
      To: "opacity-100"
    Leaving: "ease-in duration-200"
      From: "opacity-100"
      To: "opacity-0"
  -->
  <div class="  fixed inset-0  bg-gray-500 bg-opacity-75 transition-opacity"></div>

  <div class="fixed inset-0 z-10 overflow-y-auto">
    <div class="flex  justify-center p-4 text-center sm:items-center sm:p-0">
      <!--
        Modal panel, show/hide based on modal state.

        Entering: "ease-out duration-300"
          From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          To: "opacity-100 translate-y-0 sm:scale-100"  
        Leaving: ""
          From: "opacity-100 translate-y-0 sm:scale-100"
          To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
      -->
      <div class=" relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all ">
      <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
      <button onclick="closeModal()" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
  <span class="sr-only">Icon description</span>
</button></div>
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
              <!-- Heroicon name: outline/exclamation-triangle -->
              <img style="width: 100%;height:auto;" id="img" />
           
        </div>
   
      </div>
    </div>

  </div>
</div>

<script>
  var modal = document.getElementById("modal");
  function closeModal() {
    modal.style.display = "none";
  }  

  function openModal(image){
    console.log(image);
    var img = document.getElementById("img");
    var aux = image.image_path+'/'+image.image_name;
    var path = "{{asset('public/images/imagenasamblea')}}";
    img.src = path+'/'+image.image_name;
    modal.style.display = "block";

  }

</script>
   
  </div>
  @include('layouts.footerPage')

  
@endsection

