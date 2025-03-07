@extends('layouts.app')

@section('title', 'Modifier une camera')

@section('main')
    <div class="container mt-4">
        <div class="card bg-gray-100">
            <div class="card-body">
                <h1 class="h4 font-weight-bold text-gray-900">Modifier une camera</h1>
                <form action="{{ route('cameras.update', $camera->Id_c) }}" method="POST" class="mt-4">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="nom" class="form-label">Nom :</label>
                            <input type="text" name="Nom_c" id="nom" class="form-control" placeholder="Nom de la caméra"
                                   value="{{ old('Nom_c', $camera->Nom_c) }}">
                            @error('Nom_c')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="etage" class="form-label">Étage :</label>
                            <select id="etage" name="Etage" class="form-select">
                                <option value="1" {{ old('Etage', $camera->Etage) == '1' ? 'selected' : '' }}>1</option>
                                <option value="2" {{ old('Etage', $camera->Etage) == '2' ? 'selected' : '' }}>2</option>
                                <option value="3" {{ old('Etage', $camera->Etage) == '3' ? 'selected' : '' }}>3</option>
                                <option value="4" {{ old('Etage', $camera->Etage) == '4' ? 'selected' : '' }}>4</option>
                                <option value="5" {{ old('Etage', $camera->Etage) == '5' ? 'selected' : '' }}>5</option>
                                <option value="6" {{ old('Etage', $camera->Etage) == '6' ? 'selected' : '' }}>6</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="site" class="form-label">Site :</label>
                        <select id="site" name="Site" class="form-select">
                            <option value="Siege" {{ old('Site', $camera->Site) == 'Siege' ? 'selected' : '' }}>Siège</option>
                            <option value="Annexe Abtal" {{ old('Site', $camera->Site) == 'Annexe Abtal' ? 'selected' : '' }}>Annexe Abtal</option>
                            <option value="Annexe Ayachi" {{ old('Site', $camera->Site) == 'Annexe Ayachi' ? 'selected' : '' }}>Annexe Ayachi</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description :</label>
                        <textarea id="description" name="Description" rows="4" class="form-control"
                                  placeholder="Entrez la description ici">{{ old('Description', $camera->Description) }}</textarea>
                        @error('Description')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
