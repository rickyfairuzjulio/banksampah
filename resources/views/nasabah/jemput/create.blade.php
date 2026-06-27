@extends('layouts.master')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-lg shadow p-8">
    <h2 class="text-3xl font-bold text-indigo-600 mb-6">Permohonan Jemput Sampah</h2>

    @if(session('status'))
        <div class="bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded mb-6">{{ session('status') }}</div>
    @endif

    <form action="{{ route('nasabah.jemput.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label class="block text-lg font-semibold text-gray-700 mb-2">Estimasi Berat (Kg)</label>
            <input name="estimasi_berat" type="number" step="0.1" min="5" required placeholder="Minimal 5 kg" 
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600" />
            @error('estimasi_berat')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-lg font-semibold text-gray-700 mb-2">Alamat Lengkap</label>
            <textarea name="address" required rows="4" placeholder="Jl. Contoh No. 123, RT 01/RW 02"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"></textarea>
            @error('address')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-lg font-semibold text-gray-700 mb-2">Jadwal (Tanggal & Waktu)</label>
            <input name="scheduled_at" type="datetime-local" required 
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600" />
            @error('scheduled_at')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <button type="submit" class="w-full bg-indigo-600 text-white py-3 rounded-lg hover:bg-indigo-700 font-semibold text-lg">
            Kirim Permohonan
        </button>
    </form>
</div>
@endsection