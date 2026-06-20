@extends('layouts.app')

@section('title', 'Connexion - High-Tech Center')

@section('content')
<div class="min-h-screen bg-gray-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <div class="text-center">
            <div class="w-16 h-16 bg-gradient-to-r from-tech-blue to-tech-green rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-shield-alt text-white text-2xl"></i>
            </div>
            <h2 class="text-3xl font-bold text-tech-dark">Administration</h2>
            <p class="text-gray-600 mt-2">Connexion sécurisée</p>
        </div>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
            <form class="space-y-6" method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">
                        Adresse email
                    </label>
                    <div class="mt-1">
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
                               class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-tech-blue focus:border-tech-blue @error('email') border-red-300 @enderror">
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">
                        Mot de passe
                    </label>
                    <div class="mt-1">
                        <input id="password" name="password" type="password" required
                               class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-tech-blue focus:border-tech-blue @error('password') border-red-300 @enderror">
                        @error('password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}
                               class="h-4 w-4 text-tech-blue focus:ring-tech-blue border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-900">
                            Se souvenir de moi
                        </label>
                    </div>
                </div>

                <div>
                    <button type="submit"
                            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-tech-blue hover:bg-tech-blue/80 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-tech-blue">
                        Se connecter
                    </button>
                </div>
            </form>

            <div class="mt-6">
                <div class="text-center">
                    <a href="{{ route('home') }}" class="text-tech-blue hover:text-tech-green">
                        ← Retour au site
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
