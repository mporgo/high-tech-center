@extends('layouts.app')

@section('title', $post->title . ' - High-Tech Center')

@section('content')
<article class="py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <!-- Header -->
            <header class="mb-8">
                @if($post->image)
                    <div class="h-96 bg-gray-200 overflow-hidden rounded-xl mb-8">
                        <img src="{{ asset('storage/' . $post->image) }}"
                             alt="{{ $post->title }}"
                             class="w-full h-full object-cover">
                    </div>
                @endif

                <div class="text-sm text-tech-blue mb-4">{{ $post->published_at->format('d F Y') }}</div>
                <h1 class="text-4xl font-bold text-tech-dark mb-4">{{ $post->title }}</h1>
                <p class="text-xl text-gray-600">{{ $post->excerpt }}</p>
            </header>

            <!-- Content -->
            <div class="prose prose-lg max-w-none">
                {!! nl2br(e($post->content)) !!}
            </div>

            <!-- Share -->
            <div class="mt-12 pt-8 border-t border-gray-200">
                <h3 class="text-lg font-bold text-tech-dark mb-4">Partager cet article</h3>
                <div class="flex space-x-4">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                       class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                        <i class="fab fa-facebook mr-2"></i>Facebook
                    </a>
                    <a href="https://wa.me/?text={{ urlencode($post->title . ' - ' . request()->url()) }}"
                       class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition-colors">
                        <i class="fab fa-whatsapp mr-2"></i>WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Posts -->
    @if($relatedPosts->count() > 0)
    <div class="bg-gray-50 py-16 mt-16">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold text-tech-dark mb-8 text-center">Articles similaires</h2>

            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                @foreach($relatedPosts as $relatedPost)
                    <article class="card-hover bg-white rounded-xl overflow-hidden">
                        @if($relatedPost->image)
                            <div class="h-48 bg-gray-200 overflow-hidden">
                                <img src="{{ asset('storage/' . $relatedPost->image) }}"
                                     alt="{{ $relatedPost->title }}"
                                     class="w-full h-full object-cover">
                            </div>
                        @else
                            <div class="h-48 bg-gradient-to-br from-tech-blue to-tech-green flex items-center justify-center">
                                <i class="fas fa-blog text-white text-4xl"></i>
                            </div>
                        @endif

                        <div class="p-6">
                            <div class="text-sm text-tech-blue mb-2">{{ $relatedPost->published_at->format('d M Y') }}</div>
                            <h3 class="font-bold text-tech-dark mb-3">{{ $relatedPost->title }}</h3>
                            <p class="text-gray-600 text-sm mb-4">{{ Str::limit($relatedPost->excerpt, 100) }}</p>
                            <a href="{{ route('blog.post', $relatedPost->slug) }}" class="text-tech-blue font-semibold hover:text-tech-green transition-colors">
                                Lire la suite →
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
    @endif
</article>
@endsection
