@extends('layouts.admin')

@section('title', 'Equipo')

@section('content')
<div class="container-fluid py-3">
  @include('admin.partials.page-header', [
    'title' => '👥 Equipo',
    'subtitle' => 'Crea, edita o elimina miembros del equipo.',
  ])

  <div class="row justify-content-center">
    <div class="col-12 col-lg-8 col-xl-7">
      <div class="card shadow-sm border-0">
        <div class="card-header bg-white">
          <h5 class="mb-0">Crear miembro</h5>
        </div>

        <div class="card-body">
          <form enctype="multipart/form-data" action="{{ route('addMember') }}" method="POST">
            @csrf

            @if ($errors->any())
              <div class="alert alert-danger">
                <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <div class="mb-3">
              <label for="image" class="form-label">Imagen (jpg, png, svg, jpeg)</label>
              <input type="file" name="image" id="image" class="form-control" />
            </div>

            <div class="mb-3">
              <label for="name" class="form-label">Nombre</label>
              <input name="name" id="name" type="text" class="form-control" placeholder="Nombre" value="{{ old('name') }}">
            </div>

            <div class="mb-3">
              <label for="priority" class="form-label">Prioridad</label>
              <input name="priority" id="priority" type="number" class="form-control" placeholder="Prioridad" value="{{ old('priority') }}">
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input name="email" id="email" type="email" class="form-control" value="{{ old('email') }}">
            </div>

            <div class="mb-3">
              <label for="message" class="form-label">Descripción</label>
              <textarea name="description" id="message" rows="4" class="form-control" placeholder="Descripción del miembro...">{{ old('description') }}</textarea>
            </div>

            <div class="form-check mb-3">
              <input id="default-checkbox" name="visible" type="checkbox" class="form-check-input" {{ old('visible', true) ? 'checked' : '' }}>
              <label for="default-checkbox" class="form-check-label">Visible</label>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-3">
              <a href="{{ route('team') }}" class="btn btn-outline-primary">Volver</a>
              <button class="btn btn-primary" type="submit">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection