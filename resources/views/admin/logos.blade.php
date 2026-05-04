@extends('layouts.admin')

@section('title', 'Logos')

@section('content')
<div class="container-fluid py-3">
    @include('admin.partials.page-header', [
        'title' => '🏷️ Logos',
        'subtitle' => 'Gestiona logos y variantes visibles.',
    ])

    <div class="card shadow-sm border-0">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <div>
                <h5 class="mb-0">Listado de logos</h5>
                <small class="text-muted">Administra imagen y tipo de cada logo.</small>
            </div>
            <a href="{{ route('addLogo') }}" class="btn btn-primary">Nuevo logo</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Logo</th>
                            <th>Tipo</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($logos as $logo)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="{{ asset($logo->image_path.'/'.$logo->image_name) }}" alt="{{ $logo->name }}" class="rounded" width="44" height="44">
                                        <span class="fw-semibold">{{ $logo->name }}</span>
                                    </div>
                                </td>
                                <td>
                                    @if($logo->type === 'CP')
                                        <span class="badge bg-primary-subtle text-primary">Contrapartes</span>
                                    @elseif($logo->type === 'F')
                                        <span class="badge bg-info-subtle text-info-emphasis">Financia</span>
                                    @else
                                        <span class="badge bg-secondary-subtle text-secondary-emphasis">Acompañan</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <div class="d-inline-flex gap-2">
                                        <a href="{{ route('editLogo', ['id' => $logo->id]) }}" class="btn btn-outline-primary">Editar</a>
                                        <form method="POST" action="{{ route('deleteLogo') }}" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" name="logo_id" value="{{ $logo->id }}"/>
                                            <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center py-5">
                                    <div class="text-muted mb-2">No hay logos cargados.</div>
                                    <a href="{{ route('addLogo') }}" class="btn btn-primary">Crear primer logo</a>
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