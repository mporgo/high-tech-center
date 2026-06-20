@extends('layouts.app')

@section('title', 'High-Tech Center - Votre magasin tech')

@section('content')
<!-- Hero Section -->
<section class="relative text-white py-20">
    <div class="absolute inset-0">
        <img src="{{ asset('images/machine.jpg') }}"
            alt="High Tech Background"
            class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black/50"></div>
    </div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="fade-in">
                <h1 class="text-4xl md:text-5xl font-bold mb-6">High-Tech Center</h1>
                <p class="text-xl mb-4 opacity-90">Votre magasin de matériel informatique et électroménager.</p>
                <p class="text-lg mb-8 opacity-80">
                    Bienvenue chez High-Tech Center ! Découvrez nos produits tech, nos solutions digitales et bien plus encore.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('products') }}" class="bg-white text-tech-blue px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors text-center">
                        Découvrir nos produits
                    </a>
                    <a href="#services" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-tech-blue transition-colors text-center">
                        Nos services
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-tech-dark mb-4">Pourquoi choisir High-Tech Center ?</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Nous combinons expertise technique, innovation et service client exceptionnel</p>
            </div>

            <div class="grid md:grid-cols-4 gap-8">
                <div class="text-center card-hover bg-gray-50 p-6 rounded-xl">
                    <div class="w-16 h-16 bg-tech-blue/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-rocket text-tech-blue text-2xl"></i>
                    </div>
                    <h3 class="font-semibold text-tech-dark mb-2">Innovation</h3>
                    <p class="text-gray-600 text-sm">Solutions technologiques de pointe</p>
                </div>

                <div class="text-center card-hover bg-gray-50 p-6 rounded-xl">
                    <div class="w-16 h-16 bg-tech-green/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-graduation-cap text-tech-green text-2xl"></i>
                    </div>
                    <h3 class="font-semibold text-tech-dark mb-2">Formation</h3>
                    <p class="text-gray-600 text-sm">Programmes éducatifs personnalisés</p>
                </div>

                <div class="text-center card-hover bg-gray-50 p-6 rounded-xl">
                    <div class="w-16 h-16 bg-tech-blue/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-headset text-tech-blue text-2xl"></i>
                    </div>
                    <h3 class="font-semibold text-tech-dark mb-2">Support 24/7</h3>
                    <p class="text-gray-600 text-sm">Assistance technique continue</p>
                </div>

                <div class="text-center card-hover bg-gray-50 p-6 rounded-xl">
                    <div class="w-16 h-16 bg-tech-green/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-shield-alt text-tech-green text-2xl"></i>
                    </div>
                    <h3 class="font-semibold text-tech-dark mb-2">Qualité</h3>
                    <p class="text-gray-600 text-sm">Produits certifiés et garantis</p>
                </div>
            </div>
        </div>
    </section>
<!-- About Section -->
    <section id="about" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-bold text-tech-dark mb-6">À propos d'High-Tech Center</h2>
                    <p class="text-gray-600 mb-6">
                        Nous sommes une entreprise innovante spécialisée dans la transformation numérique,
                        l'éducation technologique et la vente de produits high-tech. Notre mission est
                        d'accompagner particuliers et entreprises dans leur évolution digitale.
                    </p>

                    <div class="space-y-4 mb-8">
                        <div class="flex items-start space-x-3">
                            <i class="fas fa-eye text-tech-blue mt-1"></i>
                            <div>
                                <h4 class="font-semibold text-tech-dark">Vision</h4>
                                <p class="text-gray-600 text-sm">Démocratiser l'accès aux technologies numériques en Afrique</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-3">
                            <i class="fas fa-bullseye text-tech-green mt-1"></i>
                            <div>
                                <h4 class="font-semibold text-tech-dark">Mission</h4>
                                <p class="text-gray-600 text-sm">Fournir des solutions digitales innovantes et accessibles</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-3">
                            <i class="fas fa-heart text-tech-blue mt-1"></i>
                            <div>
                                <h4 class="font-semibold text-tech-dark">Valeurs</h4>
                                <p class="text-gray-600 text-sm">Excellence, Innovation, Intégrité, Service client</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-lg">
                    <div class="text-center">
                        <div class="w-24 h-24 bg-gradient-to-r from-tech-blue to-tech-green rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-user text-white text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-tech-dark mb-2">Jedidia Y.S Kambou</h3>
                        <p class="text-tech-blue font-semibold mb-4">Fondateur </p>
                        <p class="text-gray-600 text-sm mb-6">
                            Passionné par l'innovation éducative et la transformation numérique locale,
                            Jedidia apporte son expertise technique pour révolutionner l'écosystème digital africain.
                        </p>
                        <div class="flex justify-center space-x-4">
                            <a href="#" class="text-tech-blue hover:text-tech-green transition-colors">
                                <i class="fab fa-linkedin text-xl"></i>
                            </a>
                            <a href="#" class="text-tech-blue hover:text-tech-green transition-colors">
                                <i class="fab fa-facebook text-xl"></i>
                            </a>
                            <a href="https://wa.me/22674910291" class="text-tech-blue hover:text-tech-green transition-colors">
                                <i class="fab fa-whatsapp text-xl"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- Products Section -->
@if($products->count() > 0)
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-tech-dark mb-4">Nos Produits Phares</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Découvrez notre sélection de produits technologiques de qualité</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($products as $product)
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
                    <a href="{{ route('product.detail', $product->slug) }}">
                        <h3 class="font-bold text-tech-dark mb-2">{{ $product->name }}</h3>
                    </a>
                    <p class="text-gray-600 text-sm mb-4">{{ Str::limit($product->description, 80) }}</p>
                    <div class="flex items-center justify-between">
                        <span class="text-2xl font-bold text-tech-green">{{ $product->formatted_price }}</span>
                        <a href="https://wa.me/22674910291?text=Bonjour! Je suis intéressé par {{ $product->name }} à {{ $product->formatted_price }}"
                           class="bg-tech-green text-white px-4 py-2 rounded-lg hover:bg-tech-green/80 transition-colors">
                            <i class="fab fa-whatsapp mr-2"></i>Commander
                        </a>
                    </div>
                    <div class="mt-2 text-xs text-gray-500">
                        Disponible en stock
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-8">
            <a href="{{ route('products') }}" class="bg-tech-blue text-white px-8 py-3 rounded-lg font-semibold hover:bg-tech-blue/80 transition-colors">
                Voir tous les produits
            </a>
        </div>
    </div>
</section>
@endif
<!-- Services Section -->
    <section id="services" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-tech-dark mb-4">Nos Services</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Solutions complètes pour votre transformation digitale</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="card-hover bg-white rounded-xl p-8 shadow-lg">
                    <div class="w-16 h-16 bg-tech-blue/10 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-code text-tech-blue text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-tech-dark mb-4">Développement Web & Mobile</h3>
                    <p class="text-gray-600 mb-6">
                        Création d'applications web et mobiles sur mesure avec les dernières technologies.
                    </p>
                    <ul class="text-sm text-gray-600 space-y-2">
                        <li>• Sites web responsives</li>
                        <li>• Applications mobiles iOS/Android</li>
                        <li>• E-commerce et plateformes</li>
                        <li>• API et intégrations</li>
                    </ul>
                </div>

                <div class="card-hover bg-white rounded-xl p-8 shadow-lg">
                    <div class="w-16 h-16 bg-tech-green/10 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-digital-tachograph text-tech-green text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-tech-dark mb-4">Digitalisation des Processus</h3>
                    <p class="text-gray-600 mb-6">
                        Audit, conseil et développement pour optimiser vos processus métier.
                    </p>
                    <ul class="text-sm text-gray-600 space-y-2">
                        <li>• Audit digital complet</li>
                        <li>• Conseil en transformation</li>
                        <li>• Automatisation des tâches</li>
                        <li>• Maintenance et support</li>
                    </ul>
                </div>

                <div class="card-hover bg-white rounded-xl p-8 shadow-lg">
                    <div class="w-16 h-16 bg-tech-blue/10 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-chalkboard-teacher text-tech-blue text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-tech-dark mb-4">Formations sur Mesure</h3>
                    <p class="text-gray-600 mb-6">
                        Programmes de formation adaptés à vos besoins spécifiques.
                    </p>
                    <ul class="text-sm text-gray-600 space-y-2">
                        <li>• Microsoft Office avancé</li>
                        <li>• Intelligence Artificielle</li>
                        <li>• Création de contenus</li>
                        <li>• WordPress et outils web</li>
                    </ul>
                </div>

                <div class="card-hover bg-white rounded-xl p-8 shadow-lg">
                    <div class="w-16 h-16 bg-tech-green/10 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-school text-tech-green text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-tech-dark mb-4">Solutions Éducatives</h3>
                    <p class="text-gray-600 mb-6">
                        Plateformes numériques pour établissements éducatifs.
                    </p>
                    <ul class="text-sm text-gray-600 space-y-2">
                        <li>• Plateformes e-learning</li>
                        <li>• Gestion scolaire</li>
                        <li>• Outils pédagogiques</li>
                        <li>• Formation des enseignants</li>
                    </ul>
                </div>

                <div class="card-hover bg-white rounded-xl p-8 shadow-lg">
                    <div class="w-16 h-16 bg-tech-blue/10 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-store text-tech-blue text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-tech-dark mb-4">Solutions Commerciales</h3>
                    <p class="text-gray-600 mb-6">
                        Systèmes numériques pour commerces et entreprises.
                    </p>
                    <ul class="text-sm text-gray-600 space-y-2">
                        <li>• Points de vente (POS)</li>
                        <li>• Gestion d'inventaire</li>
                        <li>• CRM et marketing</li>
                        <li>• Analytics et reporting</li>
                    </ul>
                </div>

                <div class="card-hover bg-white rounded-xl p-8 shadow-lg">
                    <div class="w-16 h-16 bg-tech-green/10 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-cloud text-tech-green text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-tech-dark mb-4">Solutions Cloud</h3>
                    <p class="text-gray-600 mb-6">
                        Migration et gestion d'infrastructures cloud sécurisées.
                    </p>
                    <ul class="text-sm text-gray-600 space-y-2">
                        <li>• Migration vers le cloud</li>
                        <li>• Sauvegarde automatique</li>
                        <li>• Sécurité des données</li>
                        <li>• Monitoring 24/7</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

<!-- Blog Section -->
@if($blogPosts->count() > 0)
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-tech-dark mb-4">Blog Tech</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Actualités, astuces et conseils en technologie</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @foreach($blogPosts as $post)
            <article class="card-hover bg-gray-50 rounded-xl overflow-hidden">
                @if($post->image)
                    <div class="h-48 bg-gray-200 overflow-hidden">
                        <img src="{{ asset('storage/' . $post->image) }}"
                             alt="{{ $post->title }}"
                             class="w-full h-full object-cover">
                    </div>
                @else
                    <div class="h-48 bg-gradient-to-br from-tech-blue to-tech-green flex items-center justify-center">
                        <i class="fas fa-blog text-white text-4xl"></i>
                    </div>
                @endif

                <div class="p-6">
                    <div class="text-sm text-tech-blue mb-2">{{ $post->published_at->format('d M Y') }}</div>
                    <h3 class="font-bold text-tech-dark mb-3">{{ $post->title }}</h3>
                    <p class="text-gray-600 text-sm mb-4">{{ Str::limit($post->excerpt, 100) }}</p>
                    <a href="{{ route('blog.post', $post->slug) }}" class="text-tech-blue font-semibold hover:text-tech-green transition-colors">
                        Lire la suite →
                    </a>
                </div>
            </article>
            @endforeach
        </div>

        <div class="text-center mt-8">
            <a href="{{ route('blog') }}" class="bg-tech-blue text-white px-8 py-3 rounded-lg font-semibold hover:bg-tech-blue/80 transition-colors">
                Voir tous les articles
            </a>
        </div>
    </div>
</section>
@endif

<!-- Testimonials Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-tech-dark mb-4">Témoignages Clients</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Ce que disent nos clients satisfaits</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white rounded-xl p-6 shadow-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-tech-blue rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-user text-white"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-tech-dark">Marie Ouédraogo</h4>
                            <p class="text-sm text-gray-600">Directrice d'école</p>
                        </div>
                    </div>
                    <div class="flex mb-4">
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                    </div>
                    <p class="text-gray-600 text-sm">
                        "Excellent service ! La plateforme e-learning développée pour notre école a révolutionné notre façon d'enseigner."
                    </p>
                </div>

                <div class="bg-white rounded-xl p-6 shadow-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-tech-blue rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-user text-white"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-tech-dark">Ibrahim Kaboré</h4>
                            <p class="text-sm text-gray-600">Entrepreneur</p>
                        </div>
                    </div>
                    <div class="flex mb-4">
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                    </div>
                    <p class="text-gray-600 text-sm">
                        "Excellent service ! La plateforme e-learning développée pour notre école a révolutionné notre façon d'enseigner."
                    </p>
                </div>

                <div class="bg-white rounded-xl p-6 shadow-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-tech-blue rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-user text-white"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-tech-dark">Fatou Traoré</h4>
                            <p class="text-sm text-gray-600">Étudiante</p>
                        </div>
                    </div>
                    <div class="flex mb-4">
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                    </div>
                    <p class="text-gray-600 text-sm">
                        "Produits de qualité et livraison rapide. Mon iPhone acheté ici fonctionne parfaitement !"
                    </p>
                </div>
            </div>
        </div>
    </section>

<!-- Contact Section -->
<section id="contact" class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-tech-dark mb-4">Contactez-nous</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Prêt à démarrer votre projet ? Parlons-en !</p>
        </div>

        <div class="grid md:grid-cols-2 gap-12">
            <div>
                <h3 class="text-xl font-bold text-tech-dark mb-6">Informations de contact</h3>

                <div class="space-y-6">
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-tech-blue/10 rounded-full flex items-center justify-center">
                            <i class="fab fa-whatsapp text-tech-blue text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-tech-dark">WhatsApp</h4>
                            <p class="text-gray-600">+226 74 91 02 91</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-tech-green/10 rounded-full flex items-center justify-center">
                            <i class="fas fa-envelope text-tech-green text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-tech-dark">Email</h4>
                            <p class="text-gray-600">contact@hightech-center.bf</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-tech-blue/10 rounded-full flex items-center justify-center">
                            <i class="fas fa-map-marker-alt text-tech-blue text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-tech-dark">Adresse</h4>
                            <p class="text-gray-600">Bobo-Dioulasso, Burkina Faso</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl p-8 shadow-lg">
                <h3 class="text-xl font-bold text-tech-dark mb-6">Envoyez-nous un message</h3>

                <form class="space-y-6" action="https://wa.me/22674910291" method="get">
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-tech-dark mb-2">Nom</label>
                            <input type="text" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-tech-blue focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-tech-dark mb-2">Prénom</label>
                            <input type="text" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-tech-blue focus:border-transparent">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-tech-dark mb-2">Message</label>
                        <textarea rows="4" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-tech-blue focus:border-transparent" placeholder="Votre message..."></textarea>
                    </div>

                    <button type="submit" class="w-full bg-tech-blue text-white py-3 rounded-lg font-semibold hover:bg-tech-blue/80 transition-colors">
                        <i class="fab fa-whatsapp mr-2"></i>Envoyer via WhatsApp
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
