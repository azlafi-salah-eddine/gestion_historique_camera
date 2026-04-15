@extends('layouts.app')

@section('title', 'Liste des caméras')

@section('main')
<section class="max-w-7xl mx-auto">
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4 p-lg-5">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
                <div>
                    <h1 class="h3 fw-bold mb-1">Caméras</h1>
                    <p class="text-secondary mb-0">Liste complète des caméras installées.</p>
                </div>
                <a href="{{ route('cameras.create') }}" class="btn btn-primary">Ajouter caméra</a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Site</th>
                        <th>Étage</th>
                        <th>Description</th>
                        <th class="text-end">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($cameras as $camera)
                        <tr>
                            <td>{{ $camera->Id_c }}</td>
                            <td>{{ $camera->Nom_c }}</td>
                            <td>{{ $camera->Site }}</td>
                            <td>{{ $camera->Etage }}</td>
                            <td>{{ strlen($camera->Description) > 60 ? substr($camera->Description, 0, 60) . '...' : $camera->Description }}</td>
                            <td class="text-end">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('cameras.edit', $camera->Id_c) }}" class="btn btn-outline-success btn-sm">Modifier</a>
                                    <form action="{{ route('cameras.destroy', $camera->Id_c) }}" method="POST" onsubmit="return confirm('Supprimer cette caméra ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center text-secondary py-4">Aucune caméra trouvée.</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
