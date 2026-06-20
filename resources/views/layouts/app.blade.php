<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'High-Tech Center - Votre partenaire tech')</title>
    <meta name="description" content="@yield('description', 'High-Tech Center - Formation digitale, développement web/mobile et vente de produits tech')">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'tech-blue': '#d8641a',
                        'tech-green': '#d8641a',
                        'tech-dark': '#000000'
                    }
                }
            }
        }
    </script>

    <style>
        .hero-gradient {
            background: linear-gradient(135deg, #d8641a 0%, #f6a261 100%);
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1), 0 4px 6px -2px rgba(0,0,0,0.05);
        }
        .fade-in {
            animation: fadeIn 0.6s ease-in;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="sticky top-0 z-50 border-b border-gray-200 bg-white">
        <div class="container mx-auto px-4">
            <nav class="flex items-center justify-between py-6 md:py-4">
                <div class="flex items-center space-x-2">
                    <img src="{{ asset('images/logo.png') }}" alt="High Tech Center" class="w-18 h-10 object-contain">
                </div>

                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-tech-dark hover:text-tech-blue transition-colors">Accueil</a>
                    <a href="{{ route('home') }}#about" class="text-tech-dark hover:text-tech-blue transition-colors">Qui Sommes Nous?</a>
                    <a href="{{ route('products') }}" class="text-tech-dark hover:text-tech-blue transition-colors">Boutique</a>
                    <a href="{{ route('home') }}#services" class="text-tech-dark hover:text-tech-blue transition-colors">Nos Services</a>
                    <a href="{{ route('blog') }}" class="text-tech-dark hover:text-tech-blue transition-colors">Blog</a>
                    <a href="{{ route('home') }}#contact" class="text-tech-dark hover:text-tech-blue transition-colors">Contact</a>
                </div>

                <div class="flex items-center space-x-4">
                    {{-- @auth
                        <a href="{{ route('admin.dashboard') }}" class="text-tech-blue hover:text-tech-green transition-colors">
                            <i class="fas fa-user-shield text-lg"></i>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="text-tech-blue hover:text-tech-green transition-colors">
                            <i class="fas fa-user text-lg"></i>
                        </a>
                    @endauth --}}

                    <div class="hidden md:flex items-center space-x-3">
                        <a href="#" class="text-tech-blue hover:text-tech-green transition-colors">
                            <i class="fab fa-facebook text-lg"></i>
                        </a>
                        <a href="#" class="text-tech-blue hover:text-tech-green transition-colors">
                            <i class="fab fa-linkedin text-lg"></i>
                        </a>
                        <a href="https://wa.me/22674910291" class="text-tech-blue hover:text-tech-green transition-colors">
                            <i class="fab fa-whatsapp text-lg"></i>
                        </a>
                    </div>

                    <button class="md:hidden text-tech-dark" onclick="toggleMobileMenu()">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </nav>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden md:hidden bg-white border-t border-gray-200">
            <div class="container mx-auto px-4 py-4 space-y-4">
                <a href="{{ route('home') }}" class="block text-tech-dark hover:text-tech-blue transition-colors">Accueil</a>
                <a href="{{ route('home') }}#about" class="block text-tech-dark hover:text-tech-blue transition-colors">Qui Sommes Nous?</a>
                <a href="{{ route('products') }}" class="block text-tech-dark hover:text-tech-blue transition-colors">Boutique</a>
                <a href="{{ route('home') }}#services" class="block text-tech-dark hover:text-tech-blue transition-colors">Nos Services</a>
                <a href="{{ route('blog') }}" class="block text-tech-dark hover:text-tech-blue transition-colors">Blog</a>
                <a href="{{ route('home') }}#contact" class="block text-tech-dark hover:text-tech-blue transition-colors">Contact</a>
                {{-- @auth
                    <a href="{{ route('admin.dashboard') }}" class="block text-tech-blue hover:text-tech-green transition-colors">
                        <i class="fas fa-user-shield mr-2"></i>Administration
                    </a>
                @else
                    <a href="{{ route('login') }}" class="block text-tech-blue hover:text-tech-green transition-colors">
                        <i class="fas fa-user mr-2"></i>Connexion
                    </a>
                @endauth --}}
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-tech-dark text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center space-x-2 mb-6">
                        <span class="text-xl font-bold">High Tech Center</span>
                    </div>
                    <p class="text-gray-300 mb-6">
                        Votre partenaire numérique, éducatif et technologique pour un avenir connecté.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-300 hover:text-tech-green transition-colors">
                            <i class="fab fa-facebook text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-tech-green transition-colors">
                            <i class="fab fa-linkedin text-xl"></i>
                        </a>
                        <a href="https://wa.me/22674910291" class="text-gray-300 hover:text-tech-green transition-colors">
                            <i class="fab fa-whatsapp text-xl"></i>
                        </a>
                    </div>
                </div>

                <div>
                    <h4 class="font-bold mb-6">Services</h4>
                    <ul class="space-y-3 text-gray-300">
                        <li><a href="#" class="hover:text-tech-green transition-colors">Développement Web</a></li>
                        <li><a href="#" class="hover:text-tech-green transition-colors">Applications Mobile</a></li>
                        <li><a href="#" class="hover:text-tech-green transition-colors">Formation Digitale</a></li>
                        <li><a href="#" class="hover:text-tech-green transition-colors">Conseil IT</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold mb-6">Produits</h4>
                    <ul class="space-y-3 text-gray-300">
                        @foreach(App\Models\Category::where('is_active', true)->take(4)->get() as $category)
                        <li><a href="{{ route('products', ['category' => $category->slug]) }}" class="hover:text-tech-green transition-colors">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold mb-6">Contact</h4>
                    <ul class="space-y-3 text-gray-300">
                        <li>📱 +226 74 91 02 91</li>
                        <li>📍 Bobo-Dioulasso, Burkina Faso</li>
                        <li>🕒 8h-20h tous les jours</li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-700 mt-12 pt-8 text-center text-gray-300">
                <p>&copy; {{ date('Y') }} High-Tech Center. Tous droits réservés. |
                   Développé par <a href="https://jeddigitalsolution.com/" class="text-tech-green hover:underline">Jed-Digital Solutions</a>
                </p>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Chat Button -->
    <div class="fixed bottom-6 right-6 z-50">
        <a href="https://wa.me/22674910291?text=Bonjour! J'aimerais avoir des informations sur vos services."
           class="bg-green-500 text-white w-16 h-16 rounded-full shadow-lg hover:bg-green-600 transition-colors flex items-center justify-center">
            <i class="fab fa-whatsapp text-2xl"></i>
        </a>
    </div>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const menu = document.getElementById('mobileMenu');
            const button = document.querySelector('[onclick="toggleMobileMenu()"]');

            if (!menu.contains(event.target) && !button.contains(event.target)) {
                menu.classList.add('hidden');
            }
        });
    </script>

    @stack('scripts')
</body>
</html>
