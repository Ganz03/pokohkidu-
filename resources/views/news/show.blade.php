@extends('layouts.app')

@section('title', $news->title)

@section('content')
<div class="py-16 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <article class="bg-white rounded-xl shadow-md overflow-hidden">
            
            {{-- Featured Image --}}
            @if($news->image)
                <img src="{{ Storage::url($news->image) }}" alt="{{ $news->title }}" class="w-full h-64 md:h-96 object-cover">
            @endif

            <div class="p-8">
                {{-- Meta Info --}}
                <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                    <div class="flex items-center space-x-4">
                        <span>{{ $news->published_at->format('d F Y') }}</span>
                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded">{{ $news->category }}</span>
                    </div>
                    <span>{{ $news->views }} views</span>
                </div>

                {{-- Title --}}
                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6">{{ $news->title }}</h1>

                {{-- Content --}}
                <div class="prose prose-lg max-w-none">
                    {!! $news->content !!}
                </div>

                {{-- Share & Back --}}
                <div class="flex justify-between items-center mt-8 pt-8 border-t">
                    <a href="{{ route('news.index') }}" class="text-blue-600 hover:text-blue-700 font-medium">
                        ← Kembali ke Berita
                    </a>
                    <div class="flex space-x-2 items-center">
                        <span class="text-sm text-gray-500">Bagikan:</span>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" 
                           target="_blank" 
                           class="text-blue-600 hover:text-blue-700 transition-colors">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="https://wa.me/?text={{ urlencode($news->title . ' - ' . url()->current()) }}" 
                           target="_blank" 
                           class="text-green-500 hover:text-green-600 transition-colors">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($news->title) }}" 
                           target="_blank" 
                           class="text-blue-400 hover:text-blue-500 transition-colors">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <button onclick="copyToClipboard()" 
                                id="copyButton"
                                class="text-gray-600 hover:text-gray-700 transition-colors"
                                title="Salin Link">
                            <i class="fas fa-copy" id="copyIcon"></i>
                        </button>
                    </div>
                </div>
            </div>
        </article>

        {{-- Related News --}}
        @if($related->count() > 0)
        <div class="mt-12">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Berita Terkait</h2>
            <div class="grid md:grid-cols-3 gap-6">
                @foreach($related as $item)
                <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    @if($item->image)
                        <img src="{{ Storage::url($item->image) }}" alt="{{ $item->title }}" class="w-full h-32 object-cover">
                    @else
                        <div class="w-full h-32 bg-gradient-to-br from-gray-400 to-gray-600 flex items-center justify-center">
                            <i class="fas fa-newspaper text-white text-2xl"></i>
                        </div>
                    @endif
                    <div class="p-4">
                        <div class="text-xs text-gray-500 mb-2">{{ $item->published_at->format('d M Y') }}</div>
                        <h3 class="font-bold text-sm mb-2 hover:text-blue-600">
                            <a href="{{ route('news.show', $item->slug) }}">{{ Str::limit($item->title, 60) }}</a>
                        </h3>
                        <a href="{{ route('news.show', $item->slug) }}" class="text-blue-600 hover:text-blue-700 text-xs">
                            Baca →
                        </a>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
        @endif

    </div>
</div>

{{-- Toast Notification - Hapus bagian ini --}}

@endsection

@push('scripts')
<script>
    // Copy to clipboard function
    function copyToClipboard() {
        const url = window.location.href;
        const copyButton = document.getElementById('copyButton');
        const copyIcon = document.getElementById('copyIcon');
        
        // Create temporary input to copy text
        const tempInput = document.createElement('input');
        tempInput.value = url;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand('copy');
        document.body.removeChild(tempInput);
        
        // Update icon to show success
        copyIcon.className = 'fas fa-check';
        copyButton.classList.remove('text-gray-600');
        copyButton.classList.add('text-green-600');
        
        // Show simple alert
        alert('Link berhasil disalin!');
        
        // Reset icon after 2 seconds
        setTimeout(() => {
            copyIcon.className = 'fas fa-copy';
            copyButton.classList.remove('text-green-600');
            copyButton.classList.add('text-gray-600');
        }, 2000);
    }
</script>
@endpush