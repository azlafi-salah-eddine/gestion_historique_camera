@extends('layouts.app')

@section('title', 'Profil de l\'utilisateur')

@section('main')
<section class="max-w-4xl mx-auto">
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4 p-lg-5">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                    <h1 class="h3 fw-bold mb-1">Profil utilisateur</h1>
                    <p class="text-secondary mb-0">Détails du compte sélectionné.</p>
                </div>
                <span class="badge text-bg-{{ $user->role === 'admin' ? 'primary' : 'secondary' }}">{{ $user->role }}</span>
            </div>

            <div class="row g-3 mt-1">
                <div class="col-md-6"><strong>PPR:</strong> {{ $user->PPR }}</div>
                <div class="col-md-6"><strong>Nom:</strong> {{ $user->Nom_u }} {{ $user->Prenom_u }}</div>
                <div class="col-md-6"><strong>Nom d'utilisateur:</strong> {{ $user->username }}</div>
                <div class="col-md-6"><strong>Role:</strong> {{ $user->role }}</div>
            </div>

            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="{{ route('users.index') }}" class="btn btn-light border">Retour</a>
                <a href="{{ route('users.edit', $user->Id_u) }}" class="btn btn-success">Modifier</a>
                <form action="{{ route('users.destroy', $user->Id_u) }}" method="POST" onsubmit="return confirm('Supprimer cet utilisateur ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
