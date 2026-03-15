@extends('layouts.app')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-4">Agregar superheroes</h1>
            <form action="{{ route('superheroes.store') }}" method="POST" class="card shadow">
                @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label for="real_name" class="form-label">Identidad Secreta <span class="text-danger">*</span></label>
                        <input 
                            type="text" 
                            class="form-control @error('real_name') is-invalid @enderror" 
                            id="real_name" 
                            name="real_name" 
                            value="{{ old('real_name') }}"
                            placeholder="ej. Peter Parker"
                            required>
                        @error('real_name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="hero_name" class="form-label">Nombre de superhéroe <span class="text-danger">*</span></label>
                        <input 
                            type="text" 
                            class="form-control @error('hero_name') is-invalid @enderror" 
                            id="hero_name" 
                            name="hero_name" 
                            value="{{ old('hero_name') }}"
                            placeholder="ej. Spider-Man"
                            required>
                        @error('hero_name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="photo_url" class="form-label">URL de la Foto</label>
                        <input 
                            type="url" 
                            class="form-control @error('photo_url') is-invalid @enderror" 
                            id="photo_url" 
                            name="photo_url" 
                            value="{{ old('photo_url') }}"
                            placeholder="https://ejemplo.com/foto.jpg">
                        @error('photo_url')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="additional_info" class="form-label">Información Adicional</label>
                        <textarea 
                            class="form-control @error('additional_info') is-invalid @enderror" 
                            id="additional_info" 
                            name="additional_info" 
                            rows="4"
                            placeholder="Ingrese cualquier información adicional sobre el superhéroe...">{{ old('additional_info') }}</textarea>
                        @error('additional_info')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="card-footer bg-light">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Agregar superheroe
                    </button>
                    <a href="{{ route('superheroes.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
