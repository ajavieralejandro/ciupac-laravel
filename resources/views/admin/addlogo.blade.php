@extends('layouts.admin')

@section('title', 'Logos')

@section('content')
<div class="container-fluid py-3">
  @include('admin.partials.page-header', [
    'title' => '🏷️ Logos',
    'subtitle' => 'Gestiona logos y variantes visibles.',
  ])

  <div class="row justify-content-center">
    <div class="col-12 col-lg-7 col-xl-6">
      <div class="card shadow-sm border-0">
        <div class="card-header bg-white">
          <h5 class="mb-0">Crear logo</h5>
        </div>

        <div class="card-body">
          <form enctype="multipart/form-data" action="{{ route('storeLogo') }}" method="POST">
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
              <input name="name" id="name" type="text" class="form-control" value="{{ old('name') }}">
            </div>

            <div class="mb-3">
              <label for="type" class="form-label">Tipo</label>
              <select name="type" id="type" class="form-select">
                <option value="CP" {{ old('type') === 'CP' ? 'selected' : '' }}>Contrapartes</option>
                <option value="F" {{ old('type') === 'F' ? 'selected' : '' }}>Financia</option>
                <option value="A" {{ old('type') === 'A' ? 'selected' : '' }}>Acompañan</option>
              </select>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-3">
              <a href="{{ route('logos') }}" class="btn btn-outline-primary">Volver</a>
              <button class="btn btn-primary" type="submit">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection