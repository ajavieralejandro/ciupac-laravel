@extends('layouts.admin')

@section('title', 'Links')

@section('content')
<div class="container-fluid py-3">
    @include('admin.partials.page-header', [
        'title' => '🔗 Links',
        'subtitle' => 'Administra links y recursos de interés.',
    ])

    <div class="card shadow-sm border-0">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <div>
                <h5 class="mb-0">Listado de links</h5>
                <small class="text-muted">Gestiona tutoriales y recursos externos.</small>
            </div>
            <a href="{{ route('addLink') }}" class="btn btn-primary">Nuevo link</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>URL</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($links as $link)
                            <tr>
                                <td class="fw-semibold">{{ $link->name }}</td>
                                <td>
                                    @if($link->tutorial)
                                        <span class="badge bg-primary-subtle text-primary">Tutorial</span>
                                    @else
                                        <span class="badge bg-secondary-subtle text-secondary-emphasis">Recurso</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ $link->link }}" target="_blank" rel="noopener noreferrer" class="text-decoration-none">{{ $link->link }}</a>
                                </td>
                                <td class="text-end">
                                    <div class="d-inline-flex gap-2">
                                        <a href="{{ route('editLink', ['id' => $link->id]) }}" class="btn btn-outline-primary">Editar</a>
                                        <form method="POST" action="{{ route('deleteLink') }}" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" name="link_id" value="{{ $link->id }}"/>
                                            <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-5">
                                    <div class="text-muted mb-2">No hay links cargados.</div>
                                    <a href="{{ route('addLink') }}" class="btn btn-primary">Crear primer link</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection