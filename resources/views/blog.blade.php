@extends('layouts.app')

@section('title', 'Blog - High-Tech Center')

@section('content')
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h1 class="text-3xl font-bold text-tech-dark mb-4">Blog Tech</h1>
            <p class="text-gray-600 max-w-2xl mx-auto">Actualités, astuces et conseils en technologie</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @forelse($posts as $post)
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
            @empty
                <div class="col-span-full text-center py-12">
                    <i class="fas fa-blog text-6xl text-gray-300 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-500 mb-2">Aucun article publié</h3>
                    <p class="text-gray-400">Revenez bientôt pour découvrir nos derniers articles.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $posts->links() }}
        </div>
    </div>
</section>
@endsection
