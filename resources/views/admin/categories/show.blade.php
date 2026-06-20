{{-- resources/views/admin/categories/show.blade.php --}}
@extends('layouts.admin')

@section('title', 'Détails: ' . $category->name)

@section('content')
<div class="w-full max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Header -->
    <div class="flex flex-wrap items-center justify-between mb-6 gap-3">
        <div class="flex items-center flex-wrap gap-2">
            <a href="{{ route('admin.categories.index') }}" class="text-tech-blue hover:text-tech-blue/80">
                <i class="fas fa-arrow-left text-lg"></i>
            </a>
            <h2 class="text-xl sm:text-2xl font-bold text-tech-dark">
                {{ $category->name }}
            </h2>
        </div>
        <div class="flex flex-wrap gap-3">
            <a href="{{ route('admin.categories.edit', $category) }}"
               class="bg-tech-blue text-white px-4 py-2 rounded-lg hover:bg-tech-blue/80 transition-colors text-sm sm:text-base">
                <i class="fas fa-edit mr-2"></i>Modifier
            </a>
            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST"
                  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors text-sm sm:text-base w-full sm:w-auto">
                    <i class="fas fa-trash mr-2"></i>Supprimer
                </button>
            </form>
        </div>
    </div>

    <!-- Contenu -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Colonne principale -->
        <div class="md:col-span-2 space-y-6">
            <!-- Informations générales -->
            <div class="bg-white rounded-xl p-6 sm:p-8 shadow-lg">
                <h3 class="text-lg font-bold text-tech-dark mb-4">Informations générales</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Nom</label>
                        <p class="text-gray-900 break-words">{{ $category->name }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Slug</label>
                        <p class="text-gray-600 font-mono text-sm bg-gray-100 px-2 py-1 rounded break-all">{{ $category->slug }}</p>
                    </div>

                    @if($category->description)
                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-1">Description</label>
                            <p class="text-gray-900 break-words">{{ $category->description }}</p>
                        </div>
                    @endif

                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Statut</label>
                        <span class="px-3 py-1 text-sm font-semibold rounded-full {{ $category->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $category->is_active ? 'Actif' : 'Inactif' }}
                        </span>
                    </div>

                    <div class="flex flex-wrap gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-1">Créée le</label>
                            <p class="text-gray-900">{{ $category->created_at->format('d/m/Y à H:i') }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-1">Dernière modification</label>
                            <p class="text-gray-900">{{ $category->updated_at->format('d/m/Y à H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Produits -->
            <div class="bg-white rounded-xl p-6 sm:p-8 shadow-lg">
                <div class="flex flex-wrap items-center justify-between gap-2 mb-4">
                    <h3 class="text-lg font-bold text-tech-dark">
                        Produits ({{ $category->products->count() }})
                    </h3>
                    <a href="{{ route('admin.products.create') }}?category={{ $category->id }}"
                       class="text-tech-green hover:text-tech-green/80 text-sm sm:text-base">
                        <i class="fas fa-plus mr-1"></i>Ajouter un produit
                    </a>
                </div>

                @if($category->products->count() > 0)
                    <div class="space-y-3">
                        @foreach($category->products->take(5) as $product)
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between p-3 border border-gray-200 rounded-lg gap-3">
                                <div class="flex items-center gap-3">
                                    @if($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}"
                                             alt="{{ $product->name }}"
                                             class="w-12 h-12 object-cover rounded-lg">
                                    @else
                                        <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-image text-gray-400"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <p class="font-medium text-gray-900">{{ $product->name }}</p>
                                        <p class="text-sm text-gray-500">{{ $product->formatted_price }}</p>
                                    </div>
                                </div>

                                <div class="flex space-x-3 text-lg">
                                    <a href="{{ route('admin.products.show', $product) }}" class="text-tech-blue hover:text-tech-blue/80">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.products.edit', $product) }}" class="text-tech-green hover:text-tech-green/80">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach

                        @if($category->products->count() > 5)
                            <div class="text-center mt-4">
                                <a href="{{ route('admin.products.index') }}?category={{ $category->slug }}"
                                   class="text-tech-blue hover:text-tech-blue/80 text-sm sm:text-base">
                                    Voir tous les produits ({{ $category->products->count() }})
                                </a>
                            </div>
                        @endif
                    </div>
                @else
                    <div class="text-center py-8 text-gray-500">
                        <i class="fas fa-shopping-bag text-4xl mb-4"></i>
                        <p>Aucun produit dans cette catégorie</p>
                        <a href="{{ route('admin.products.create') }}?category={{ $category->id }}"
                           class="text-tech-blue hover:text-tech-blue/80 mt-2 inline-block">
                            Ajouter le premier produit
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
