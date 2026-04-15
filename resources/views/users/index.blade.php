@extends('layouts.app')

@section('title', 'Liste des utilisateurs')

@section('main')
<section class="max-w-7xl mx-auto">
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4 p-lg-5">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
                <div>
                    <h1 class="h3 fw-bold mb-1">Utilisateurs</h1>
                    <p class="text-secondary mb-0">Gestion des comptes admin et user.</p>
                </div>
                <a href="{{ route('users.create') }}" class="btn btn-primary">Ajouter un utilisateur</a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                    <tr>
                        <th>PPR</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Role</th>
                        <th>Nom d'utilisateur</th>
                        <th class="text-end">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{ $user->PPR }}</td>
                            <td>{{ $user->Nom_u }}</td>
                            <td>{{ $user->Prenom_u }}</td>
                            <td><span class="badge text-bg-{{ $user->role === 'admin' ? 'primary' : 'secondary' }}">{{ $user->role }}</span></td>
                            <td>{{ $user->username }}</td>
                            <td class="text-end">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('users.show', $user->Id_u) }}" class="btn btn-outline-primary btn-sm">Voir</a>
                                    <a href="{{ route('users.edit', $user->Id_u) }}" class="btn btn-outline-success btn-sm">Modifier</a>
                                    <form action="{{ route('users.destroy', $user->Id_u) }}" method="POST" onsubmit="return confirm('Supprimer cet utilisateur ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center text-secondary py-4">Aucun utilisateur trouvé.</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
