{{-- resources/views/products.blade.php --}}
@extends('layouts.app')

@section('title', 'Boutique - High-Tech Center')

@section('content')
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h1 class="text-3xl font-bold text-tech-dark mb-4">Notre Boutique Tech</h1>
            <p class="text-gray-600 max-w-2xl mx-auto">Découvrez notre sélection de produits technologiques de qualité</p>
        </div>

        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Sidebar Catégories (à gauche) -->
            <div class="lg:w-1/4">
                <div class="bg-gray-50 rounded-xl p-6 sticky top-24">
                    <h3 class="text-lg font-bold text-tech-dark mb-6 flex items-center">
                        <i class="fas fa-filter mr-2 text-tech-blue"></i>
                        Catégories
                    </h3>

                    <div class="space-y-2">
                        <a href="{{ route('products') }}"
                           class="flex items-center justify-between px-4 py-3 rounded-lg transition-colors {{ !request('category') ? 'bg-tech-blue text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                            <span class="flex items-center">
                                <i class="fas fa-th-large mr-3"></i>
                                Tous les produits
                            </span>
                        </a>

                        @foreach($categories as $category)
                            <a href="{{ route('products', ['category' => $category->slug]) }}"
                               class="flex items-center justify-between px-4 py-3 rounded-lg transition-colors {{ request('category') == $category->slug ? 'bg-tech-blue text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                                <span class="flex items-center">
                                    @if($category->image)
                                        <img src="{{ asset('storage/' . $category->image) }}"
                                             alt="{{ $category->name }}"
                                             class="w-6 h-6 object-cover rounded mr-3">
                                    @else
                                        <i class="fas fa-tag mr-3"></i>
                                    @endif
                                    {{ $category->name }}
                                </span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Contenu principal (à droite) -->
            <div class="lg:w-3/4">
                <!-- En-tête avec informations -->
                <div class="mb-8">
                    <h2 class="text-xl font-semibold text-tech-dark">
                        @if(request('category'))
                            {{ $categories->firstWhere('slug', request('category'))->name ?? 'Catégorie' }}
                        @else
                            Tous les produits
                        @endif
                    </h2>
                    <p class="text-gray-600 text-sm">{{ $products->total() }} produit(s) trouvé(s)</p>
                </div>

                <!-- Products Grid -->
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($products as $product)
                        <div class="card-hover bg-gray-50 rounded-xl shadow-lg overflow-hidden">
                            @if($product->image)
                                <div class="h-48 bg-gray-200 overflow-hidden">
                                    <a href="{{ route('product.detail', $product->slug) }}">
                                        <img src="{{ asset('storage/' . $product->image) }}"
                                            alt="{{ $product->name }}"
                                            class="w-full h-full object-cover">
                                    </a>
                                </div>
                            @else
                                <div class="h-48 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                                    <i class="fas fa-image text-4xl text-gray-400"></i>
                                </div>
                            @endif

                            <div class="p-6">
                                <div class="text-xs text-tech-blue mb-2">{{ $product->category->name }}</div>
                                <h3 class="font-bold text-tech-dark mb-2">
                                    <a href="{{ route('product.detail', $product->slug) }}" class="hover:text-tech-blue transition-colors">
                                        {{ $product->name }}
                                    </a>
                                </h3>
                                <p class="text-gray-600 text-sm mb-4">{{ Str::limit($product->description, 80) }}</p>

                                <div class="flex items-center justify-between mb-3">
                                    <span class="text-2xl font-bold text-tech-green">{{ $product->formatted_price }}</span>
                                    <div class="flex gap-2">
                                        <a href="{{ route('product.detail', $product->slug) }}"
                                           class="bg-tech-blue text-white px-3 py-2 rounded-lg hover:bg-tech-blue/80 transition-colors text-sm">
                                            Détails
                                        </a>
                                        <a href="https://wa.me/22674910291?text=Bonjour! Je suis intéressé par {{ $product->name }} à {{ $product->formatted_price }}"
                                           class="bg-tech-green text-white px-3 py-2 rounded-lg hover:bg-tech-green/80 transition-colors text-sm">
                                            <i class="fab fa-whatsapp"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="mt-2 text-xs text-gray-500">
                                    Disponible en stock
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-12">
                            <i class="fas fa-shopping-bag text-6xl text-gray-300 mb-4"></i>
                            <h3 class="text-xl font-bold text-gray-500 mb-2">Aucun produit trouvé</h3>
                            <p class="text-gray-400">Essayez une autre catégorie ou revenez plus tard.</p>
                        </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                <div class="mt-12">
                    {{ $products->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
