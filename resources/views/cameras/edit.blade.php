@extends('layouts.app')

@section('title', 'Modifier une camera')

@section('main')
<section class="max-w-4xl mx-auto">
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4 p-lg-5">
            <h1 class="h3 fw-bold mb-4">Modifier une caméra</h1>

            <form action="{{ route('cameras.update', $camera->Id_c) }}" method="POST" class="row g-3">
                @csrf
                @method('PUT')

                <div class="col-md-6">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" name="Nom_c" id="nom" class="form-control" value="{{ old('Nom_c', $camera->Nom_c) }}">
                    @error('Nom_c')<div class="text-danger small">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label for="etage" class="form-label">Étage</label>
                    <select id="etage" name="Etage" class="form-select">
                        @for($i = 1; $i <= 6; $i++)
                            <option value="{{ $i }}" {{ old('Etage', (string)$camera->Etage) == (string)$i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="site" class="form-label">Site</label>
                    <select id="site" name="Site" class="form-select">
                        <option value="Siege" {{ old('Site', $camera->Site) == 'Siege' ? 'selected' : '' }}>Siège</option>
                        <option value="Annexe Abtal" {{ old('Site', $camera->Site) == 'Annexe Abtal' ? 'selected' : '' }}>Annexe Abtal</option>
                        <option value="Annexe Ayachi" {{ old('Site', $camera->Site) == 'Annexe Ayachi' ? 'selected' : '' }}>Annexe Ayachi</option>
                    </select>
                </div>

                <div class="col-12">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" name="Description" rows="4" class="form-control">{{ old('Description', $camera->Description) }}</textarea>
                    @error('Description')<div class="text-danger small">{{ $message }}</div>@enderror
                </div>

                <div class="col-12 d-flex justify-content-end gap-2">
                    <a href="{{ route('cameras.index') }}" class="btn btn-light border">Annuler</a>
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
