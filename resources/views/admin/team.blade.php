@extends('layouts.admin')

@section('title', 'Equipo')

@section('content')
<div class="container-fluid py-3">
    @include('admin.partials.page-header', [
        'title' => 'Equipo',
    ])

    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Miembros del equipo</h5>
            <a href="{{ route('addMember') }}" class="btn btn-primary">➕ Agregar miembro</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol / Cargo</th>
                            <th>Estado</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($members as $member)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="{{ asset($member->image_path.'/'.$member->image_name) }}" alt="{{ $member->name }}" class="rounded-circle" width="40" height="40">
                                        <span class="fw-semibold">{{ $member->name }}</span>
                                    </div>
                                </td>
                                <td>{{ $member->email }}</td>
                                <td>{{ $member->priority }}</td>
                                <td>
                                    @if($member->status)
                                        <span class="badge bg-success">Activo</span>
                                    @else
                                        <span class="badge bg-secondary">Inactivo</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <div class="d-inline-flex gap-2">
                                        <a href="{{ route('editMember', ['id' => $member->id]) }}" class="btn btn-outline-primary">✏️ Editar</a>

                                        <form method="POST" action="{{ route('deleteMember') }}" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" name="member_id" value="{{ $member->id }}"/>
                                            <button type="submit" class="btn btn-outline-danger">🗑️ Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">No hay miembros cargados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection