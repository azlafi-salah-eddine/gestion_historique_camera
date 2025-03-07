@extends('layouts.app')

@section('title', 'MODIFIER EMPLOYE')

@section('main')
    <div class="container mt-4">
        <div class="card bg-white rounded shadow border-md max-mdw-30">
            <div class="card-body p-4">
                <h1 class="h4 font-weight-bold leading-tight text-gray-900">Modifier un employé</h1>
                <form action="{{ route('employes.update', $employe['Id_emp']) }}" method="POST" class="mt-4">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="ppr" class="form-label">PPR :</label>
                        <input type="text" name="PPR" id="ppr" value="{{ $employe['PPR'] }}" class="form-control" required>
                    </div>
                    @error('PPR')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom :</label>
                        <input type="text" name="Nom_emp" id="nom" value="{{ $employe['Nom_emp'] }}" class="form-control" required>
                    </div>
                    @error('Nom_emp')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="prenom" class="form-label">Prénom :</label>
                        <input type="text" name="Prenom_emp" id="prenom" value="{{ $employe['Prenom_emp'] }}" class="form-control" required>
                    </div>
                    @error('Prenom_emp')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="Id_aff" class="form-label">Entité Affectation :</label>
                        <select id="Id_aff" name="Id_aff" class="form-select">
                            @foreach ($entitesAffectation as $entiteAffectation)
                                <option value="{{ $entiteAffectation->Id_aff }}" @if ($employe['Id_aff'] === $entiteAffectation->Id_aff) selected @endif>{{ $entiteAffectation->Nom }}</option>
                            @endforeach
                        </select>
                        @error('Id_aff')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </form>
            </div>
        </div>
    </div>
@endsection
