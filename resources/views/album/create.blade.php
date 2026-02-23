@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Crear Nuevo Álbum</h1>
        <a href="{{ route('albums.index') }}" class="btn btn-secondary">← Volver</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('albums.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="titulo" class="form-label">Título</label>
                    <input type="text" class="form-control @error('titulo') is-invalid @enderror"
                        id="titulo" name="titulo" value="{{ old('titulo') }}" required>
                    @error('titulo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label for="artista" class="form-label">Artista</label>
                    <input type="text" class="form-control @error('artista') is-invalid @enderror"
                        id="artista" name="artista" value="{{ old('artista') }}" required>
                    @error('artista')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label for="genero" class="form-label">Género</label>
                    <input type="text" class="form-control @error('genero') is-invalid @enderror"
                        id="genero" name="genero" value="{{ old('genero') }}">
                    @error('genero')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label for="discografia" class="form-label">Discográfica</label>
                    <input type="text" class="form-control @error('discografia') is-invalid @enderror"
                        id="discografia" name="discografia" value="{{ old('discografia') }}">
                    @error('discografia')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label for="formato" class="form-label">Formato</label>
                    <select class="form-control @error('formato') is-invalid @enderror" id="formato" name="formato">
                        <option value="">Seleccione un formato</option>
                        @foreach(['CD', 'Vinilo', 'Cassette', 'Digital'] as $formato)
                            <option value="{{ $formato }}" {{ old('formato') == $formato ? 'selected' : '' }}>{{ $formato }}</option>
                        @endforeach
                    </select>
                    @error('formato')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="anio_publicacion" class="form-label">Año de Publicación</label>
                        <input type="number" class="form-control @error('anio_publicacion') is-invalid @enderror"
                            id="anio_publicacion" name="anio_publicacion" value="{{ old('anio_publicacion') }}" min="1900" max="{{ date('Y') }}">
                        @error('anio_publicacion')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="num_pistas" class="form-label">Número de Pistas</label>
                        <input type="number" class="form-control @error('num_pistas') is-invalid @enderror"
                            id="num_pistas" name="num_pistas" value="{{ old('num_pistas') }}" min="1">
                        @error('num_pistas')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="minutos_duracion" class="form-label">Duración (minutos)</label>
                        <input type="number" class="form-control @error('minutos_duracion') is-invalid @enderror"
                            id="minutos_duracion" name="minutos_duracion" value="{{ old('minutos_duracion') }}" min="1">
                        @error('minutos_duracion')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Imagen de Portada</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                        id="image" name="image" accept="image/*">
                    @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Guardar Álbum</button>
                    <a href="{{ route('albums.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
