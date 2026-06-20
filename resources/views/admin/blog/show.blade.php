{{-- resources/views/admin/blog/show.blade.php --}}
@extends('layouts.admin')

@section('title', 'Aperçu: ' . $blog->title)

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-6 space-y-4 md:space-y-0">
        <div class="flex items-center">
            <a href="{{ route('admin.blog.index') }}" class="text-tech-blue hover:text-tech-blue/80 mr-4">
                <i class="fas fa-arrow-left text-lg"></i>
            </a>
            <div>
                <h2 class="text-xl md:text-2xl font-bold text-tech-dark">{{ $blog->title }}</h2>
                <p class="text-sm text-gray-500 mt-1">Aperçu de l'article</p>
            </div>
        </div>

        <div class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-3">
            @if($blog->status === 'published')
                <a href="{{ route('blog.post', $blog->slug) }}" target="_blank"
                   class="bg-tech-green text-white px-4 py-2 rounded-lg hover:bg-tech-green/80 transition-colors text-center">
                    <i class="fas fa-external-link-alt mr-2"></i>Voir sur site
                </a>
            @endif

            <a href="{{ route('admin.blog.edit', $blog) }}"
               class="bg-tech-blue text-white px-4 py-2 rounded-lg hover:bg-tech-blue/80 transition-colors text-center">
                <i class="fas fa-edit mr-2"></i>Modifier
            </a>

            <form action="{{ route('admin.blog.destroy', $blog) }}" method="POST" class="inline"
                  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="w-full bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors">
                    <i class="fas fa-trash mr-2"></i>Supprimer
                </button>
            </form>
        </div>
    </div>

    <div class="grid lg:grid-cols-4 gap-6">
        <!-- Contenu principal -->
        <div class="lg:col-span-3">
            <!-- Article Preview -->
            <article class="bg-white rounded-xl shadow-lg overflow-hidden">
                @if($blog->image)
                    <div class="h-64 md:h-96 bg-gray-200 overflow-hidden">
                        <img src="{{ asset('storage/' . $blog->image) }}"
                             alt="{{ $blog->title }}"
                             class="w-full h-full object-cover">
                    </div>
                @endif

                <div class="p-6 md:p-8">
                    <!-- Header -->
                    <header class="mb-6">
                        <div class="flex flex-wrap items-center gap-3 mb-4">
                            <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $blog->status === 'published' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                {{ $blog->status === 'published' ? 'Publié' : 'Brouillon' }}
                            </span>

                            @if($blog->published_at)
                                <span class="text-sm text-tech-blue">{{ $blog->published_at->format('d F Y') }}</span>
                            @endif
                        </div>

                        <h1 class="text-2xl md:text-3xl font-bold text-tech-dark mb-4">{{ $blog->title }}</h1>
                        <p class="text-lg md:text-xl text-gray-600 leading-relaxed">{{ $blog->excerpt }}</p>
                    </header>

                    <!-- Content -->
                    <div class="prose prose-lg max-w-none">
                        <div class="whitespace-pre-line text-gray-900 leading-relaxed">{{ $blog->content }}</div>
                    </div>
                </div>
            </article>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Informations -->
            <div class="bg-white rounded-xl p-6 shadow-lg">
                <h3 class="text-lg font-bold text-tech-dark mb-4">Informations</h3>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Statut</label>
                        <span class="px-3 py-1 text-sm font-semibold rounded-full {{ $blog->status === 'published' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                            {{ $blog->status === 'published' ? 'Publié' : 'Brouillon' }}
                        </span>
                    </div>

                    @if($blog->published_at)
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Date de publication</label>
                        <p class="text-gray-900">{{ $blog->published_at->format('d/m/Y à H:i') }}</p>
                    </div>
                    @endif

                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Créé le</label>
                        <p class="text-gray-900">{{ $blog->created_at->format('d/m/Y à H:i') }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Dernière modification</label>
                        <p class="text-gray-900">{{ $blog->updated_at->format('d/m/Y à H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
