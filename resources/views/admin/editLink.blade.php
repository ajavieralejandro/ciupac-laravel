@extends('layouts.app')
@section('content')
<div class="flex justify-center mt-8">
<div class="w-full max-w-xs">

  <form enctype="multipart/form-data" action={{route('storeLink')}} method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    @csrf

  <div class="m-4">
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        
    <div class="mb-4 pt-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
        name
      </label>
      <input value="{{$link->name}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="name" id="name" type="text" >
    </div>
    <div class="mb-6">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
        Link
      </label>
      <input value="{{$link->link}}" name="link" class="shadow appearance-none border  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" type="text" >
    </div>
    

  
    <div class="flex justify-center pt-5">
    <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center" type="submit">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>Agregar Link</button>
    </div>

    

    
    
  </form>

</div>
</div>

@endsection