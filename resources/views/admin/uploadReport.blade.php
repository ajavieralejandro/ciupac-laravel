@extends('layouts.app')
@section('content')
<div class="flex justify-center mt-8">
    <div class="w-full max-w-xs">
        <form enctype="multipart/form-data" action={{ route('storeArticle') }} method="POST"
            class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf


            <div class="m-4">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <label class="inline-block mb-2 text-gray-500">Reporte
                    pdf </label>
                <div class="flex items-center justify-center w-full">
                    <label
                        class="flex flex-col w-full h-32 border-4 border-dashed hover:bg-gray-100 hover:border-gray-300">
                        <div class="flex flex-col items-center justify-center pt-7">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                                </path>
                            </svg>
                            <p class="pt-1 text-sm tracking-wider text-gray-400 group-hover:text-gray-600">
                                documento pdf</p>
                        </div>
                        <input type="file" name="document" id="document" class="opacity-0" />
                    </label>
                </div>
                <div class="mb-4 pt-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                        Título
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        name="name" id="name" type="text" placeholder="Username">
                </div>

                <button
                    class="bg-gray-300 w-full hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center"
                    type="submit">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>Agregar artículo</button>
            </div>






        </form>

    </div>
</div>

@endsection
