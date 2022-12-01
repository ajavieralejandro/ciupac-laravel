@extends('layouts.homelayout')
@section('content')
  
    <!-- header ends here -->

    <main class="mt-10 container py-20 ">
      <div class="grid md:grid-cols-2 grid-cols-1 gap-2 pt-10 mb-20">
        <div>
        <article class="mx-auto max-w-sm pb-8 bg-cover bg-center cursor-pointer transform duration-500 hover:-translate-y-1 shadow-2xl rounded-xl">
                <img class="mx-auto mb-4 p-5  w-80  " src="{{asset($asamblea->image_path.'/'.$asamblea->image_name)}}" alt="" />
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
            @foreach($images as $image)
    <div class="w-full">
        <img  src="{{asset($image->image_path.'/'.$image->image_name)}}"
            alt="image">
    </div>
    @endforeach

        </div>
        {{$images->links()}}

      </div>

        

      
      
    </main>

    <!-- main ends here -->

    <!-- footer -->

   
  </div>
  @include('layouts.footerPage')

  
@endsection

