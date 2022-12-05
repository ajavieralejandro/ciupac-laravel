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
                    <form enctype="multipart/form-data" method="POST" action={{route('updateAsamblea')}}>
                    @csrf
                    @method('put')
                    <input type="hidden" name="asamblea_id" value="{{$asamblea->id}}"/>


                    <div class="m-4">
         
                <div class="flex justify-between mb-1">
  <span class="text-base font-medium text-blue-700 dark:text-white">Logo</span>
  <label class="inline-block mb-2 text-gray-500">Upload
                Image(jpg,png,svg,jpeg)</label>
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

                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Nombre <span class="text-red-500">*</span></label></br>
                            <input value={{$asamblea->name}} type="text" class="border-2 border-gray-300 p-2 w-full" name="name" id="title"  required>
                        </div>
     
<div class="mb-4">
                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Locacion : </label>
<select name="location_id" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    @foreach($locations as $location)
  <option {{ ($location->id == $asamblea->location_id ? "selected":"") }} value="{{$location->id}}">{{$location->name}}</option>
  @endforeach

</select>
                        </div>


                     
                        <div class="mb-8">
                            <label class="text-xl text-gray-600">descripcion <span class="text-red-500">*</span></label></br>
                            <textarea name="content" class="border-2 border-gray-500">
                                {{$asamblea->description}}
                            </textarea>
                        </div>

                        

                        <div class="flex p-1">
                        
                            <button type="submit" role="submit" class="p-3 bg-blue-500 text-white hover:bg-blue-400" required>Guardar Cambios</button>
                        </div>
                    </form>
                    


                </div>
            </div>
            <div class="mb-4 float-right">
            <a href={{route('showImagenAsamblea',['id'=>$asamblea->id])}}>
            <button class=" text-align-center bg-transparent rounded inline-flex items-center h-10 px-5 text-green-500 transition-colors duration-150  rounded-lg focus:shadow-outline hover:text-white hover:bg-green-800">
                
  <p class="float-right" >Agregar Imagen</p>
</button>
</a>
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