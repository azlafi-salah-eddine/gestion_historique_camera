<?php use Illuminate\Support\Facades\Auth; ?>

<style>
    /* Remove the default dropdown arrow */
    .navbar-nav .dropdown-toggle::after {
        display: none;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('photos/logo-MSISF.png') }}" style="height: 70px; width: auto;" alt="Logo">
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('index') }}">Home</a>
                </li>
                @if (Auth::check() && Auth::user()->role == 'admin')
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="cameraDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Camera
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="cameraDropdown">
                        <li><a class="dropdown-item" href="{{ route('cameras.index') }}">Liste</a></li>
                        <li><a class="dropdown-item" href="{{ route('cameras.create') }}">Ajouter</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="employeDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Employé
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="employeDropdown">
                        <li><a class="dropdown-item" href="{{ route('employes.index') }}">Liste</a></li>
                        <li><a class="dropdown-item" href="{{ route('employes.create') }}">Ajouter</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="usersDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Utilisateurs
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="usersDropdown">
                        <li><a class="dropdown-item" href="{{ route('users.index') }}">Liste</a></li>
                        <li><a class="dropdown-item" href="{{ route('users.create') }}">Ajouter</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="entiteDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Entité Affectation
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="entiteDropdown">
                        <li><a class="dropdown-item" href="{{ route('entitesAffectation.index') }}">Liste</a></li>
                        <li><a class="dropdown-item" href="{{ route('entitesAffectation.create') }}">Ajouter</a></li>
                    </ul>
                </li>
                @endif
                @if (Auth::check() && Auth::user()->role == 'user')
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="demandeDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Demande
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="demandeDropdown">
                        <li><a class="dropdown-item" href="{{ route('demandes.index') }}">Liste</a></li>
                        <li><a class="dropdown-item" href="{{ route('demandes.create') }}">Ajouter</a></li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('photos/Profile-Avatar-PNG.png') }}" class="rounded-circle" style="width: 30px;" alt="user photo">
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    @if (auth()->check())
                        <li class="dropdown-item">
                            <span>{{ Auth::user()->Nom_u }}</span>
                            <br>
                            <span>{{ Auth::user()->username }}</span>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('users.edit', Auth::user()->Id_u) }}">Settings</a></li>
                        <li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        </li>
                    @else
                        <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                    @endif
                </ul>
            </li>
        </ul>
    </div>
</nav>

<script>
    // Toggle dropdown menu
    document.getElementById('user-menu-button').addEventListener('click', function() {
        document.getElementById('user-dropdown').classList.toggle('hidden');
    });

    // Toggle camera dropdown
    document.getElementById('camera-menu-button').addEventListener('click', function() {
        document.getElementById('camera-dropdown').classList.toggle('hidden');
    });

    // Toggle employe dropdown
    document.getElementById('employe-menu-button').addEventListener('click', function() {
        document.getElementById('employe-dropdown').classList.toggle('hidden');
    });

    // Toggle entite dropdown
    document.getElementById('entite-menu-button').addEventListener('click', function() {
        document.getElementById('entite-dropdown').classList.toggle('hidden');
    });

    // Toggle demande dropdown
    document.getElementById('demande-menu-button').addEventListener('click', function() {
        document.getElementById('demande-dropdown').classList.toggle('hidden');
    });
</script>
