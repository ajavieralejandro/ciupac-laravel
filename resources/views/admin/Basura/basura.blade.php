@extends('layouts.app')
@section('content')
<!-- component -->
@if(Auth::user()->is_auth)
    <div class="pt-12 flex items-center justify-center">

        <div class="max-w-xl rounded overflow-hidden shadow-lg">


            <form name="add-blog-post-form" id="add-blog-post-form" method="post"
                action="{{ route('add_medicion_basura') }}">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 m-2 gap-4">
                    <!-- Fecha y Hora -->
                    <div class="mb-4">
                        <label for="fecha_hora" class="block text-gray-700 font-bold mb-2">Fecha y Hora:</label>
                        <input type="datetime-local" id="fecha_hora" name="fecha_hora"
                            class="w-full p-2 border rounded-md" required>
                    </div>

                    <!-- Largo del Perfil -->
                    <div class="mb-4">
                        <label for="largo_perfil" class="block text-gray-700 font-bold mb-2">Largo del Perfil:</label>
                        <input type="text" id="largo_perfil" name="largo_perfil" class="w-full p-2 border rounded-md"
                            required>
                    </div>

                    <!-- Responsable de la Medición -->
                    <div class="mb-4">
                        <label for="responsable_medicion" class="block text-gray-700 font-bold mb-2">Responsable de la
                            Medición:</label>
                        <input type="text" id="responsable_medicion" name="responsable_medicion"
                            class="w-full p-2 border rounded-md" required>
                    </div>

                    <!-- Localidad -->
                    <div class="mb-4">
                        <label for="localidad" class="block text-gray-700 font-bold mb-2">Localidad:</label>
                        <select id="localidad" name="localidad" class="w-full p-2 border rounded-md" required>
                            @foreach($locations as $localidad)
                                <option value="{{ $localidad->id }}">{{ $localidad->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Sitio o Perfil -->
                    <div class="mb-4">
                        <label for="sitio_perfil" class="block text-gray-700 font-bold mb-2">Sitio o Perfil:</label>
                        <input type="text" id="sitio_perfil" name="sitio_perfil" class="w-full p-2 border rounded-md"
                            required>
                    </div>

                    <!-- Coincide con el Perfil -->
                    <div class="mb-4 flex items-center">
                        <input type="checkbox" id="coincide_perfil" name="coincide_perfil" class="mr-2">
                        <label for="coincide_perfil" class="text-gray-700 font-bold">Coincide con el Perfil</label>
                    </div>

                </div>
                <!-- Hora Bajamar -->
                <div class="grid grid-cols-1 md:grid-cols-2 m-2 gap-4">


                    <div class="mb-4">
                        <label for="hora_bajamar" class="block text-gray-700 font-bold mb-2">Hora Bajamar:</label>
                        <input type="time" id="hora_bajamar" name="hora_bajamar" class="w-full p-2 border rounded-md"
                            required>
                    </div>

                    <!-- Distancia entre mojón hasta última línea de pleamar -->
                    <div class="mb-4">
                        <label for="distancia_pleamar_mojon" class="block text-gray-700 font-bold mb-2">Distancia entre
                            mojón
                            hasta
                            última línea de pleamar:</label>
                        <input type="text" id="distancia_pleamar_mojon" name="distancia_pleamar_mojon"
                            class="w-full p-2 border rounded-md" required>
                    </div>

                    <!-- Distancia entre última línea de pleamar hasta línea de agua -->
                    <div class="mb-4">
                        <label for="distancia_agua_pleamar" class="block text-gray-700 font-bold mb-2">Distancia entre
                            última
                            línea
                            de pleamar hasta línea de agua:</label>
                        <input type="text" id="distancia_agua_pleamar" name="distancia_agua_pleamar"
                            class="w-full p-2 border rounded-md" required>
                    </div>

                    <!-- Cantidad de personas en este sector 1 -->
                    <div class="mb-4">
                        <label for="personas_sector1" class="block text-gray-700 font-bold mb-2">Cantidad de personas en
                            este
                            sector
                            1:</label>
                        <input type="number" id="personas_sector1" name="personas_sector1"
                            class="w-full p-2 border rounded-md" required>
                    </div>

                    <!-- Cantidad de personas en este sector 2 -->
                    <div class="mb-4">
                        <label for="personas_sector2" class="block text-gray-700 font-bold mb-2">Cantidad de personas en
                            este
                            sector
                            2:</label>
                        <input type="number" id="personas_sector2" name="personas_sector2"
                            class="w-full p-2 border rounded-md" required>
                    </div>

                    <!-- Cantidad de cestos de residuos en el área de medición -->
                    <div class="mb-4">
                        <label for="cestos_area_medicion" class="block text-gray-700 font-bold mb-2">Cantidad de cestos
                            de
                            residuos
                            en el área de medición:</label>
                        <input type="number" id="cestos_area_medicion" name="cestos_area_medicion"
                            class="w-full p-2 border rounded-md" required>
                    </div>

                    <!-- Cantidad de cestos de residuos 50 m a la derecha y 50 m a la izquierda del área censada -->
                    <div class="mb-4">
                        <label for="cestos_derecha_izquierda" class="block text-gray-700 font-bold mb-2">Cantidad de
                            cestos
                            de
                            residuos 50 m a la derecha y 50 m a la izquierda del área censada:</label>
                        <input type="number" id="cestos_derecha_izquierda" name="cestos_derecha_izquierda"
                            class="w-full p-2 border rounded-md" required>
                    </div>
                </div>
                <!-- Submit Button -->
                <div class="mb-4">
                    <button type="submit"
                        class="w-full bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600">Enviar</button>
                </div>
            </form>
        </div>
    </div>
@endif
<h1>No tienes permiso para cargar basura manda un mail a : </h1>
@endsection
