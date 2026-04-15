@extends('layouts.app')

@section('title', 'Ajouter une camera')

@section('main')
<section class="max-w-4xl mx-auto">
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4 p-lg-5">
            <h1 class="h3 fw-bold mb-4">Ajouter une caméra</h1>

            <form action="{{ route('cameras.store') }}" method="POST" class="row g-3">
                @csrf

                <div class="col-md-6">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" name="Nom_c" id="nom" class="form-control" value="{{ old('Nom_c') }}" placeholder="Nom de la caméra">
                    @error('Nom_c')<div class="text-danger small">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label for="etage" class="form-label">Étage</label>
                    <select id="etage" name="Etage" class="form-select">
                        @for($i = 1; $i <= 6; $i++)
                            <option value="{{ $i }}" {{ old('Etage') == (string)$i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="site" class="form-label">Site</label>
                    <select id="site" name="Site" class="form-select">
                        <option value="Siege" {{ old('Site') === 'Siege' ? 'selected' : '' }}>Siège</option>
                        <option value="Annexe Abtal" {{ old('Site') === 'Annexe Abtal' ? 'selected' : '' }}>Annexe Abtal</option>
                        <option value="Annexe Ayachi" {{ old('Site') === 'Annexe Ayachi' ? 'selected' : '' }}>Annexe Ayachi</option>
                    </select>
                </div>

                <div class="col-12">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" name="Description" rows="4" class="form-control" placeholder="Entrez la description ici">{{ old('Description') }}</textarea>
                    @error('Description')<div class="text-danger small">{{ $message }}</div>@enderror
                </div>

                <div class="col-12 d-flex justify-content-end gap-2">
                    <a href="{{ route('cameras.index') }}" class="btn btn-light border">Annuler</a>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
