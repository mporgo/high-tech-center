{{-- resources/views/admin/products/show.blade.php --}}
@extends('layouts.admin')

@section('title', 'Détails: ' . $product->name)

@section('content')
<div class="max-w-4xl">
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-6 space-y-4 md:space-y-0">
        <div class="flex items-center">
            <a href="{{ route('admin.products.index') }}" class="text-tech-blue hover:text-tech-blue/80 mr-4">
                <i class="fas fa-arrow-left text-lg"></i>
            </a>
            <h2 class="text-2xl font-bold text-tech-dark">{{ $product->name }}</h2>
        </div>
        <div class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-3">
            <a href="{{ route('products') }}?category={{ $product->category->slug }}"
                target="_blank"
                class="bg-tech-blue text-white px-4 py-2 rounded-lg hover:bg-tech-blue/80 transition-colors text-center">
                <i class="fas fa-eye mr-2"></i>
                Voir sur le site
            </a>
            <a href="{{ route('admin.products.edit', $product) }}" class="bg-tech-blue text-white px-4 py-2 rounded-lg hover:bg-tech-blue/80 transition-colors text-center">
                <i class="fas fa-edit mr-2"></i>Modifier
            </a>
            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline"
                  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="w-full bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors">
                    <i class="fas fa-trash mr-2"></i>Supprimer
                </button>
            </form>
        </div>
    </div>

    <div class="grid lg:grid-cols-3 gap-6">
        <!-- Informations principales -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-xl p-6 shadow-lg">
                <h3 class="text-lg font-bold text-tech-dark mb-4">Informations générales</h3>

                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Nom</label>
                        <p class="text-gray-900 font-medium">{{ $product->name }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Catégorie</label>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-tech-blue/10 text-tech-blue">
                            {{ $product->category->name }}
                        </span>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Prix</label>
                        <p class="text-2xl font-bold text-tech-green">{{ $product->formatted_price }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Statut</label>
                        <span class="px-3 py-1 text-sm font-semibold rounded-full {{ $product->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $product->is_active ? 'Actif' : 'Inactif' }}
                        </span>
                    </div>
                </div>

                <div class="mt-6">
                    <label class="block text-sm font-medium text-gray-500 mb-2">Description</label>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-gray-900">{{ $product->description }}</p>
                    </div>
                </div>
            </div>

            <!-- Métadonnées -->
            <div class="bg-white rounded-xl p-6 shadow-lg">
                <h3 class="text-lg font-bold text-tech-dark mb-4">Informations système</h3>

                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Créé le</label>
                        <p class="text-gray-900">{{ $product->created_at->format('d/m/Y à H:i') }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Dernière modification</label>
                        <p class="text-gray-900">{{ $product->updated_at->format('d/m/Y à H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Image -->
            <div class="bg-white rounded-xl p-6 shadow-lg">
                <h3 class="text-lg font-bold text-tech-dark mb-4">Image du produit</h3>

                @if($product->image)
                    <div class="text-center">
                        <img src="{{ asset('storage/' . $product->image) }}"
                             alt="{{ $product->name }}"
                             class="w-full rounded-lg shadow-md">
                    </div>
                @else
                    <div class="text-center py-8 text-gray-500">
                        <i class="fas fa-image text-4xl mb-4"></i>
                        <p>Aucune image</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
