@extends('layouts.app')

@section('title', 'AJOUTER EMPLOYE')

@section('main')
    <div class="container mt-4">
        <div class="bg-gray-100 d-flex flex-column align-items-center pt-4">
            <div class="w-100 bg-white rounded-lg shadow border mx-auto mt-3 col-sm-12 col-md-8 p-0">
                <div class="p-4">
                    <h1 class="h3 font-weight-bold text-gray-900 mb-4">Créer un employé</h1>
                    <form action="{{ route('employes.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="Nom" class="form-label text-gray-900">PPR :</label>
                            <input type="text" name="PPR" id="Nom" class="form-control"
                                placeholder="Ex : 123455" value="{{ old('PPR') }}">
                            @error('PPR')
                                <div class="text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="Nom" class="form-label text-gray-900">Nom :</label>
                            <input type="text" name="Nom_emp" id="Nom" class="form-control"
                                placeholder="Ex : Azlafi" value="{{ old('Nom_emp') }}">
                            @error('Nom_emp')
                                <div class="text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="Nom" class="form-label text-gray-900">Prenom :</label>
                            <input type="text" name="Prenom_emp" id="Nom" class="form-control"
                                placeholder="Ex : Salah Eddine" value="{{ old('Prenom_emp') }}">
                            @error('Prenom_emp')
                                <div class="text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="site" class="form-label">Entité d'Affectations :</label>
                            <select id="site" name="Id_aff" class="form-select">
                                @foreach ($entitesAffectation as $entiteAffectation)
                                    <option value="{{ $entiteAffectation->Id_aff }}"
                                        {{ old('Id_aff') == $entiteAffectation->Id_aff ? 'selected' : '' }}>
                                        {{ $entiteAffectation->Nom }}</option>
                                @endforeach
                            </select>
                            @error('Id_aff')
                                <div class="text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
