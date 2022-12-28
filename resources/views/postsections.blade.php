@extends('layouts.homelayout')
@section('content')
<div class="container">
<main class="pt-20 w-screen  font-serif flex items-center justify-center  flex-wrap">
<!-- component -->

@foreach($posts as $post)
<div class="max-w-sm w-screen lg:max-w-full lg:flex pt-10">
  <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden"style="background-image: url({{asset($post->image_path.'/'.$post->image_name)}})" title="Woman holding a mug">
  </div>
  <div class=" w-full  border-b border-gray-400 lg:border-l-0 lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
    <div class="mb-4">
    
      <div class="text-gray-900 font-bold text-xl mb-2">{{$post->title}}</div>
      <p class="text-gray-700 text-base">{{$post->description}}</p>

      <p class="text-gray-700 text-base">{!! substr($post->body, 0,  200) !!}...</p>
    </div>
    <div class="flex items-center">
      <div class="text-sm">
      <a class="hover:text-green-500" href="{{route('showPost', ['id' => $post->id]);}}">Leer más...</a>
<p>{{$post->created_at->format('d-m-Y')}}</p>

      </div>
    </div>
  </div>
</div>
@endforeach

</main>
<!-- main ends here -->
{{$posts->links()}}

@include('layouts.footerPage')


<!-- footer -->


</div>

@endsection