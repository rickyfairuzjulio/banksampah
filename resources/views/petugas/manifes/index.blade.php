@extends('layouts.master')

@section('title', 'Dashboard Petugas - SiSampah')

@section('content')
<div class="max-w-6xl mx-auto">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">Dashboard Petugas</h1>
        <p class="text-gray-600">Kelola pengumpulan dan penimbangan sampah</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        @php
            $total_transaksi = \App\Models\Transaction::where('petugas_id', auth()->id())->count();
            $total_berat = \App\Models\Transaction::where('petugas_id', auth()->id())->sum('berat_kg');
            $total_nilai = \App\Models\Transaction::where('petugas_id', auth()->id())->sum('total_rp');
        @endphp

        <x-card 
            title="Total Transaksi" 
            value="{{ $total_transaksi }}"
            subtitle="Sepanjang waktu"
            icon="📋"
            color="green"
        />

        <x-card 
            title="Total Berat (Kg)" 
            value="{{ number_format($total_berat, 2, ',', '.') }}"
            subtitle="Yang diproses"
            icon="📦"
            color="blue"
        />

        <x-card 
            title="Total Nilai (Rp)" 
            value="{{ number_format($total_nilai, 0, ',', '.') }}"
            subtitle="Transaksi berhasil"
            icon="💰"
            color="indigo"
        />
    </div>

    <!-- Action Buttons -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <a href="/petugas/setor-mandiri" class="block p-8 bg-white rounded-lg shadow-sm border border-gray-100 hover:shadow-lg transition text-center">
            <div class="text-5xl mb-4">⚖️</div>
            <h3 class="text-2xl font-bold text-gray-900 mb-2">Input Timbangan</h3>
            <p class="text-gray-600">Catat penimbangan sampah dari nasabah</p>
        </a>

        <a href="/petugas/jemput" class="block p-8 bg-white rounded-lg shadow-sm border border-gray-100 hover:shadow-lg transition text-center">
            <div class="text-5xl mb-4">🚚</div>
            <h3 class="text-2xl font-bold text-gray-900 mb-2">Kelola Jemput</h3>
            <p class="text-gray-600">Lihat daftar permintaan jemput sampah</p>
        </a>
    </div>

    <!-- Recent Transactions -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-6">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Transaksi Terbaru</h2>

        @php $txs = \App\Models\Transaction::where('petugas_id', auth()->id())->latest()->limit(10)->with('user', 'category')->get(); @endphp

        @if($txs->isEmpty())
            <p class="text-gray-500 py-12 text-center">Belum ada transaksi</p>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-gray-200 bg-gray-50">
                            <th class="text-left p-3 font-semibold text-gray-700">Tanggal</th>
                            <th class="text-left p-3 font-semibold text-gray-700">Nasabah</th>
                            <th class="text-left p-3 font-semibold text-gray-700">Kategori</th>
                            <th class="text-right p-3 font-semibold text-gray-700">Berat (kg)</th>
                            <th class="text-right p-3 font-semibold text-gray-700">Total (Rp)</th>
                            <th class="text-center p-3 font-semibold text-gray-700">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($txs as $t)
                            <tr class="border-b border-gray-100 hover:bg-gray-50 transition">
                                <td class="p-3 text-gray-600">{{ $t->created_at->format('d M Y H:i') }}</td>
                                <td class="p-3 font-medium">{{ $t->user->name ?? '-' }}</td>
                                <td class="p-3">
                                    <span class="px-2 py-1 bg-indigo-100 text-indigo-700 rounded text-xs font-medium">
                                        {{ $t->category->name ?? '-' }}
                                    </span>
                                </td>
                                <td class="p-3 text-right text-gray-900 font-medium">{{ $t->berat_kg }}</td>
                                <td class="p-3 text-right font-semibold">Rp {{ number_format($t->total_rp, 0, ',', '.') }}</td>
                                <td class="p-3 text-center">
                                    <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-semibold">
                                        {{ ucfirst($t->status) }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection
