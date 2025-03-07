@extends('layouts.app')

@section('title', 'DÉTAILS EMPLOYÉ')

@section('main')
    <section class="row pt-4">
        <div class="col-md-4 p-4 bg-white rounded-lg shadow-md">
            <div class="d-flex flex-column align-items-center">
                <div class="d-flex justify-content-center align-items-center w-100 h-44 border border-4 border-secondary">
                    <img src="{{ asset('photos/Profile-Avatar-PNG.png') }}" style="height: 200px" alt="Profile Avatar" class="img-fluid rounded">
                </div>

                <div class="d-flex flex-column text-center">
                    <h2 class="h4 font-weight-bold">{{ $employe->Nom_emp }} {{ $employe->Prenom_emp }}</h2>
                    <span class="text-sm text-secondary">{{ $employe->PPR }}</span>
                </div>
                <div>
                    <span class="d-flex align-items-center flex-wrap">
                        <span>{{ $employe->entiteAffectation->Nom }}</span>
                    </span>
                </div>
            </div>
        </div>

        <!-- Tableau des demandes -->
        <div class="col-md-8 bg-white rounded-lg shadow-md border p-4">
            <h1 class="h2 font-weight-bold text-gray-900">Demandes de l'employé</h1>
            <div class="table-responsive mt-4">
                <table class="table table-striped table-hover">
                    <thead class="bg-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Objet</th>
                        <th scope="col">Référence</th>
                        <th scope="col">Date d'opération</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($demandes as $demande)
                        <tr>
                            <td>{{ $demande->Id_de }}</td>
                            <td>{{ $demande->Objet }}</td>
                            <td>{{ $demande->Reff }}</td>
                            <td>{{ $demande->Date_operation }}</td>
                        </tr>
                    @endforeach
                    @empty($demandes)
                        <tr>
                            <td colspan="5" class="text-center">Aucune demande trouvée pour cet employé.</td>
                        </tr>
                    @endempty
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
