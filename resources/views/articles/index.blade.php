@extends('layouts.master')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-indigo-600 mb-2">Edukasi Lingkungan</h1>
        <p class="text-gray-600">Pelajari cara mengelola sampah dengan baik dan benar</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @if($articles->isEmpty())
            <div class="col-span-full text-center py-12">
                <p class="text-gray-500 text-lg">Belum ada artikel</p>
            </div>
        @else
            @foreach($articles as $article)
                <a href="{{ route('articles.show', $article->slug) }}" class="block bg-white rounded-lg shadow hover:shadow-lg transition group">
                    @if($article->featured_image)
                        <img src="{{ asset('storage/' . $article->featured_image) }}" alt="{{ $article->title }}" class="w-full h-48 object-cover rounded-t-lg group-hover:opacity-75 transition">
                    @else
                        <div class="w-full h-48 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-t-lg flex items-center justify-center">
                            <span class="text-white text-4xl">📚</span>
                        </div>
                    @endif
                    <div class="p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-indigo-600">{{ $article->title }}</h2>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ strip_tags($article->content) }}</p>
                        <div class="flex justify-between items-center text-xs text-gray-500">
                            <span>{{ $article->created_at->format('d M Y') }}</span>
                            <span class="text-indigo-600 group-hover:underline">Baca Selengkapnya →</span>
                        </div>
                    </div>
                </a>
            @endforeach
        @endif
    </div>

    @if($articles->hasPages())
        <div class="mt-8">
            {{ $articles->links() }}
        </div>
    @endif
</div>
@endsection
