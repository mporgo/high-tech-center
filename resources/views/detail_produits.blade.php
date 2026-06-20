{{-- resources/views/detail_produits.blade.php --}}
@extends('layouts.app')

@section('title', $product->name . ' - High-Tech Center')
@section('description', $product->excerpt ?? Str::limit($product->description, 160))

@section('content')
<!-- Breadcrumb -->
<div class="bg-gray-50 py-4">
    <div class="container mx-auto px-4">
        <nav class="flex items-center space-x-2 text-sm text-gray-600">
            <a href="{{ route('home') }}" class="hover:text-tech-blue">Accueil</a>
            <i class="fas fa-chevron-right text-xs"></i>
            <a href="{{ route('products') }}" class="hover:text-tech-blue">Boutique</a>
            <i class="fas fa-chevron-right text-xs"></i>
            <a href="{{ route('products', ['category' => $product->category->slug]) }}" class="hover:text-tech-blue">
                {{ $product->category->name }}
            </a>
            <i class="fas fa-chevron-right text-xs"></i>
            <span class="text-tech-dark font-medium">{{ $product->name }}</span>
        </nav>
    </div>
</div>

<section class="py-8 md:py-16">
    <div class="container mx-auto px-4">
        <div class="grid lg:grid-cols-2 gap-12">
            <!-- Galerie d'images -->
            <div class="space-y-4">
                <div class="bg-gray-100 rounded-2xl overflow-hidden">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}"
                             alt="{{ $product->name }}"
                             class="w-full h-96 md:h-[500px] object-cover"
                             id="mainImage">
                    @else
                        <div class="w-full h-96 md:h-[500px] flex items-center justify-center bg-gradient-to-br from-gray-100 to-gray-200">
                            <i class="fas fa-image text-8xl text-gray-400"></i>
                        </div>
                    @endif
                </div>

                <!-- Miniatures (si vous avez plusieurs images) -->
                {{-- <div class="grid grid-cols-4 gap-4">
                    @if($product->image)
                        <div class="bg-gray-100 rounded-lg overflow-hidden cursor-pointer border-2 border-tech-blue">
                            <img src="{{ asset('storage/' . $product->image) }}"
                                 alt="{{ $product->name }}"
                                 class="w-full h-20 object-cover">
                        </div>
                    @endif
                    <!-- Placeholder pour futures images supplémentaires -->
                    @for($i = 1; $i < 4; $i++)
                        <div class="bg-gray-100 rounded-lg h-20 flex items-center justify-center">
                            <i class="fas fa-image text-gray-300"></i>
                        </div>
                    @endfor
                </div> --}}
            </div>

            <!-- Informations du produit -->
            <div class="space-y-6">
                <!-- En-tête -->
                <div>
                    <span class="inline-block px-3 py-1 bg-tech-blue/10 text-tech-blue text-sm font-semibold rounded-full mb-4">
                        {{ $product->category->name }}
                    </span>
                    <h1 class="text-3xl md:text-4xl font-bold text-tech-dark mb-4">{{ $product->name }}</h1>

                    <!-- Évaluation -->
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="flex items-center space-x-1">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star text-yellow-400"></i>
                            @endfor
                        </div>
                        <span class="text-gray-600">(4.8/5)</span>
                        <span class="text-gray-400">•</span>
                        <span class="text-gray-600">45 avis</span>
                    </div>

                    <!-- Prix -->
                    <div class="mb-6">
                        <span class="text-4xl font-bold text-tech-green">{{ $product->formatted_price }}</span>
                        {{-- <span class="text-gray-400 line-through ml-4">{{ number_format($product->price * 1.15, 0, ',', ' ') }} FCFA</span>
                        <span class="bg-red-500 text-white text-sm px-2 py-1 rounded ml-2">-15%</span> --}}
                    </div>
                </div>

                <!-- Description -->
                <div class="prose prose-gray max-w-none">
                    <p class="text-gray-700 leading-relaxed">{{ $product->description }}</p>
                </div>

                <!-- Statut du stock -->
                {{-- <div class="border border-gray-200 rounded-lg p-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            @if($product->stock > 10)
                                <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                <span class="text-green-700 font-semibold">En stock</span>
                            @elseif($product->stock > 0)
                                <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                                <span class="text-yellow-700 font-semibold">Stock limité</span>
                            @else
                                <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                                <span class="text-red-700 font-semibold">Rupture de stock</span>
                            @endif
                        </div>
                        <span class="text-gray-600">{{ $product->stock }} unités disponibles</span>
                    </div>
                </div> --}}

                <!-- Actions -->
                <div class="space-y-4">
                    {{-- <div class="flex items-center space-x-4">
                        <label class="text-gray-700 font-medium">Quantité:</label>
                        <div class="flex items-center border border-gray-300 rounded-lg">
                            <button class="px-4 py-2 hover:bg-gray-100 transition-colors" onclick="decreaseQuantity()">-</button>
                            <span class="px-4 py-2 border-x border-gray-300" id="quantity">1</span>
                            <button class="px-4 py-2 hover:bg-gray-100 transition-colors" onclick="increaseQuantity()">+</button>
                        </div>
                    </div> --}}

                    <div class="flex flex-col md:flex-row gap-4">
                        <a href="https://wa.me/22674910291?text=Bonjour! Je souhaite commander {{ $product->name }} au prix de {{ $product->formatted_price }}. Merci!"
                           class="flex-1 bg-tech-green text-white px-8 py-4 rounded-lg font-semibold text-center hover:bg-tech-green/80 transition-colors">
                            <i class="fab fa-whatsapp mr-2"></i>Commander maintenant
                        </a>
                        {{-- <button class="bg-tech-blue text-white px-8 py-4 rounded-lg font-semibold hover:bg-tech-blue/80 transition-colors">
                            <i class="fas fa-heart mr-2"></i>Ajouter aux favoris
                        </button> --}}
                    </div>
                </div>

                <!-- Informations supplémentaires -->
                <div class="border-t border-gray-200 pt-6 space-y-4">
                    <div class="flex items-center space-x-4 text-gray-600">
                        <i class="fas fa-truck text-tech-blue"></i>
                        <span>Livraison gratuite à Bobo-Dioulasso</span>
                    </div>
                    {{-- <div class="flex items-center space-x-4 text-gray-600">
                        <i class="fas fa-shield-alt text-tech-blue"></i>
                        <span>Garantie fabricant 1 an</span>
                    </div>
                    <div class="flex items-center space-x-4 text-gray-600">
                        <i class="fas fa-sync-alt text-tech-blue"></i>
                        <span>Retour sous 7 jours</span>
                    </div>
                    <div class="flex items-center space-x-4 text-gray-600">
                        <i class="fas fa-headset text-tech-blue"></i>
                        <span>Support technique gratuit</span>
                    </div> --}}
                </div>

                <!-- Partage -->
                <div class="border-t border-gray-200 pt-6">
                    <h3 class="text-gray-700 font-medium mb-3">Partager ce produit:</h3>
                    <div class="flex items-center space-x-4">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                           target="_blank"
                           class="w-10 h-10 bg-blue-600 text-white rounded-full flex items-center justify-center hover:bg-blue-700 transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://wa.me/?text={{ urlencode($product->name . ' - ' . request()->fullUrl()) }}"
                           target="_blank"
                           class="w-10 h-10 bg-green-500 text-white rounded-full flex items-center justify-center hover:bg-green-600 transition-colors">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <button onclick="copyToClipboard()"
                                class="w-10 h-10 bg-gray-600 text-white rounded-full flex items-center justify-center hover:bg-gray-700 transition-colors">
                            <i class="fas fa-link"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Spécifications techniques -->
{{-- <section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-bold text-tech-dark mb-8 text-center">Spécifications techniques</h2>

        <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="grid md:grid-cols-2">
                <div class="p-8 space-y-4">
                    <div class="flex justify-between py-3 border-b border-gray-100">
                        <span class="font-medium text-gray-700">Marque</span>
                        <span class="text-gray-900">Premium Tech</span>
                    </div>
                    <div class="flex justify-between py-3 border-b border-gray-100">
                        <span class="font-medium text-gray-700">Modèle</span>
                        <span class="text-gray-900">{{ $product->name }}</span>
                    </div>
                    <div class="flex justify-between py-3 border-b border-gray-100">
                        <span class="font-medium text-gray-700">Catégorie</span>
                        <span class="text-gray-900">{{ $product->category->name }}</span>
                    </div>
                    <div class="flex justify-between py-3 border-b border-gray-100">
                        <span class="font-medium text-gray-700">Disponibilité</span>
                        <span class="text-gray-900">{{ $product->stock }} en stock</span>
                    </div>
                </div>

                <div class="p-8 bg-gray-50 space-y-4">
                    <div class="flex justify-between py-3 border-b border-gray-100">
                        <span class="font-medium text-gray-700">Garantie</span>
                        <span class="text-gray-900">12 mois</span>
                    </div>
                    <div class="flex justify-between py-3 border-b border-gray-100">
                        <span class="font-medium text-gray-700">Livraison</span>
                        <span class="text-gray-900">2-3 jours ouvrés</span>
                    </div>
                    <div class="flex justify-between py-3 border-b border-gray-100">
                        <span class="font-medium text-gray-700">Support</span>
                        <span class="text-gray-900">Inclus</span>
                    </div>
                    <div class="flex justify-between py-3 border-b border-gray-100">
                        <span class="font-medium text-gray-700">Retour</span>
                        <span class="text-gray-900">7 jours</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}

<!-- Produits similaires -->
@if($relatedProducts->count() > 0)
<section class="py-16">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-bold text-tech-dark mb-8 text-center">Produits similaires</h2>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($relatedProducts as $relatedProduct)
                <div class="card-hover bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
                    <div class="relative">
                        @if($relatedProduct->image)
                            <div class="h-48 bg-gray-200 overflow-hidden">
                                <img src="{{ asset('storage/' . $relatedProduct->image) }}"
                                     alt="{{ $relatedProduct->name }}"
                                     class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                            </div>
                        @else
                            <div class="h-48 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                                <i class="fas fa-image text-4xl text-gray-400"></i>
                            </div>
                        @endif
                    </div>

                    <div class="p-4">
                        <h3 class="font-bold text-tech-dark mb-2 hover:text-tech-blue transition-colors">
                            <a href="{{ route('product.detail', $relatedProduct->slug) }}">{{ $relatedProduct->name }}</a>
                        </h3>
                        <p class="text-gray-600 text-sm mb-3">
                            {{ Str::limit($relatedProduct->description, 60) }}
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-lg font-bold text-tech-green">{{ $relatedProduct->formatted_price }}</span>
                            <a href="{{ route('product.detail', $relatedProduct->slug) }}"
                               class="bg-tech-blue text-white px-3 py-1 rounded text-sm hover:bg-tech-blue/80 transition-colors">
                                Voir
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="text-center mt-8">
        <a href="{{ route('products') }}" class="bg-tech-blue text-white px-8 py-3 rounded-lg font-semibold hover:bg-tech-blue/80 transition-colors">
            Voir tous les produits
        </a>
    </div>
</section>
@endif

@push('scripts')
<script>
    /*let quantity = 1;
    const maxStock = {{ $product->stock }};

    function increaseQuantity() {
        if (quantity < maxStock) {
            quantity++;
            document.getElementById('quantity').textContent = quantity;
        }
    }

    function decreaseQuantity() {
        if (quantity > 1) {
            quantity--;
            document.getElementById('quantity').textContent = quantity;
        }
    }
*/
    function copyToClipboard() {
        navigator.clipboard.writeText(window.location.href).then(function() {
            alert('Lien copié dans le presse-papier !');
        });
    }

    // Changement d'image principale (si plusieurs images)
   /* function changeMainImage(src) {
        document.getElementById('mainImage').src = src;
    }*/
</script>
@endpush
@endsection
