@extends('layouts.app')

@section('title', 'Créer Entité d\'Affectation')

@section('main')
    <div class="container mt-4">
        <div class="bg-gray-100 d-flex flex-column align-items-center pt-4">
            <div class="w-100 bg-white rounded-lg shadow border mx-auto mt-3 col-sm-12 col-md-8 p-0"> <!-- Updated width and padding classes for container -->
                <div class="p-4"> <!-- Updated padding class -->
                    <h1 class="h3 font-weight-bold text-gray-900 mb-4">Créer Entité d'Affectation</h1>
                    <form action="{{ route('entitesAffectation.store') }}" method="POST"> <!-- Removed unnecessary spacing classes -->
                        @csrf
                        <div class="mb-3">
                            <label for="Nom" class="form-label text-gray-900">Nom :</label>
                            <input type="text" name="Nom" id="Nom" class="form-control" placeholder="Entité d'Affectation" value="{{ old('Nom') }}">
                            @error('Nom')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end"> <!-- Adjusted flex alignment to end -->
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
