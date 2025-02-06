@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-3xl mt-10 p-6 bg-white rounded-xl shadow-md">
    <h2 class="text-2xl font-bold text-center mb-6">Asignar Locaciones a Usuarios</h2>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('assign.locations.store') }}" class="space-y-4">
        @csrf

        <!-- Selección de usuario con búsqueda -->
        <div>
            <label for="user_id" class="block text-sm font-medium text-gray-700">Seleccionar Usuario</label>
            <select name="user_id" id="user_id" class="w-full p-2 border rounded-md focus:ring focus:ring-blue-300">
                <option value="">-- Buscar Usuario --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                @endforeach
            </select>
        </div>

        <!-- Selección de locaciones múltiples -->
        <div>
            <label for="locations" class="block text-sm font-medium text-gray-700">Seleccionar Locaciones</label>
            <select name="locations[]" id="locations"
                class="w-full p-2 border rounded-md focus:ring focus:ring-blue-300" multiple>
                @foreach($locations as $location)
                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition">
            Asignar Locaciones
        </button>
    </form>

    <hr class="my-6">

    <!-- Tabla de usuarios y locaciones -->
    <h3 class="text-xl font-semibold text-center mb-4">Usuarios y sus Locaciones Asignadas</h3>

    <div class="overflow-x-auto">
        <table class="w-full border-collapse border border-gray-200 shadow-md">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-3 border">Usuario</th>
                    <th class="p-3 border">Locaciones Asignadas</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr class="text-center border-b">
                        <td class="p-3 border">{{ $user->name }} ({{ $user->email }})</td>
                        <td class="p-3 border">
                            @if($user->locations->isEmpty())
                                <span class="text-gray-500">No tiene locaciones asignadas</span>
                            @else
                                <ul class="list-disc list-inside">
                                    @foreach($user->locations as $location)
                                        <li>{{ $location->name }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Agregar Select2 para búsqueda en el select -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        // Activar búsqueda en select de usuarios
        $('#user_id').select2({
            placeholder: "Buscar usuario...",
            allowClear: true,
            width: '100%'
        });

        // Activar búsqueda en select de locaciones múltiples
        $('#locations').select2({
            placeholder: "Seleccionar locaciones...",
            allowClear: true,
            width: '100%'
        });
    });

</script>
@endsection
