@extends('layouts.app')

@section('title', 'Tableau de bord')

@section('main')
<section class="space-y-6">
    <div class="bg-white rounded-3 shadow-sm border p-4 p-md-5">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
            <div>
                <h1 class="h3 mb-1 fw-bold text-dark">Tableau de bord {{ $user->role === 'admin' ? 'Administrateur' : 'Utilisateur' }}</h1>
                <p class="text-secondary mb-0">Bienvenue {{ $user->Nom_u }} {{ $user->Prenom_u }}. Voici une vue claire de votre activite.</p>
            </div>
            <span class="badge text-bg-{{ $user->role === 'admin' ? 'primary' : 'success' }} fs-6 px-3 py-2 text-uppercase">
                {{ $user->role }}
            </span>
        </div>
    </div>

    @if($user->role === 'admin')
        <div class="row g-3">
            <div class="col-12 col-md-6 col-xl-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <p class="text-secondary mb-2">Cameras</p>
                        <h2 class="h3 mb-0 fw-bold">{{ $totalCameras }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <p class="text-secondary mb-2">Employes</p>
                        <h2 class="h3 mb-0 fw-bold">{{ $totalEmployees }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <p class="text-secondary mb-2">Demandes</p>
                        <h2 class="h3 mb-0 fw-bold">{{ $totalDemandes }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <p class="text-secondary mb-2">Utilisateurs (admin/user)</p>
                        <h2 class="h3 mb-0 fw-bold">{{ $totalAdmins }} / {{ $totalUsers }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-12 col-xl-7">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white border-0 pt-4">
                        <h3 class="h5 mb-0 fw-semibold">Dernieres demandes</h3>
                    </div>
                    <div class="card-body pt-2">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Objet</th>
                                        <th>Employe</th>
                                        <th>Demandeur</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($recentDemandes as $demande)
                                        <tr>
                                            <td>#{{ $demande->Id_de }}</td>
                                            <td>{{ $demande->Objet }}</td>
                                            <td>{{ optional($demande->employe)->Nom_emp }} {{ optional($demande->employe)->Prenom_emp }}</td>
                                            <td>{{ optional($demande->userr)->Nom_u }} {{ optional($demande->userr)->Prenom_u }}</td>
                                            <td>{{ optional($demande->created_at)->format('d/m/Y') }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-secondary">Aucune demande disponible.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-xl-5">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white border-0 pt-4">
                        <h3 class="h5 mb-0 fw-semibold">Evolution des demandes (6 mois)</h3>
                    </div>
                    <div class="card-body">
                        <canvas
                            id="adminDemandesChart"
                            height="220"
                            data-labels='@json($chartLabels ?? [])'
                            data-values='@json($chartData ?? [])'
                        ></canvas>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row g-3">
            <div class="col-12 col-md-6 col-xl-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <p class="text-secondary mb-2">Mes demandes</p>
                        <h2 class="h3 mb-0 fw-bold">{{ $myTotalDemandes }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <p class="text-secondary mb-2">Demandes sauvegardees</p>
                        <h2 class="h3 mb-0 fw-bold">{{ $mySavedDemandes }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <p class="text-secondary mb-2">Ce mois-ci</p>
                        <h2 class="h3 mb-0 fw-bold">{{ $myDemandesThisMonth }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <p class="text-secondary mb-2">Cameras concernees</p>
                        <h2 class="h3 mb-0 fw-bold">{{ $myCamerasCount }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-12 col-xl-8">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white border-0 pt-4">
                        <h3 class="h5 mb-0 fw-semibold">Mes dernieres demandes</h3>
                    </div>
                    <div class="card-body pt-2">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Objet</th>
                                        <th>Employe</th>
                                        <th>Date operation</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($myRecentDemandes as $demande)
                                        <tr>
                                            <td>#{{ $demande->Id_de }}</td>
                                            <td>{{ $demande->Objet }}</td>
                                            <td>{{ optional($demande->employe)->Nom_emp }} {{ optional($demande->employe)->Prenom_emp }}</td>
                                            <td>{{ \Carbon\Carbon::parse($demande->Date_operation)->format('d/m/Y H:i') }}</td>
                                            <td>
                                                <a href="{{ route('demandes.show', $demande->Id_de) }}" class="btn btn-sm btn-outline-primary">Voir</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-secondary">Aucune demande disponible.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-xl-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white border-0 pt-4">
                        <h3 class="h5 mb-0 fw-semibold">Actions rapides</h3>
                    </div>
                    <div class="card-body d-grid gap-2">
                        <a href="{{ route('demandes.create') }}" class="btn btn-primary">Nouvelle demande</a>
                        <a href="{{ route('demandes.index') }}" class="btn btn-outline-secondary">Voir toutes mes demandes</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
</section>

@if($user->role === 'admin')
<script>
    const ctx = document.getElementById('adminDemandesChart');

    if (ctx) {
        const labels = JSON.parse(ctx.dataset.labels || '[]');
        const data = JSON.parse(ctx.dataset.values || '[]');

        if (labels.length) {
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Demandes',
                        data: data,
                        borderColor: 'rgb(37, 99, 235)',
                        backgroundColor: 'rgba(37, 99, 235, 0.12)',
                        borderWidth: 2,
                        tension: 0.3,
                        fill: true
                    }]
                },
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                precision: 0
                            }
                        }]
                    }
                }
            });
        }
    }
</script>
@endif
@endsection