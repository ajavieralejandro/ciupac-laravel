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
          <h5 class="mb-0">Editar logo</h5>
        </div>

        <div class="card-body">
          <form enctype="multipart/form-data" action="{{ route('updateLogo') }}" method="POST">
            @csrf
            @method('put')
            <input type="hidden" name="logo_id" value="{{ $logo->id }}"/>

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
              <input value="{{ $logo->name }}" name="name" id="name" type="text" class="form-control">
            </div>

            <div class="mb-3">
              <label for="type" class="form-label">Tipo</label>
              <select name="type" id="type" class="form-select">
                <option {{ ($logo->type == 'CP' ? 'selected' : '') }} value="CP">Contrapartes</option>
                <option {{ ($logo->type == 'F' ? 'selected' : '') }} value="F">Financia</option>
                <option {{ ($logo->type == 'A' ? 'selected' : '') }} value="A">Acompañan</option>
              </select>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-3">
              <a href="{{ route('logos') }}" class="btn btn-outline-primary">Volver</a>
              <button class="btn btn-primary" type="submit">Guardar cambios</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection