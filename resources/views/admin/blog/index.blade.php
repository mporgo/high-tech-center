@extends('layouts.admin')

@section('title', 'Gestion du Blog')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h2 class="text-xl font-bold text-tech-dark">Gestion du Blog</h2>
    <a href="{{ route('admin.blog.create') }}" class="bg-tech-green text-white px-2 py-1 rounded-lg font-semibold hover:bg-tech-green/80 transition-colors">
        <i class="fas fa-plus mr-2"></i>Nouvel article
    </a>
</div>

<div class="bg-white rounded-xl shadow-lg overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Article</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($posts as $blog)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                @if($blog->image)
                                    <img src="{{ asset('storage/' . $blog->image) }}"
                                         alt="{{ $blog->title }}"
                                         class="w-10 h-10 object-cover rounded-lg mr-3">
                                @else
                                    <div class="w-10 h-10 bg-tech-blue/10 rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas fa-blog text-tech-blue"></i>
                                    </div>
                                @endif
                                <div>
                                    <div class="text-sm font-medium text-gray-900">{{ $blog->title }}</div>
                                    <div class="text-sm text-gray-500">{{ Str::limit($blog->excerpt, 50) }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $blog->published_at ? $blog->published_at->format('d/m/Y') : 'Non publié' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $blog->status === 'published' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                {{ $blog->status === 'published' ? 'Publié' : 'Brouillon' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('admin.blog.show', $blog) }}" class="text-tech-blue hover:text-tech-blue/80 mr-3">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.blog.edit', $blog) }}" class="text-tech-blue hover:text-tech-blue/80 mr-3">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.blog.destroy', $blog) }}" method="POST" class="inline"
                                  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center text-gray-500">
                            <i class="fas fa-blog text-4xl mb-4"></i>
                            <p>Aucun article trouvé</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-6">
    {{ $posts->links() }}
</div>
@endsection
