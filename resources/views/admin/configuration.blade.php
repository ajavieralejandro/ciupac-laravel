@extends('layouts.app')
@section('content')
<div class="flex justify-center mt-8">
    
<div class="w-full max-w-xs">
    
  <form enctype="multipart/form-data" action={{route('setConfig')}} method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
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
      <label class="block text-gray-700 text-sm font-bold mb-2" for="facebook">
        facebook-link
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="facebook" id="name" type="text" >
    </div>
    <div class="mb-4 pt-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="instagram">
        Instagram-link
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="instagram" id="name" type="text" >
    </div>
    <div class="mb-6">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
        email
      </label>
      <input name="email" class="shadow appearance-none border  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" type="text" >
    </div>
    <div class="mb-6">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="address">
        Direccion
      </label>
      <input name="address" class="shadow appearance-none border  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" type="text" >
    </div>
    <div class="mb-6">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="tel">
        Telefono
      </label>
      <input name="tel" class="shadow appearance-none border  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" type="text" >
    </div>
    <div class="mb-4">
                            <div class="flex items-center mb-4">
    <input id="default-checkbox" name="visible" type="checkbox"   checked class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Visible</label>
</div>                        </div>
        
  
    <div class="flex justify-center pt-5">
    <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center" type="submit">
    Guardar</button>
    </div>

    

    
    
  </form>

</div>
</div>

@endsection