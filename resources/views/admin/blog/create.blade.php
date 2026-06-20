@extends('layouts.admin')

@section('title', 'Créer un article')

@section('content')
<div class="flex items-center justify-between mb-6">
    <div class="flex items-center">
        <a href="{{ route('admin.blog.index') }}" class="text-tech-blue hover:text-tech-blue/80 mr-4">
            <i class="fas fa-arrow-left text-lg"></i>
        </a>
        <h2 class="text-2xl font-bold text-tech-dark">Créer un nouvel article</h2>
    </div>
</div>

<div class="bg-white rounded-xl shadow-lg overflow-hidden">
    <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
        @csrf

        <!-- Titre -->
        <div>
            <label for="title" class="block text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">
                Titre de l'article <span class="text-red-600">*</span>
            </label>
            <input type="text"
                   name="title"
                   id="title"
                   value="{{ old('title') }}"
                   class="w-full px-6 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-tech-blue focus:border-transparent transition-colors @error('title') border-red-600 @enderror"
                   placeholder="Entrez le titre de l'article"
                   maxlength="255"
                   required>
            @error('title')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Extrait -->
        <div>
            <label for="excerpt" class="block text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">
                Extrait <span class="text-red-600">*</span>
            </label>
            <textarea name="excerpt"
                      id="excerpt"
                      rows="3"
                      class="w-full px-6 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-tech-blue focus:border-transparent transition-colors resize-none @error('excerpt') border-red-600 @enderror"
                      placeholder="Résumé court de l'article..."
                      required>{{ old('excerpt') }}</textarea>
            @error('excerpt')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Contenu -->
        <div>
            <label for="content" class="block text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">
                Contenu de l'article <span class="text-red-600">*</span>
            </label>
            <textarea name="content"
                      id="content"
                      rows="12"
                      class="w-full px-6 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-tech-blue focus:border-transparent transition-colors resize-y @error('content') border-red-600 @enderror"
                      placeholder="Rédigez le contenu de votre article ici..."
                      required>{{ old('content') }}</textarea>
            @error('content')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Image -->
        <div>
            <label for="image" class="block text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">
                Image de couverture
            </label>
            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-200 border-dashed rounded-lg hover:border-tech-blue transition-colors">
                <div class="space-y-1 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-500" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="flex text-sm text-gray-500">
                        <label for="image" class="relative cursor-pointer bg-white rounded-md font-semibold text-tech-blue hover:text-tech-blue/80 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-tech-blue">
                            <span>Télécharger un fichier</span>
                            <input id="image" name="image" type="file" class="sr-only" accept="image/jpeg,image/png,image/jpg,image/gif">
                        </label>
                        <p class="pl-1">ou glisser-déposer</p>
                    </div>
                    <p class="text-xs text-gray-500">PNG, JPG, JPEG, GIF jusqu'à 2MB</p>
                </div>
            </div>
            @error('image')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror

            <!-- Preview de l'image -->
            <div id="imagePreview" class="mt-4 hidden">
                <div class="flex items-center">
                    <img id="previewImg" src="" alt="Aperçu" class="w-10 h-10 object-cover rounded-lg mr-3">
                    <div>
                        <div class="text-sm font-medium text-gray-900" id="fileName"></div>
                        <button type="button" id="removeImage" class="text-sm text-red-600 hover:text-red-800">
                            <i class="fas fa-trash mr-1"></i>Supprimer l'image
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statut et Date -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="status" class="block text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">
                    Statut <span class="text-red-600">*</span>
                </label>
                <select name="status"
                        id="status"
                        class="w-full px-6 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-tech-blue focus:border-transparent transition-colors @error('status') border-red-600 @enderror"
                        required>
                    <option value="draft" {{ old('status', 'draft') === 'draft' ? 'selected' : '' }}>Brouillon</option>
                    <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>Publié</option>
                </select>
                @error('status')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror

                <!-- Statut Preview -->
                <div class="mt-2">
                    <span id="statusPreview" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                        Brouillon
                    </span>
                </div>
            </div>

            <div>
                <label for="published_at" class="block text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">
                    Date de publication
                </label>
                <input type="date"
                       name="published_at"
                       id="published_at"
                       value="{{ old('published_at') }}"
                       class="w-full px-6 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-tech-blue focus:border-transparent transition-colors @error('published_at') border-red-600 @enderror">
                @error('published_at')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
                <p class="text-sm text-gray-500 mt-1">Sera définie à aujourd'hui si vide lors de la publication</p>
            </div>
        </div>

        <!-- Boutons d'action -->
        <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
            <a href="{{ route('admin.blog.index') }}"
               class="px-6 py-3 border border-gray-200 rounded-lg text-gray-500 font-semibold hover:bg-gray-50 transition-colors">
                Annuler
            </a>
            <button type="submit"
                    class="bg-tech-green text-white px-6 py-3 rounded-lg font-semibold hover:bg-tech-green/80 transition-colors">
                <i class="fas fa-plus mr-2"></i>Créer l'article
            </button>
        </div>
    </form>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const statusSelect = document.getElementById('status');
        const publishedAtField = document.getElementById('published_at');
        const statusPreview = document.getElementById('statusPreview');

        // Gestion du preview du statut
        function updateStatusPreview() {
            const status = statusSelect.value;
            if (status === 'published') {
                statusPreview.className = 'px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800';
                statusPreview.textContent = 'Publié';
            } else {
                statusPreview.className = 'px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800';
                statusPreview.textContent = 'Brouillon';
            }
        }

        // Gestion de la logique de publication
        statusSelect.addEventListener('change', function() {
            updateStatusPreview();
            if (this.value === 'published' && !publishedAtField.value) {
                const today = new Date().toISOString().split('T')[0];
                publishedAtField.value = today;
            }
        });

        // Preview de l'image sélectionnée (style de l'index)
        const imageInput = document.getElementById('image');
        const imagePreview = document.getElementById('imagePreview');
        const previewImg = document.getElementById('previewImg');
        const fileName = document.getElementById('fileName');
        const removeImageBtn = document.getElementById('removeImage');

        imageInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                // Vérifier la taille du fichier (2MB)
                if (file.size > 2048 * 1024) {
                    alert('Le fichier est trop volumineux. Taille maximum: 2MB');
                    this.value = '';
                    return;
                }

                // Vérifier le type de fichier
                const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
                if (!allowedTypes.includes(file.type)) {
                    alert('Type de fichier non autorisé. Utilisez: JPEG, PNG, JPG, GIF');
                    this.value = '';
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    fileName.textContent = file.name;
                    imagePreview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        });

        removeImageBtn.addEventListener('click', function() {
            imageInput.value = '';
            imagePreview.classList.add('hidden');
            previewImg.src = '';
            fileName.textContent = '';
        });

        // Drag and drop pour l'image
        const dropZone = imageInput.closest('.border-dashed');

        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, preventDefaults, false);
        });

        ['dragenter', 'dragover'].forEach(eventName => {
            dropZone.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, unhighlight, false);
        });

        dropZone.addEventListener('drop', handleDrop, false);

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        function highlight(e) {
            dropZone.classList.add('border-tech-blue', 'bg-tech-blue/5');
        }

        function unhighlight(e) {
            dropZone.classList.remove('border-tech-blue', 'bg-tech-blue/5');
        }

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;

            if (files.length > 0) {
                imageInput.files = files;
                imageInput.dispatchEvent(new Event('change'));
            }
        }

        // Initialiser le preview du statut
        updateStatusPreview();
    });
</script>
@endpush
@endsection
