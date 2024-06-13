@extends('layouts.app')
@section('content')

<div class="container mx-auto px-20 pb-10">


    <div class="flex flex-col mt-8">

        <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div
                class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Nombre</th>



                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Auth</th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Delete</th>
                        </tr>
                    </thead>

                    <tbody c lass="bg-white">
                        @foreach($users as $user)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-10 h-10">

                                        </div>

                                        <div class="ml-4">
                                            <div class="text-sm font-medium leading-5 text-gray-900">
                                                {{ $user->name }}
                                            </div>
                                        </div>
                                    </div>
                                </td>



                                <td
                                    class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                    @if(!$user->is_auth)

                                        <a
                                            href="{{ route('authUser', ['id' => $user->id]); }}">
                                            <svg class="w-8 h-8 text-red-500 hover:text-green-500"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636" />
                                            </svg>

                                        </a>
                                    @endif

                                    @if($user->is_auth)

                                        <a
                                            href="{{ route('authUser', ['id' => $user->id]); }}">

                                            <svg class="w-8 h-8 text-red-500 hover:text-green-500"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m4.5 12.75 6 6 9-13.5" />
                                            </svg>



                                        </a>
                                    @endif

                                </td>
                                <td
                                    class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                    <form method="POST" action="{{ route('deletePost') }}">
                                        @csrf
                                        @method('delete')


                                        <input type="hidden" name="post_id" value="{{ $user->id }}" />

                                        <button type="submit"
                                            class="   focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="w-6 h-6 text-red-400  hover:text-green-700" fill="none"
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
                {{ $users->links() }}
                <a href={{ route('storeUser') }}>
                    <button
                        class="w-full bg-transparent rounded inline-flex items-center h-10 px-5 text-green-500 transition-colors duration-150  rounded-lg focus:shadow-outline hover:text-white hover:bg-green-800">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        <span class="pl-4">Agregar Usuario </span>
                    </button>
                </a>
            </div>
        </div>
    </div>

</div>
@endsection
