@extends('layouts.admin')

@section('title', 'Locaciones')

@section('content')
<div class="container-fluid py-3">
  @include('admin.partials.page-header', [
    'title' => 'Locaciones',
  ])

  <div class="row justify-content-center">
    <div class="col-12 col-lg-7 col-xl-6">
      <div class="card shadow-sm">
        <div class="card-header">
          <h5 class="mb-0">Crear locación</h5>
        </div>

        <div class="card-body">
          <form enctype="multipart/form-data" action="{{ route('newLocation') }}" method="POST">
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
              <label for="name" class="form-label">Nombre</label>
              <input name="name" id="name" type="text" class="form-control" value="{{ old('name') }}">
            </div>

            <div class="mb-3">
              <label for="longitude" class="form-label">Longitud</label>
              <input name="longitude" id="longitude" type="text" class="form-control" value="{{ old('longitude') }}">
            </div>

            <div class="mb-3">
              <label for="latitude" class="form-label">Latitud</label>
              <input name="latitude" id="latitude" type="text" class="form-control" value="{{ old('latitude') }}">
            </div>

            <div class="d-flex justify-content-end mt-3">
              <button class="btn btn-primary" type="submit">Guardar cambios</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection