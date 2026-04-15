@extends('layouts.app')

@section('title', 'AJOUTER EMPLOYE')

@section('main')
<section class="max-w-4xl mx-auto">
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4 p-lg-5">
            <h1 class="h3 fw-bold mb-4">Créer un employé</h1>
            <form action="{{ route('employes.store') }}" method="POST" class="row g-3">
                @csrf

                <div class="col-md-4">
                    <label for="PPR" class="form-label">PPR</label>
                    <input type="text" name="PPR" id="PPR" class="form-control" placeholder="Ex : 123455" value="{{ old('PPR') }}">
                    @error('PPR')<div class="text-danger small">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-4">
                    <label for="Nom_emp" class="form-label">Nom</label>
                    <input type="text" name="Nom_emp" id="Nom_emp" class="form-control" value="{{ old('Nom_emp') }}">
                    @error('Nom_emp')<div class="text-danger small">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-4">
                    <label for="Prenom_emp" class="form-label">Prénom</label>
                    <input type="text" name="Prenom_emp" id="Prenom_emp" class="form-control" value="{{ old('Prenom_emp') }}">
                    @error('Prenom_emp')<div class="text-danger small">{{ $message }}</div>@enderror
                </div>

                <div class="col-12">
                    <label for="Id_aff" class="form-label">Entité d'affectation</label>
                    <select id="Id_aff" name="Id_aff" class="form-select">
                        @foreach ($entitesAffectation as $entiteAffectation)
                            <option value="{{ $entiteAffectation->Id_aff }}" {{ old('Id_aff') == $entiteAffectation->Id_aff ? 'selected' : '' }}>
                                {{ $entiteAffectation->Nom }}
                            </option>
                        @endforeach
                    </select>
                    @error('Id_aff')<div class="text-danger small">{{ $message }}</div>@enderror
                </div>

                <div class="col-12 d-flex justify-content-end gap-2">
                    <a href="{{ route('employes.index') }}" class="btn btn-light border">Annuler</a>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
