@extends('layouts.app')

@section('title', 'Ajouter une camera')

@section('main')
    <div class="container mt-4">
        <div class="card bg-gray-100 mb-4">
            <div class="card-body">
                <h1 class="h4 font-weight-bold leading-tight text-gray-900">Ajouter une camera</h1>
                <form action="{{ route('cameras.store') }}" method="POST" class="mt-4">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="nom" class="form-label">Nom :</label>
                            <input type="text" name="Nom_c" id="nom" class="form-control" placeholder="Nom de la caméra">
                            @error('Nom_c')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="etage" class="form-label">Étage :</label>
                            <select id="etage" name="Etage" class="form-select">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="site" class="form-label">Site :</label>
                        <select id="site" name="Site" class="form-select">
                            <option value="Siege">Siège</option>
                            <option value="Annexe Abtal">Annexe Abtal</option>
                            <option value="Annexe Ayachi">Annexe Ayachi</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description :</label>
                        <textarea id="description" name="Description" rows="4" class="form-control"
                                  placeholder="Entrez la description ici"></textarea>
                        @error('Description')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
