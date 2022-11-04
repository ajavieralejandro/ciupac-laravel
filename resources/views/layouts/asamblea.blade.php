@extends('layouts.homelayout')
@section('content')
<div class="max-w-screen-xl mx-auto py-5">
  
    <!-- header ends here -->

    <main class="mt-10 container ">
      <div class="grid md:grid-cols-2 grid-cols-1 pt-10 mb-20">
        <div>
        <article class="mx-auto max-w-sm pb-8 bg-cover bg-center cursor-pointer transform duration-500 hover:-translate-y-1 shadow-2xl rounded-xl">
                <img class="mx-auto mb-4 p-5  w-40 rounded-full " src="{{asset($asamblea->image_path.'/'.$asamblea->image_name)}}" alt="" />
                <h2 class="text-center text-3xl  font-bold min-h-18 ">
                    {{$asamblea->name}}
                </h2>
                <div class="text-center">
                    {!!$asamblea->description!!}
                    </div>
            </article>
        </div>
        <div>
        <div class="container grid grid-cols-1 md:grid-cols-3 gap-2 mx-auto">
    <div class="w-full rounded">
        <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=989&q=80"
            alt="image">
    </div>
    <div class="w-full rounded">
        <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=989&q=80"
            alt="image">
    </div>
    <div class="w-full rounded">
        <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=989&q=80"
            alt="image">
    </div>
    <div class="w-full rounded">
        <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=989&q=80"
            alt="image">
    </div>
    <div class="w-full rounded">
        <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=989&q=80"
            alt="image">
    </div>
    <div class="w-full rounded">
        <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=989&q=80"
            alt="image">
    </div>
</div>
        </div>

      </div>

        
      @include('layouts.footerPage')

      
      
    </main>
    <!-- main ends here -->
    

    <!-- footer -->
    
   
  </div>
  
@endsection

