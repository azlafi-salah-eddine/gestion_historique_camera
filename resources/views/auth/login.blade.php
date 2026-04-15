@extends('layouts.app-login')

@section('title', 'Connexion')

@section('main')
<div class="w-full max-w-md space-y-8 bg-white p-10 rounded-xl shadow-lg border border-gray-100">
    <div class="text-center">
        <img src="{{ asset('photos/logo-MSISF.png') }}" alt="Logo Ministere" class="mx-auto h-16 w-auto mb-4">
        <h2 class="mt-2 text-3xl font-extrabold text-gray-900 border-b pb-4">
            Gestion Historique Camera
        </h2>
        <p class="mt-2 text-sm text-gray-600 font-medium">
            Connectez-vous à votre compte.
        </p>
    </div>

    @if ($errors->any())
        <div class="bg-red-50 border-l-4 border-red-400 p-4 rounded-md">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-red-700">
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </p>
                </div>
            </div>
        </div>
    @endif

    <form class="mt-8 space-y-6" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="rounded-md shadow-sm -space-y-px">
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700">Nom d'utilisateur</label>
                <div class="mt-1">
                    <input id="username" name="username" type="text" autocomplete="username" required value="{{ old('username') }}"
                           class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="ex: testuser">
                </div>
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                <div class="mt-1">
                    <input id="password" name="password" type="password" autocomplete="current-password" required
                           class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="••••••••">
                </div>
            </div>
        </div>

        <div>
            <button type="submit" class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                Se connecter
            </button>
        </div>
    </form>
</div>
@endsection
