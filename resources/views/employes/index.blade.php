@extends('layouts.app')

@section('title', 'EMPLOYES')

@section('main')
<section class="max-w-7xl mx-auto">
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4 p-lg-5">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
                <div>
                    <h1 class="h3 fw-bold mb-1">Employés</h1>
                    <p class="text-secondary mb-0">Répertoire des employés et leurs entités.</p>
                </div>
                <a href="{{ route('employes.create') }}" class="btn btn-primary">Ajouter employé</a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>PPR</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Entité</th>
                        <th class="text-end">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($employes as $employe)
                        <tr>
                            <td>{{ $employe->Id_emp }}</td>
                            <td>{{ $employe->PPR }}</td>
                            <td>{{ $employe->Nom_emp }}</td>
                            <td>{{ $employe->Prenom_emp }}</td>
                            <td>{{ optional($employe->entiteAffectation)->Nom }}</td>
                            <td class="text-end">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('employes.show', $employe->Id_emp) }}" class="btn btn-outline-primary btn-sm">Voir</a>
                                    <a href="{{ route('employes.edit', $employe->Id_emp) }}" class="btn btn-outline-success btn-sm">Modifier</a>
                                    <form action="{{ route('employes.destroy', $employe->Id_emp) }}" method="POST" onsubmit="return confirm('Supprimer cet employé ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center text-secondary py-4">Aucun employé trouvé.</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
