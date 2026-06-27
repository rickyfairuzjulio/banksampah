@extends('layouts.master')

@section('content')
<div class="max-w-3xl mx-auto">
    <a href="{{ route('articles.index') }}" class="text-indigo-600 hover:underline mb-6 inline-block">← Kembali ke Edukasi</a>

    <article class="bg-white rounded-lg shadow p-8">
        @if($article->featured_image)
            <img src="{{ asset('storage/' . $article->featured_image) }}" alt="{{ $article->title }}" class="w-full h-96 object-cover rounded-lg mb-6">
        @else
            <div class="w-full h-96 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-lg flex items-center justify-center mb-6">
                <span class="text-white text-8xl">📚</span>
            </div>
        @endif

        <h1 class="text-4xl font-bold text-gray-800 mb-2">{{ $article->title }}</h1>
        <div class="text-gray-500 text-sm mb-6">
            Dipublikasikan {{ $article->created_at->format('d F Y') }}
        </div>

        <div class="prose max-w-none mb-8">
            {!! $article->content !!}
        </div>

        @if($article->tags)
            <div class="mt-8 pt-6 border-t">
                <div class="flex flex-wrap gap-2">
                    @foreach(explode(',', $article->tags) as $tag)
                        <span class="inline-block bg-indigo-100 text-indigo-700 px-3 py-1 rounded-full text-sm">{{ trim($tag) }}</span>
                    @endforeach
                </div>
            </div>
        @endif
    </article>
</div>
@endsection
