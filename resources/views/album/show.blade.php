@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Información del Álbum</h1>
        <a href="{{ route('albums.index') }}" class="btn btn-secondary">← Volver</a>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    @if($album->image)
                        <img src="{{ asset('storage/' . $album->image) }}" alt="Portada" style="width: 150px; height: 150px; object-fit: cover;" class="img-fluid rounded">
                    @else
                        <div class="bg-secondary text-white text-center p-5 rounded">Sin imagen</div>
                    @endif
                </div>
                <div class="col-md-9">
                    <h2>{{ $album->titulo }}</h2>
                    <table class="table table-borderless">
                        <tr><th>Artista</th><td>{{ $album->artista }}</td></tr>
                        <tr><th>Género</th><td>{{ $album->genero }}</td></tr>
                        <tr><th>Discográfica</th><td>{{ $album->discografia }}</td></tr>
                        <tr><th>Formato</th><td>{{ $album->formato }}</td></tr>
                        <tr><th>Año</th><td>{{ $album->anio_publicacion }}</td></tr>
                        <tr><th>Nº Pistas</th><td>{{ $album->num_pistas }}</td></tr>
                        <tr><th>Duración</th><td>{{ $album->minutos_duracion }} minutos</td></tr>
                        <tr>
                            <th>Puntuación media</th>
                            <td>
                                @if($album->average_rating > 0)
                                    {{ number_format($album->average_rating, 1) }} / 5.0
                                @else
                                    Sin valoraciones
                                @endif
                            </td>
                        </tr>
                    </table>
                    <a href="{{ route('albums.edit', $album->id) }}" class="btn btn-warning">Editar</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Formulario de valoración --}}
    <div class="card mt-4">
        <div class="card-body">
            <h4>Tu Valoración</h4>

            @auth
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('ratings.store', $album->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="score" class="form-label">Puntuación (1-5)</label>
                        <select name="score" id="score" class="form-select w-auto @error('score') is-invalid @enderror">
                            @for($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}" {{ isset($miValoracion) && $miValoracion->score == $i ? 'selected' : '' }}>
                                    {{ $i }} ⭐
                                </option>
                            @endfor
                        </select>
                        @error('score')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">
                        {{ isset($miValoracion) ? 'Actualizar valoración' : 'Enviar valoración' }}
                    </button>
                </form>
            @else
                <p class="text-muted">Debes <a href="{{ route('login') }}">iniciar sesión</a> para valorar este álbum.</p>
            @endauth
        </div>
    </div>
</div>
@endsection
