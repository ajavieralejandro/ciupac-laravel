@extends('layouts.app')
@section('content')


<div class="container mx-auto px-20 pb-10">
    <a href="{{ route('stations') }}
" class="inline-flex items-center px-6 py-3 text-gray-500 bg-gray-100 rounded-md hover:bg-gray-200 hover:text-gray-600">
        Atras
    </a>

    <div class="flex flex-col mt-8">


        @if(session('message'))
            <div class="pb-8">
                <div id="errorMessage" class=" bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                    role="alert">
                    <strong class="font-bold">No hay registros!</strong>
                    <span class="block sm:inline">Pruebe ingresar otro rango de fechas</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg onclick="add();" class="fill-current h-6 w-6 text-red-500" role="button"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <title>Close</title>
                            <path
                                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                        </svg>
                    </span>
                </div>
            </div>
        @endif

        <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">

            <div
                class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Name</th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Wind
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Temperature</th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Dew Point</th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                UVI</th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Time</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white">
                        @foreach($registers as $register)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="flex items-center">


                                        <div class="ml-4">
                                            <div class="text-sm font-medium leading-5 text-gray-900">
                                                {{ $register->name }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="flex items-center">


                                        <div class="ml-4">
                                            <div class="text-sm font-medium leading-5 text-gray-900">
                                                {{ $register->wind }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="flex items-center">


                                        <div class="ml-4">
                                            <div class="text-sm font-medium leading-5 text-gray-900">
                                                {{ $register->temperature }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="flex items-center">


                                        <div class="ml-4">
                                            <div class="text-sm font-medium leading-5 text-gray-900">
                                                {{ $register->dew_point }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="flex items-center">


                                        <div class="ml-4">
                                            <div class="text-sm font-medium leading-5 text-gray-900">
                                                {{ $register->uvi }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="flex items-center">


                                        <div class="ml-4">
                                            <div class="text-sm font-medium leading-5 text-gray-900">
                                                {{ $register->created_at }}
                                            </div>
                                        </div>
                                    </div>
                                </td>



                            </tr>

                        @endforeach



                    </tbody>

                </table>


            </div>


            <div class="grid p-12 place-items-center">
                {{ $registers->links() }}
            </div>
            <div class="grid p-12 place-items-center">

                <button
                    class="bg-green-500 text-white active:bg-pink-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150 inline-flex"
                    type="button" onclick="toggleModal('modal-id')">

                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z" /></svg>

                    Descargar Registros
                </button>
            </div>
            <form enctype="multipart/form-data" method="POST"
                action={{ route('reportRegistersStation') }}>
                @csrf
                <input name="mac" type="hidden" value={{ $mac }}>

                <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center"
                    id="modal-id">
                    <div class="relative w-auto my-6 mx-auto max-w-3xl">
                        <!--content-->
                        <div
                            class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                            <!--header-->
                            <div
                                class="flex items-start justify-between p-5 border-b border-solid border-slate-200 rounded-t">
                                <h3 class="text-3xl font-semibold">
                                    Generar Reportes
                                </h3>
                                <button
                                    class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none"
                                    onclick="toggleModal('modal-id')">
                                    <span
                                        class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
                                        ×
                                    </span>
                                </button>
                            </div>
                            <!--body-->

                            <div class="relative p-6 flex-auto">
                                <br />

                                <div class="relative max-w-sm">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    </div>
                                    <input datepicker name="date1" type="text"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Incio">
                                </div>
                                <br />
                                <div class="relative max-w-sm">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    </div>
                                    <input datepicker name="date2" type="text"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Fecha de Fin">
                                </div>


                            </div>
                            <!--footer-->
                            <div
                                class="flex items-center justify-end p-6 border-t border-solid border-slate-200 rounded-b">
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">

                                    Descargar
                                </button>

                                <button
                                    class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                    type="button" onclick="toggleModal('modal-id')">
                                    Cerrar
                                </button>

                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>
            <script type="text/javascript">
                function toggleModal(modalID) {
                    document.getElementById(modalID).classList.toggle("hidden");
                    document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
                    document.getElementById(modalID).classList.toggle("flex");
                    document.getElementById(modalID + "-backdrop").classList.toggle("flex");
                }

            </script>


        </div>

    </div>

    <div class="container m-auto">

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/datepicker.min.js"></script>


    @endsection
