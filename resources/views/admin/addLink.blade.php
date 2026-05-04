@extends('layouts.admin')

@section('title', 'Links')

@section('content')
<div class="container-fluid py-3">
  @include('admin.partials.page-header', [
    'title' => '🔗 Links',
    'subtitle' => 'Administra links y recursos de interés.',
  ])

  <div class="row justify-content-center">
    <div class="col-12 col-lg-7 col-xl-6">
      <div class="card shadow-sm border-0">
        <div class="card-header bg-white">
          <h5 class="mb-0">Crear link</h5>
        </div>

        <div class="card-body">
          <form enctype="multipart/form-data" action="{{ route('storeLink') }}" method="POST">
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
              <input class="form-control" name="name" id="name" type="text" value="{{ old('name') }}">
            </div>

            <div class="form-check mb-3">
              <input id="default-checkbox" name="tutorial " type="checkbox" class="form-check-input" {{ old('tutorial ', true) ? 'checked' : '' }}>
              <label for="default-checkbox" class="form-check-label">Tutorial</label>
            </div>

            <div class="mb-3">
              <label for="link" class="form-label">Link</label>
              <input name="link" id="link" class="form-control" type="text" value="{{ old('link') }}">
            </div>

            <div class="d-flex justify-content-between align-items-center mt-3">
              <a href="{{ route('links') }}" class="btn btn-outline-primary">Volver</a>
              <button class="btn btn-primary" type="submit">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection