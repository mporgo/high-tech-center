@extends('layouts.admin')

@section('title', 'Nouvelle Catégorie')

@section('content')
<div class="w-full max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Header -->
    <div class="flex flex-wrap items-center justify-between mb-6 gap-3">
        <div class="flex items-center">
            <a href="{{ route('admin.categories.index') }}" class="text-tech-blue hover:text-tech-blue/80 mr-3">
                <i class="fas fa-arrow-left text-lg"></i>
            </a>
            <h2 class="text-2xl font-bold text-tech-dark">Nouvelle Catégorie</h2>
        </div>
    </div>

    <!-- Formulaire -->
    <div class="bg-white rounded-xl p-6 sm:p-8 shadow-lg">
        <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Nom -->
            <div>
                <label class="block text-sm font-semibold text-tech-dark mb-2">Nom de la catégorie</label>
                <input type="text" name="name" value="{{ old('name') }}" required
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-tech-blue focus:border-transparent @error('name') border-red-300 @enderror">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label class="block text-sm font-semibold text-tech-dark mb-2">Description</label>
                <textarea name="description" rows="3"
                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-tech-blue focus:border-transparent @error('description') border-red-300 @enderror">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Actif -->
            <div class="flex items-center">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                       class="h-4 w-4 text-tech-blue focus:ring-tech-blue border-gray-300 rounded">
                <label class="ml-2 block text-sm text-gray-900">Catégorie active</label>
            </div>

            <!-- Boutons -->
            <div class="flex flex-col sm:flex-row gap-4">
                <button type="submit" class="flex-1 bg-tech-blue text-white py-3 rounded-lg font-semibold hover:bg-tech-blue/80 transition-colors">
                    <i class="fas fa-plus-circle mr-2"></i>Créer la catégorie
                </button>
                <a href="{{ route('admin.categories.index') }}" class="flex-1 bg-gray-200 text-tech-dark py-3 rounded-lg font-semibold hover:bg-gray-300 transition-colors text-center">
                    <i class="fas fa-times mr-2"></i>Annuler
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
