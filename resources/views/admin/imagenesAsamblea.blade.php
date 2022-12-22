@extends('layouts.app')
@section('content')


<div class="container mx-auto px-20 pb-10">


<div class="flex flex-col mt-8">
  
    <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
        <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th>
                            Imagen
                        </th>
                     
                        <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Delete</th>
                    </tr>
                </thead>

                <tbody class="bg-white">
                    @foreach($imagenes as $imagen)
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 w-10 h-10">
                                    <img class="w-10 h-10 rounded-full"  src="{{asset($imagen->image_path.'/'.$imagen->image_name)}}"
                                        alt="admin dashboard ui">
                                </div>

                            
                            </div>
                        </td>

                        

                   
                        <td
                            class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                            <form method="POST" action="{{route('deleteImagenAsamblea')}}">
                            @csrf
                            @method('delete')

                            <input type="hidden" name="asamblea_id" value="{{$asamblea->id}}"/>
                            <input type="hidden" name="imagen_id" value="{{$imagen->id}}"/>

                            <button type="submit" class="   focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400  hover:text-green-700" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                         <span class="sr-only">Icon description</span>
  
                        </button>  
                        </form>                       
                        </td>
                    </tr>
                    @endforeach
                 
                </tbody>
            </table>
            <a href={{route('createImagenAsamblea',['id'=>$asamblea->id])}}>
            <button class="w-full bg-transparent rounded inline-flex items-center h-10 px-5 text-green-500 transition-colors duration-150  rounded-lg focus:shadow-outline hover:text-white hover:bg-green-800">
                
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
</svg>
  <span class="pl-4">Agregar Imagen</span>
</button>
</a>
        </div>
    </div>
</div>

</div>
@endsection