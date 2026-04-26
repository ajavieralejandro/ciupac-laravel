@extends('layouts.admin')

@section('title', 'Asambleas')

@section('content')
<div class="container-fluid py-3">
    @include('admin.partials.page-header', [
        'title' => 'Asambleas',
    ])

    <div class="row justify-content-center">
        <div class="col-12 col-lg-9">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Editar asamblea</h5>
                    <a href="{{ route('showImagenAsamblea', ['id' => $asamblea->id]) }}" class="btn btn-outline-secondary">Ver imágenes</a>
                </div>

                <div class="card-body">
                    <form enctype="multipart/form-data" method="POST" action="{{ route('updateAsamblea') }}">
                        @csrf
                        @method('put')
                        <input type="hidden" name="asamblea_id" value="{{ $asamblea->id }}"/>

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
                            <label for="name" class="form-label">Título</label>
                            <input value="{{ $asamblea->name }}" type="text" class="form-control" name="name" id="name" required>
                        </div>

                        <div class="mb-3">
                            <label for="location_id" class="form-label">Locación</label>
                            <select name="location_id" id="location_id" class="form-control">
                                @foreach($locations as $location)
                                    <option {{ ($location->id == $asamblea->location_id ? 'selected' : '') }} value="{{ $location->id }}">{{ $location->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Descripción</label>
                            <textarea name="content" id="content" class="form-control" rows="6">{{ $asamblea->description }}</textarea>
                        </div>

                        <div class="d-flex justify-content-end mt-3">
                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');
</script>
@endpush
@endsection
