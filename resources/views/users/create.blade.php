@extends('layouts.app')

@section('title', 'Ajouter un utilisateur')

@section('main')
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h1 class="h2 font-weight-bold mb-4">Ajouter un utilisateur</h1>
                @if ($errors->any())
                    <div class="text-red-600">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="PPR" class="form-label">PPR:</label>
                        <input type="text" id="PPR" name="PPR" class="form-control">
                        @error('PPR')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Nom_u" class="form-label">Nom:</label>
                        <input type="text" id="Nom_u" name="Nom_u" class="form-control">
                        @error('Nom_u')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Prenom_u" class="form-label">Prénom:</label>
                        <input type="text" id="Prenom_u" name="Prenom_u" class="form-control">
                        @error('Prenom_u')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Nom d'utilisateur:</label>
                        <input type="text" id="username" name="username" class="form-control">
                        @error('username')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe:</label>
                        <input type="password" id="password" name="password" class="form-control">
                        @error('password')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
@endsection
