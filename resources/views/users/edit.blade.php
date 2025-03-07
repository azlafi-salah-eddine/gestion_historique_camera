@extends('layouts.app')

@section('title', 'Modifier un utilisateur')

@section('main')
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h1 class="h2 font-weight-bold mb-4">Modifier un utilisateur</h1>
                <form action="{{ route('users.update', $user->Id_u) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="PPR" class="form-label">PPR:</label>
                        <input type="text" id="PPR" name="PPR" value="{{ $user->PPR }}" class="form-control">
                        @error('PPR')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Nom_u" class="form-label">Nom:</label>
                        <input type="text" id="Nom_u" name="Nom_u" value="{{ $user->Nom_u }}" class="form-control">
                        @error('Nom_u')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Prenom_u" class="form-label">Prénom:</label>
                        <input type="text" id="Prenom_u" name="Prenom_u" value="{{ $user->Prenom_u }}" class="form-control">
                        @error('Prenom_u')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Nom d'utilisateur:</label>
                        <input type="text" id="username" name="username" value="{{ $user->username }}" class="form-control">
                        @error('username')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe (laisser vide pour ne pas changer):</label>
                        <input type="password" id="password" name="password" class="form-control">
                        @error('password')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </form>
            </div>
        </div>
    </div>
@endsection
