@extends('layouts.app')

@section('title', 'Ajouter un utilisateur')

@section('main')
<section class="max-w-4xl mx-auto">
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4 p-lg-5">
            <h1 class="h3 fw-bold mb-4">Ajouter un utilisateur</h1>

            <form action="{{ route('users.store') }}" method="POST" class="row g-3">
                @csrf
                <div class="col-md-6">
                    <label for="PPR" class="form-label">PPR</label>
                    <input type="text" id="PPR" name="PPR" value="{{ old('PPR') }}" class="form-control">
                    @error('PPR')<div class="text-danger small">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label for="role" class="form-label">Role</label>
                    <select id="role" name="role" class="form-select">
                        <option value="user" {{ old('role') === 'user' ? 'selected' : '' }}>user</option>
                        <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>admin</option>
                    </select>
                    @error('role')<div class="text-danger small">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label for="Nom_u" class="form-label">Nom</label>
                    <input type="text" id="Nom_u" name="Nom_u" value="{{ old('Nom_u') }}" class="form-control">
                    @error('Nom_u')<div class="text-danger small">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label for="Prenom_u" class="form-label">Prénom</label>
                    <input type="text" id="Prenom_u" name="Prenom_u" value="{{ old('Prenom_u') }}" class="form-control">
                    @error('Prenom_u')<div class="text-danger small">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label for="username" class="form-label">Nom d'utilisateur</label>
                    <input type="text" id="username" name="username" value="{{ old('username') }}" class="form-control">
                    @error('username')<div class="text-danger small">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" id="password" name="password" class="form-control">
                    @error('password')<div class="text-danger small">{{ $message }}</div>@enderror
                </div>

                <div class="col-12 d-flex gap-2 justify-content-end">
                    <a href="{{ route('users.index') }}" class="btn btn-light border">Annuler</a>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
