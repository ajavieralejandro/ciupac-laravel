@extends('layouts.app')
@section('content')
<!-- component -->
<!-- This is an example component -->
<div class="max-w-2xl mx-auto">

    <div class="flex flex-col">
        <div class="overflow-x-auto shadow-md sm:rounded-lg">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden ">
                    <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>

                                <th scope="col"
                                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    Id
                                </th>
                                <th scope="col"
                                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    Fecha
                                </th>

                                <th scope="col" class="p-4">
                                    <span
                                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            @foreach($basuras as $basura)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">

                                    <td
                                        class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $basura->id }}</td>
                                    <td
                                        class="py-4 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">
                                        {{ $basura->fecha_hora }}</td>

                                    <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                        <a href="#" class="text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    </td>
                                </tr>

                            @endforeach




                        </tbody>
                    </table>
                    {{ $basuras->links() }}
                </div>
            </div>
        </div>
    </div>

    <p class="mt-5">This table component is part of a larger, open-source library of Tailwind CSS components. Learn
        more
        by going to the official <a class="text-blue-600 hover:underline" href="#" target="_blank">Flowbite
            Documentation</a>.
    </p>
</div>
@endsection
