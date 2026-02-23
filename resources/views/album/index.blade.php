@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Listado de Álbumes</h1>
        <a href="{{ route('albums.create') }}" class="btn btn-primary">+ Añadir Álbum</a>
    </div>

    @if($albums->isEmpty())
        <div class="alert alert-info">No hay álbumes disponibles.</div>
    @else
    <table class="table table-striped table-bordered align-middle">
        <thead class="table-dark">
            <tr>
                <th>Imagen</th>
                <th>Título</th>
                <th>Artista</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($albums as $album)
            <tr>
                <td>
                    @if($album->image)
                        <img src="{{ asset('storage/' . $album->image) }}" alt="Imagen del álbum" width="60" class="rounded">
                    @else
                        <span class="text-muted">Sin imagen</span>
                    @endif
                </td>
                <td>{{ $album->titulo }}</td>
                <td>{{ $album->artista }}</td>
                <td>
                    <a href="{{ route('albums.show', $album->id) }}" class="btn btn-sm btn-primary">Ver</a>
                    <a href="{{ route('albums.edit', $album->id) }}" class="btn btn-sm btn-warning">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center mt-3">
        {{ $albums->links('pagination::bootstrap-5') }}
    </div>
    @endif
</div>
@endsection
