@extends('layouts.app')

@section('content')
<div class="container mx-auto px-20">
    <div>
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-4 pt-20 pb-10 lg:pt-40 lg:pb-20"
            style="cursor: auto;">

            <!-- Ícono 1: Equipo -->
            <div class="p-6 bg-gray-100 rounded-lg">
                <div class="mb-5">
                    <a href={{ route('team') }} rel='stylesheet'>
                        <svg class="hover:text-green-500 h-8 w-8 text-red-500" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </a>
                </div>
                <h3 class="text-lg font-bold mb-2">
                    1. Equipo
                </h3>
                <p class="text-sm leading-6 text-gray-600">
                    Crea, edita o elimina miembros del equipo.
                </p>
            </div>

            <!-- Ícono 2: Portada -->
            <div class="p-6 bg-gray-100 rounded-lg">
                <div class="mb-5">
                    <a href={{ route('uploadImage') }} rel='stylesheet'>
                        <svg class="hover:text-green-500 h-8 w-8 text-red-500" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
                            <circle cx="8.5" cy="8.5" r="1.5" />
                            <polyline points="21 15 16 10 5 21" />
                        </svg>
                    </a>
                </div>
                <h3 class="text-lg font-bold mb-2">
                    2. Portada
                </h3>
                <p class="text-sm leading-6 text-gray-600">
                    Actualiza la imagen de portada a la página.
                </p>
            </div>

            <!-- Ícono 3: Locaciones -->
            <div class="p-6 bg-gray-100 rounded-lg" style="cursor: auto;">
                <div class="mb-5" style="cursor: auto;">
                    <a href={{ route('locations') }} rel='stylesheet'>
                        <svg class="hover:text-green-500 h-8 w-8 text-red-500" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </a>
                </div>
                <h3 class="text-lg font-bold mb-2">
                    3. Locaciones
                </h3>
                <p class="text-sm leading-6 text-gray-600">
                    Agrega, edita o elimina una locación.
                </p>
            </div>

            <!-- Ícono 4: Logos -->
            <div class="p-6 bg-gray-100 rounded-lg">
                <div class="mb-5">
                    <a href={{ route('logos') }} rel='stylesheet'>
                        <svg class="hover:text-green-500 h-8 w-8 text-red-500" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                    </a>
                </div>
                <h3 class="text-lg font-bold mb-2">
                    4. Logos
                </h3>
                <p class="text-sm leading-6 text-gray-600">
                    Agrega, edita o elimina logos.
                </p>
            </div>

            <!-- Ícono 5: About -->
            <div class="p-6 bg-gray-100 rounded-lg">
                <div class="mb-5">
                    <a href={{ route('showAbout') }} rel='stylesheet'>
                        <svg class="hover:text-green-500 h-8 w-8 text-red-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                        </svg>
                    </a>
                </div>
                <h3 class="text-lg font-bold mb-2">
                    5. About
                </h3>
                <p class="text-sm leading-6 text-gray-600">
                    Modifica la imagen y el texto de la sección about.
                </p>
            </div>

            <!-- Ícono 6: Artículos -->
            <div class="p-6 bg-gray-100 rounded-lg">
                <div class="mb-5">
                    <a href={{ route('showArticles') }} rel='stylesheet'>
                        <svg class="w-8 h-8 text-red-500 hover:text-green-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                    </a>
                </div>
                <h3 class="text-lg font-bold mb-2">
                    6. Artículos
                </h3>
                <p class="text-sm leading-6 text-gray-600">
                    Agrega, edita o elimina los archivos pdf.
                </p>
            </div>

            <!-- Ícono 7: Asambleas -->
            <div class="p-6 bg-gray-100 rounded-lg">
                <div class="mb-5">
                    <a href={{ route('asambleas') }} rel='stylesheet'>
                        <svg class="w-8 h-8 text-red-500 hover:text-green-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                        </svg>
                    </a>
                </div>
                <h3 class="text-lg font-bold mb-2">
                    7. Asambleas
                </h3>
                <p class="text-sm leading-6 text-gray-600">
                    Agrega y edita las asambleas, y sus imágenes.
                </p>
            </div>

            <!-- Ícono 8: Posts -->
            <div class="p-6 bg-gray-100 rounded-lg">
                <div class="mb-5">
                    <a href={{ route('posts') }} rel='stylesheet'>
                        <svg class="w-8 h-8 text-red-500 hover:text-green-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </a>
                </div>
                <h3 class="text-lg font-bold mb-2">
                    8. Posts
                </h3>
                <p class="text-sm leading-6 text-gray-600">
                    Agrega, edita y setea la visibilidad de las noticias.
                </p>
            </div>

            <!-- Ícono 9: Configuración -->
            <div class="p-6 bg-gray-100 rounded-lg">
                <div class="mb-5">
                    <a href={{ route('config') }} rel='stylesheet'>
                        <svg class="w-8 h-8 text-red-500 hover:text-green-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </a>
                </div>
                <h3 class="text-lg font-bold mb-2">
                    9. Configuración
                </h3>
                <p class="text-sm leading-6 text-gray-600">
                    Setea direcciones, redes sociales y visibilidad.
                </p>
            </div>

            <!-- Ícono 10: Links -->
            <div class="p-6 bg-gray-100 rounded-lg">
                <div class="mb-5">
                    <a href={{ route('links') }} rel='stylesheet'>
                        <svg class="w-8 h-8 text-red-500 hover:text-green-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                        </svg>
                    </a>
                </div>
                <h3 class="text-lg font-bold mb-2">
                    10. Links
                </h3>
                <p class="text-sm leading-6 text-gray-600">
                    Agrega, edita links de interés.
                </p>
            </div>

            <!-- Ícono 11: Estaciones -->
            <div class="p-6 bg-gray-100 rounded-lg">
                <div class="mb-5">
                    <a href={{ route('stations') }} rel='stylesheet'>
                        <svg class="w-8 h-8 text-red-500 hover:text-green-500" fill="none" stroke="currentColor"
                            stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4.098 19.902a3.75 3.75 0 005.304 0l6.401-6.402M6.75 21A3.75 3.75 0 013 17.25V4.125C3 3.504 3.504 3 4.125 3h5.25c.621 0 1.125.504 1.125 1.125v4.072M6.75 21a3.75 3.75 0 003.75-3.75V8.197M6.75 21h13.125c.621 0 1.125-.504 1.125-1.125v-5.25c0-.621-.504-1.125-1.125-1.125h-4.072M10.5 8.197l2.88-2.88c.438-.439 1.15-.439 1.59 0l3.712 3.713c.44.44.44 1.152 0 1.59l-2.879 2.88M6.75 17.25h.008v.008H6.75v-.008z" />
                        </svg>
                    </a>
                </div>
                <h3 class="text-lg font-bold mb-2">
                    11. Estaciones
                </h3>
                <p class="text-sm leading-6 text-gray-600">
                    Agrega, edita y conecta las estaciones.
                </p>
            </div>

            <!-- Ícono 12: Usuarios -->
            <div class="p-6 bg-gray-100 rounded-lg">
                <div class="mb-5">
                    <a href={{ route('usersIndex') }} rel='stylesheet'>
                        <svg class="w-8 h-8 text-red-500 hover:text-green-500" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                    </a>
                </div>
                <h3 class="text-lg font-bold mb-2">
                    12. Usuarios
                </h3>
                <p class="text-sm leading-6 text-gray-600">
                    Registra usuarios para que suban mediciones.
                </p>
            </div>

            <!-- Ícono 13: Asignar Locaciones -->
            <div class="p-6 bg-gray-100 rounded-lg">
                <div class="mb-5">
                    <a href="{{ route('assign.locations') }}" rel='stylesheet'>
                        <svg class="hover:text-green-500 h-8 w-8 text-red-500" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </a>
                </div>
                <h3 class="text-lg font-bold mb-2">
                    13. Asignar Locaciones
                </h3>
                <p class="text-sm leading-6 text-gray-600">
                    Asigna locaciones a los usuarios.
                </p>
            </div>

            <!-- Ícono 14: Basuras -->
            <div class="p-6 bg-gray-100 rounded-lg">
                <div class="mb-5">
                    <a href="{{ route('basuras_index') }}" rel='stylesheet'>
                        <svg class="hover:text-green-500 h-8 w-8 text-red-500" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h14a2 2 0 012 2v14a2 2 0 01-2 2z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 9l6 6m0-6l-6 6" />
                        </svg>
                    </a>
                </div>
                <h3 class="text-lg font-bold mb-2">
                    14. Basuras
                </h3>
                <p class="text-sm leading-6 text-gray-600">
                    Visualiza y gestiona las mediciones de basuras.
                </p>
            </div>

        </div>
    </div>
</div>
@endsection
