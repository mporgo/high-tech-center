<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin - High Tech Center')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'tech-blue': '#d8641a',
                        'tech-green': '#28a745',
                        'tech-white': '#ffffff',
                        'tech-dark': '#1a202c',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 flex flex-col min-h-screen">

    <!-- HEADER FIXÉ -->
    <header class="fixed top-0 left-0 right-0 z-50 bg-tech-white shadow-md">
        <div class="flex items-center justify-between px-4 py-3">
            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <img src="{{ asset('images/logo.png') }}" alt="High Tech Center" class="w-18 h-10 object-contain">
            </div>

            <!-- Actions -->
            <div class="flex items-center space-x-4">
                <span class="hidden md:inline text-sm text-gray-600">
                    Connecté: {{ auth()->user()->name }}
                </span>

                <a href="{{ route('home') }}" target="_blank"
                   class="bg-tech-blue text-white px-3 py-2 rounded-lg hover:bg-tech-blue/80 transition text-sm">
                    <i class="fas fa-home mr-1"></i><span class="hidden md:inline">Site</span>
                </a>

                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit"
                            class="bg-red-600 text-white px-3 py-2 rounded-lg hover:bg-red-700 transition text-sm">
                        <i class="fas fa-sign-out-alt mr-1"></i><span class="hidden md:inline">Déconnexion</span>
                    </button>
                </form>

                <!-- Toggle sidebar mobile -->
                <button class="md:hidden text-tech-dark text-2xl" onclick="toggleSidebar()" aria-label="Menu">
                    <i id="sidebar-toggle-icon" class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </header>

    <!--  STRUCTURE PRINCIPALE -->
    <div class="flex flex-1 pt-20"> <!-- pt-20 = espace pour header -->
        <!--  SIDEBAR FIXÉ -->
        <aside id="sidebar"
               class="fixed md:static top-20 md:top-0 left-0 w-64 bg-white md:bg-gray-100 h-[calc(100vh-5rem)] md:h-auto overflow-y-auto p-4 transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out z-40 shadow-lg md:shadow-none">
            <nav class="space-y-2">
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center px-4 py-3 rounded-lg transition {{ request()->routeIs('admin.dashboard') ? 'bg-tech-blue text-white' : 'text-tech-dark hover:bg-gray-200' }}">
                    <i class="fas fa-tachometer-alt w-5"></i>
                    <span class="ml-3">Tableau de bord</span>
                </a>

                <a href="{{ route('admin.categories.index') }}"
                   class="flex items-center px-4 py-3 rounded-lg transition {{ request()->routeIs('admin.categories.*') ? 'bg-tech-blue text-white' : 'text-tech-dark hover:bg-gray-200' }}">
                    <i class="fas fa-tags w-5"></i>
                    <span class="ml-3">Catégories</span>
                </a>

                <a href="{{ route('admin.products.index') }}"
                   class="flex items-center px-4 py-3 rounded-lg transition {{ request()->routeIs('admin.products.*') ? 'bg-tech-blue text-white' : 'text-tech-dark hover:bg-gray-200' }}">
                    <i class="fas fa-shopping-bag w-5"></i>
                    <span class="ml-3">Produits</span>
                </a>

                <a href="{{ route('admin.blog.index') }}"
                   class="flex items-center px-4 py-3 rounded-lg transition {{ request()->routeIs('admin.blog.*') ? 'bg-tech-blue text-white' : 'text-tech-dark hover:bg-gray-200' }}">
                    <i class="fas fa-blog w-5"></i>
                    <span class="ml-3">Blog</span>
                </a>
            </nav>
        </aside>

        <!--  OVERLAY MOBILE -->
        <div id="sidebar-overlay"
             class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden md:hidden"
             onclick="closeSidebar()"></div>

        <!--  CONTENU -->
        <main class="flex-1 p-4 md:p-6 overflow-x-hidden">
            <!-- Messages Flash -->
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6 flex items-center">
                    <i class="fas fa-check-circle mr-2"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6 flex items-center">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    <div class="flex items-center mb-2">
                        <i class="fas fa-exclamation-triangle mr-2"></i>
                        <span class="font-semibold">Erreurs de validation :</span>
                    </div>
                    <ul class="list-disc list-inside text-sm">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Contenu dynamique -->
            @yield('content')
        </main>
    </div>

    @stack('scripts')

    <!--  SCRIPT SIDEBAR RESPONSIVE -->
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            const icon = document.getElementById('sidebar-toggle-icon');

            if (sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
                icon.classList.replace('fa-bars', 'fa-times');
            } else {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
                icon.classList.replace('fa-times', 'fa-bars');
            }
        }

        function closeSidebar() {
            document.getElementById('sidebar').classList.add('-translate-x-full');
            document.getElementById('sidebar-overlay').classList.add('hidden');
            document.getElementById('sidebar-toggle-icon').classList.replace('fa-times', 'fa-bars');
        }

        // Fermer la sidebar si on passe en mode desktop
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768) closeSidebar();
        });
    </script>
</body>
</html>
