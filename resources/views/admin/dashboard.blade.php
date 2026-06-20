@extends('layouts.admin')

@section('title', 'Tableau de bord - Administration')

@section('content')
    <h2 class="text-2xl font-bold text-tech-dark mb-6">Tableau de bord</h2>

    <!-- Stats Cards -->
    <div class="grid gap-6 mb-8 md:grid-cols-3">
        <!-- Catégories -->
        <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm">Catégories</p>
                    <p class="text-2xl font-bold text-tech-dark">{{ $stats['categories'] ?? 0 }}</p>
                </div>
                <div class="w-12 h-12 bg-tech-blue/10 rounded-full flex items-center justify-center">
                    <i class="fas fa-tags text-tech-blue text-lg"></i>
                </div>
            </div>
        </div>

        <!-- Produits -->
        <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm">Produits</p>
                    <p class="text-2xl font-bold text-tech-dark">{{ $stats['products'] ?? 0 }}</p>
                </div>
                <div class="w-12 h-12 bg-tech-blue/10 rounded-full flex items-center justify-center">
                    <i class="fas fa-shopping-bag text-tech-blue text-lg"></i>
                </div>
            </div>
        </div>

        <!-- Articles de Blog -->
        <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm">Articles Blog</p>
                    <p class="text-2xl font-bold text-tech-dark">{{ $stats['blog_posts'] ?? 0 }}</p>
                </div>
                <div class="w-12 h-12 bg-tech-green/10 rounded-full flex items-center justify-center">
                    <i class="fas fa-blog text-tech-green text-lg"></i>
                </div>
            </div>
        </div>
    </div>
@endsection
