@extends('layouts.app')

@section('title', 'Détails de la demande')

@section('main')
    <div class="container py-5">
        <div class="card mb-5">
            <div class="card-header">
                <h3 class="card-title">Détails de la demande</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tbody>
                        <tr class="bg-light">
                            <th scope="row">ID de la demande</th>
                            <td>{{ $demande->Id_de }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Objet</th>
                            <td>{{ $demande->Objet }}</td>
                        </tr>
                        <tr class="bg-light">
                            <th scope="row">Référence</th>
                            <td>{{ $demande->Reff }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Employé</th>
                            <td>{{ $demande->employe->Nom_emp }} {{ $demande->employe->Prenom_emp }}</td>
                        </tr>
                        <tr class="bg-light">
                            <th scope="row">Date d'opération</th>
                            <td>{{ $demande->Date_operation }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Sauvegarde</th>
                            <td>{{ $demande->Sauvegarder ? 'Oui' : 'Non' }}</td>
                        </tr>
                        @if ($demande->Sauvegarder && $demande->But)
                            <tr class="bg-light">
                                <th scope="row">But</th>
                                <td>{{ $demande->But }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                <div class="text-right mt-4">
                    <a href="{{ route('demandes.index') }}" class="btn btn-primary">
                        Retour à la liste des demandes
                    </a>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Caméras concernées</h3>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    @foreach ($demande->concernes as $concerne)
                        <li class="list-group-item">
                            <h5 class="mb-1">{{ $concerne->camera->Nom_c }} | {{ $concerne->camera->Site }}</h5>
                            <p class="mb-1 text-muted">{{ $concerne->Debut_sauv }} - {{ $concerne->Fin_sauv }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
