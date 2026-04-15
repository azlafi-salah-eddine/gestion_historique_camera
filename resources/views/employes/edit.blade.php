@extends('layouts.app')

@section('title', 'MODIFIER EMPLOYE')

@section('main')
<section class="max-w-4xl mx-auto">
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4 p-lg-5">
            <h1 class="h3 fw-bold mb-4">Modifier un employé</h1>

            <form action="{{ route('employes.update', $employe['Id_emp']) }}" method="POST" class="row g-3">
                @csrf
                @method('PUT')

                <div class="col-md-4">
                    <label for="ppr" class="form-label">PPR</label>
                    <input type="text" name="PPR" id="ppr" value="{{ old('PPR', $employe['PPR']) }}" class="form-control" required>
                    @error('PPR')<div class="text-danger small">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-4">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" name="Nom_emp" id="nom" value="{{ old('Nom_emp', $employe['Nom_emp']) }}" class="form-control" required>
                    @error('Nom_emp')<div class="text-danger small">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-4">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" name="Prenom_emp" id="prenom" value="{{ old('Prenom_emp', $employe['Prenom_emp']) }}" class="form-control" required>
                    @error('Prenom_emp')<div class="text-danger small">{{ $message }}</div>@enderror
                </div>

                <div class="col-12">
                    <label for="Id_aff" class="form-label">Entité d'affectation</label>
                    <select id="Id_aff" name="Id_aff" class="form-select">
                        @foreach ($entitesAffectation as $entiteAffectation)
                            <option value="{{ $entiteAffectation->Id_aff }}" {{ old('Id_aff', $employe['Id_aff']) == $entiteAffectation->Id_aff ? 'selected' : '' }}>
                                {{ $entiteAffectation->Nom }}
                            </option>
                        @endforeach
                    </select>
                    @error('Id_aff')<div class="text-danger small">{{ $message }}</div>@enderror
                </div>

                <div class="col-12 d-flex justify-content-end gap-2">
                    <a href="{{ route('employes.index') }}" class="btn btn-light border">Annuler</a>
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
