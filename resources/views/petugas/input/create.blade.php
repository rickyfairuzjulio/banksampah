@extends('layouts.master')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-lg shadow p-8">
    <h2 class="text-3xl font-bold text-green-600 mb-6">Input Timbangan</h2>
    <p class="text-gray-600 mb-6">User ID: <span class="font-semibold">{{ $user_id }}</span></p>

    @if(session('status'))
        <div class="bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded mb-6">{{ session('status') }}</div>
    @endif

    <form action="{{ route('petugas.input.timbangan.store', [$user_id]) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div>
            <label class="block text-lg font-semibold text-gray-700 mb-2">Berat (Kg)</label>
            <input name="berat_kg" type="number" step="0.001" min="0.001" required placeholder="0.000"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" />
            @error('berat_kg')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-lg font-semibold text-gray-700 mb-2">Kategori Sampah</label>
            <select name="trash_category_id" required 
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600">
                <option value="">-- Pilih kategori --</option>
                @foreach(\App\Models\TrashCategory::where('active', true)->get() as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }} - Rp {{ number_format($cat->price_per_kg,0,',','.') }}/kg</option>
                @endforeach
            </select>
            @error('trash_category_id')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-lg font-semibold text-gray-700 mb-2">Foto Bukti (opsional)</label>
            <input type="file" name="foto_bukti" accept="image/*" 
                class="w-full px-4 py-3 border border-gray-300 rounded-lg" />
            @error('foto_bukti')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-lg hover:bg-green-700 font-semibold text-lg">
            Simpan Timbangan
        </button>
    </form>
</div>
@endsection