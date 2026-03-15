@extends('layouts.app')

@section('content')
<div class="container py-5">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="position-relative">
                    @if ($superhero->photo_url)
                        <img src="{{ $superhero->photo_url }}" class="card-img-top superhero-detail-img" alt="{{ $superhero->hero_name }}">
                    @else
                        <div class="card-img-top superhero-detail-img-placeholder d-flex align-items-center justify-content-center">
                            <i class="fas fa-user-secret fa-5x text-muted"></i>
                        </div>
                    @endif
                </div>

                <div class="card-body">
                    <h1 class="card-title hero-name-large">{{ $superhero->hero_name }}</h1>
                    <p class="text-muted fs-5">{{ $superhero->real_name }}</p>

                    <hr class="my-4">

                    @if ($superhero->additional_info)
                        <div class="mb-4">
                            <h5 class="mb-2">Información Adicional:</h5>
                            <p class="card-text">{{ $superhero->additional_info }}</p>
                        </div>
                    @endif

                    <div class="row text-muted small">
                        <div class="col-md-6">
                            <p><strong>Creado:</strong> {{ $superhero->created_at->format('d M, Y') }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Actualizado:</strong> {{ $superhero->updated_at->format('d M, Y') }}</p>
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-light">
                    <a href="{{ route('superheroes.edit', $superhero) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                    <a href="{{ route('superheroes.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Volver a la lista
                    </a>
                    <form action="{{ route('superheroes.destroy', $superhero) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este superhéroe?')">
                            <i class="fas fa-trash"></i> Eliminar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
