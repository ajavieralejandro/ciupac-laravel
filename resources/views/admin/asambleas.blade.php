@extends('layouts.admin')

@section('title', 'Asambleas')

@section('content')
<div class="container-fluid py-3">
    @include('admin.partials.page-header', [
        'title' => 'Asambleas',
    ])

    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Asambleas</h5>
            <a href="{{ route('addAsamblea') }}" class="btn btn-primary">+ Nueva asamblea</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Título</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($logos as $logo)
                            <tr>
                                <td>{{ optional($logo->created_at)->format('d/m/Y') ?? '—' }}</td>
                                <td class="fw-semibold">{{ $logo->name }}</td>
                                <td>
                                    {{ \Illuminate\Support\Str::limit(strip_tags($logo->description), 90) }}
                                </td>
                                <td>
                                    @if(isset($logo->status) && !$logo->status)
                                        <span class="badge bg-secondary">Finalizada</span>
                                    @else
                                        <span class="badge bg-success">Activa</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <div class="d-inline-flex gap-2">
                                        <a href="{{ route('showImagenAsamblea', ['id' => $logo->id]) }}" class="btn btn-outline-secondary">Imágenes</a>
                                        <a href="{{ route('editAsamblea', ['id' => $logo->id]) }}" class="btn btn-outline-primary">Editar</a>

                                        <form method="POST" action="{{ route('deleteAsamblea') }}" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" name="asamblea_id" value="{{ $logo->id }}"/>
                                            <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">No hay asambleas cargadas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection