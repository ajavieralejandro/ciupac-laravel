@extends('layouts.app')
@section('content')

<div class="container mx-auto pt-5 flex flex-col justify-center items-center">
    
<!-- component -->
<div class="py-12">
    
    
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form enctype="multipart/form-data" method="POST" action={{route('storePortrait')}}>
                    @csrf
                    <div class="m-4">
                    <h1>Edita la sección de portada</h1>

            <label class="inline-block mb-2 text-gray-500">Upload
                Image(jpg,png,svg,jpeg)</label>
                <div class="flex justify-between mb-1">

</div>
<div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
  <div class="bg-blue-600 h-2.5 rounded-full" style="width: 0%"></div>
</div>
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
                    <input onchange="console()" type="file" name="image" id="image" class="opacity-0" />
                </label>
            </div>

            <div class="mb-4 pt-4">
                @if(!$portrait)
      <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
        Titulo
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="title" id="title" type="text" placeholder="Titulo">

    </div>
    @else
    <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
        Titulo
      </label>
      <input value="{{$portrait->title}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="title" id="title" type="text" placeholder="Titulo">

    </div>
    @endif

        
                        <div class="mb-8">
                            <label class="text-xl text-gray-600">Content <span class="text-red-500">*</span></label></br>
                            <textarea name="content" class="border-2 border-gray-500">
                                @if($portrait)
                                {!!$portrait->body!!}
                                @endif
                            </textarea>
                        </div>



                        

                        <div class="flex p-1">
                           
                            <button type="submit" role="submit" class="p-3 bg-gray-200 text-black hover:bg-gray-400" required>Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace( 'content' );
    </script>

    <script>
        function console(){}
    </script>
    

    

</div>

@endsection