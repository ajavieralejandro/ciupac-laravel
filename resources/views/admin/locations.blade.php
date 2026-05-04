@extends('layouts.admin')

@section('title', 'Locaciones')

@section('content')
<div class="container-fluid py-3">
    @include('admin.partials.page-header', [
        'title' => '📍 Locaciones',
        'subtitle' => 'Administra locaciones y puntos asociados.',
    ])

    <div class="card shadow-sm border-0">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Locaciones</h5>
            <a href="{{ route('createLocation') }}" class="btn btn-primary">Nueva locación</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Estado</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($locations as $location)
                            <tr>
                                <td class="fw-semibold">{{ $location->name }}</td>
                                <td>
                                    Lat: {{ $location->latitude }}<br>
                                    Lng: {{ $location->longitude }}
                                </td>
                                <td>
                                    @if(isset($location->status) && !$location->status)
                                        <span class="badge bg-secondary">Inactivo</span>
                                    @else
                                        <span class="badge bg-success">Activo</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <div class="d-inline-flex gap-2">
                                        <a href="{{ route('showLocation', ['id' => $location->id]) }}" class="btn btn-outline-primary">✏️ Editar</a>

                                        <form method="POST" action="{{ route('deleteLocation') }}" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" name="location_id" value="{{ $location->id }}"/>
                                            <button type="submit" class="btn btn-outline-danger">🗑️ Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-5">
                                    <div class="text-muted mb-2">No hay locaciones cargadas.</div>
                                    <a href="{{ route('createLocation') }}" class="btn btn-primary">Crear primera locación</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $locations->links() }}
            </div>
        </div>
    </div>
</div>
@endsection