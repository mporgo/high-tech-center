@extends('layouts.admin')

@section('title', 'Nouveau Produit')

@section('content')
<div class="max-w-4xl">
    <div class="flex items-center mb-6">
        <a href="{{ route('admin.products.index') }}" class="text-tech-blue hover:text-tech-blue/80 mr-4">
            <i class="fas fa-arrow-left"></i>
        </a>
        <h2 class="text-2xl font-bold text-tech-dark">Nouveau Produit</h2>
    </div>

    <div class="bg-white rounded-xl p-8 shadow-lg">
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-tech-dark mb-2">Nom du produit</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-tech-blue focus:border-transparent @error('name') border-red-300 @enderror">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-tech-dark mb-2">Catégorie</label>
                    <select name="category_id" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-tech-blue focus:border-transparent @error('category_id') border-red-300 @enderror">
                        <option value="">Sélectionner une catégorie</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid md:grid-cols-1 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-tech-dark mb-2">Prix (FCFA)</label>
                    <input type="number" name="price" value="{{ old('price') }}" required min="0" step="0.01"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-tech-blue focus:border-transparent @error('price') border-red-300 @enderror">
                    @error('price')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-tech-dark mb-2">Description</label>
                <textarea name="description" rows="4" required
                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-tech-blue focus:border-transparent @error('description') border-red-300 @enderror">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-tech-dark mb-2">Image du produit</label>
                <input type="file" name="image" accept="image/*"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-tech-blue focus:border-transparent @error('image') border-red-300 @enderror">
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
                <p class="text-sm text-gray-500 mt-1">Formats acceptés: JPEG, PNG, JPG, GIF (max 2MB)</p>
            </div>

            <div class="flex items-center">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                       class="h-4 w-4 text-tech-blue focus:ring-tech-blue border-gray-300 rounded">
                <label class="ml-2 block text-sm text-gray-900">Produit actif</label>
            </div>

            <div class="flex gap-4">
                <button type="submit" class="flex-1 bg-tech-blue text-white py-3 rounded-lg font-semibold hover:bg-tech-blue/80 transition-colors">
                    Créer le produit
                </button>
                <a href="{{ route('admin.products.index') }}" class="flex-1 bg-gray-200 text-tech-dark py-3 rounded-lg font-semibold hover:bg-gray-300 transition-colors text-center">
                    Annuler
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
