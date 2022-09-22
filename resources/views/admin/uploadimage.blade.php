@extends('layouts.app')
@section('content')

<div class="flex items-center justify-left p-3">

<a href={{route('admin') }} >
<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
</a>
</div>
<form enctype="multipart/form-data" action={{route('uploadImage')}} method="POST">
@csrf



<div class="flex justify-center mt-8">
    
    
    <div class="rounded-lg shadow-xl bg-gray-50 lg:w-1/2">
        <div class="m-4">
            
            <label class="inline-block mb-2 text-gray-500">Upload
                Image(jpg,png,svg,jpeg)</label>
            <div class="flex items-center justify-center w-full">
                <label class="flex flex-col w-full h-32 border-4 border-dashed hover:bg-gray-100 hover:border-gray-300">
                    <div class="flex flex-col items-center justify-center pt-7">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-12 h-12 text-gray-400 group-hover:text-gray-600" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                clip-rule="evenodd" />
                        </svg>
                        <p class="pt-1 text-sm tracking-wider text-gray-400 group-hover:text-gray-600">
                            Select a photo</p>
                    </div>
                    <input type="file" name="image" id="image" class="opacity-0" />
                </label>
            </div>
        </div>
     
    </div>
</div>
<div class="container mx-auto pt-5 flex flex-col justify-center items-center">
<button type="submite" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
        Cargar Imagen
      </button>
</div>
</form>

@endsection