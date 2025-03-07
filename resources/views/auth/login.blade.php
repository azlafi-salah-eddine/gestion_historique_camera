@extends('layouts.app-login')

@section('title', 'Connexion')

@section('main')
    <div class="mt-4 mb-5  text-center">
        <img src="photos/logo-MSISF.png" class="mx-auto d-block" style="max-width: 300px;" alt="Logo">
    </div>

    <section class="mx-auto bg-white p-4 rounded shadow-sm" style="max-width: 500px;">
        <div class="m-4">
            <h1 class="h4 mb-4 text-center">Connexion</h1>

            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <strong>Erreur !</strong> Il y a un problème avec vos informations d'identification.
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="username" class="form-label">Nom d'utilisateur</label>
                    <input id="username" type="text" name="username" value="{{ old('username') }}" required autofocus
                           class="form-control @error('username') is-invalid @enderror">
                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                           class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100">Se connecter</button>
            </form>
        </div>
    </section>
@endsection
