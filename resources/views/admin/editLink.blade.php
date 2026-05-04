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
          <h5 class="mb-0">Editar link</h5>
        </div>

        <div class="card-body">
          <form enctype="multipart/form-data" action="{{ route('updateLink') }}" method="POST">
            @csrf
            <input type="hidden" name="link_id" value="{{ $link->id }}"/>

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
              <input value="{{ $link->name }}" class="form-control" name="name" id="name" type="text">
            </div>

            <div class="form-check mb-3">
              <input id="default-checkbox" name="tutorial" @if($link->tutorial) checked @endif type="checkbox" class="form-check-input">
              <label for="default-checkbox" class="form-check-label">Tutorial</label>
            </div>

            <div class="mb-3">
              <label for="link" class="form-label">Link</label>
              <input value="{{ $link->link }}" name="link" id="link" class="form-control" type="text">
            </div>

            <div class="d-flex justify-content-between align-items-center mt-3">
              <a href="{{ route('links') }}" class="btn btn-outline-primary">Volver</a>
              <button class="btn btn-primary" type="submit">Guardar cambios</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection