@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row mb-4">
        <div class="col-md-8">
            <h1 class="display-4">Superheroes</h1>
        </div>
        <div class="col-md-4 text-end">
            <a href="{{ route('superheroes.create') }}" class="btn btn-primary btn-lg">
                <i class="fas fa-plus"></i> Add Superhero
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($superheroes->isEmpty())
        <div class="alert alert-info text-center py-5">
            <h4>No superheroes found</h4>
            <p>Start by <a href="{{ route('superheroes.create') }}">creating a new superhero</a>.</p>
        </div>
    @else
        <div class="row g-4">
            @foreach ($superheroes as $superhero)
                <div class="col-md-6 col-lg-4">
                    <div class="card superhero-card h-100 shadow-sm">
                        @if ($superhero->photo_url)
                            <img src="{{ $superhero->photo_url }}" class="card-img-top superhero-img" alt="{{ $superhero->hero_name }}">
                        @else
                            <div class="card-img-top superhero-img-placeholder d-flex align-items-center justify-content-center">
                                <i class="fas fa-user-secret fa-3x text-muted"></i>
                            </div>
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title hero-name">{{ $superhero->hero_name }}</h5>
                            <p class="card-text text-muted">{{ $superhero->real_name }}</p>
                            @if ($superhero->additional_info)
                                <p class="card-text small flex-grow-1">{{ Str::limit($superhero->additional_info, 80) }}</p>
                            @endif
                        </div>
                        <div class="card-footer bg-transparent border-top">
                            <a href="{{ route('superheroes.show', $superhero) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-eye"></i> View
                            </a>
                            <a href="{{ route('superheroes.edit', $superhero) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('superheroes.destroy', $superhero) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
