@extends('layouts.master')

@section('title', 'Dashboard Nasabah - SiSampah')

@section('content')
<div class="max-w-6xl mx-auto">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">Dashboard Nasabah</h1>
        <p class="text-gray-600">Kelola saldo dan transaksi sampah Anda</p>
    </div>

    <!-- Info Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <x-card 
            title="Saldo Aktif" 
            value="Rp {{ number_format($user->saldo ?? 0, 0, ',', '.') }}"
            subtitle="Siap untuk ditarik"
            icon="💰"
            color="indigo"
        />

        <x-card 
            title="Poin Lingkungan" 
            value="{{ $user->total_poin_lingkungan ?? 0 }}"
            subtitle="Dari {{ $user->transactions()->count() }} transaksi"
            icon="🌱"
            color="green"
        />

        <x-card 
            title="Total Berat Setoran" 
            value="{{ number_format($user->transactions()->sum('berat_kg') ?? 0, 2, ',', '.') }} kg"
            subtitle="Sepanjang waktu"
            icon="📦"
            color="blue"
        />
    </div>

    <!-- Harga Sampah & Transaksi Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <!-- Harga Sampah -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-6">
                <h2 class="text-lg font-bold text-gray-900 mb-4">Harga Sampah Hari Ini</h2>
                <div class="space-y-3">
                    @foreach($prices as $p)
                        <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg hover:bg-indigo-50 transition">
                            <div>
                                <p class="font-semibold text-gray-900 text-sm">{{ $p->name }}</p>
                                <p class="text-xs text-gray-500">{{ $p->material_type === 'organik' ? 'Organik (10 Poin/kg)' : 'Anorganik (20 Poin/kg)' }}</p>
                            </div>
                            <p class="font-bold text-indigo-600 text-sm">Rp {{ number_format($p->price_per_kg, 0, ',', '.') }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Transaksi Terbaru -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-6">
                <h2 class="text-lg font-bold text-gray-900 mb-4">Riwayat Transaksi Terbaru</h2>
                
                @php $txs = $user->transactions()->latest()->limit(8)->with('category')->get(); @endphp

                @if($txs->isEmpty())
                    <p class="text-gray-500 text-center py-8">Belum ada transaksi</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead>
                                <tr class="border-b border-gray-200 text-gray-600">
                                    <th class="text-left p-2 font-semibold">Tanggal</th>
                                    <th class="text-left p-2 font-semibold">Kategori</th>
                                    <th class="text-right p-2 font-semibold">Berat</th>
                                    <th class="text-right p-2 font-semibold">Total</th>
                                    <th class="text-right p-2 font-semibold">Poin</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($txs as $t)
                                    <tr class="border-b border-gray-100 hover:bg-gray-50 transition">
                                        <td class="p-2 text-gray-600">{{ $t->created_at->format('d M Y') }}</td>
                                        <td class="p-2">
                                            <span class="px-2 py-1 bg-indigo-100 text-indigo-700 rounded text-xs font-medium">
                                                {{ $t->category->name ?? '-' }}
                                            </span>
                                        </td>
                                        <td class="p-2 text-right text-gray-900 font-medium">{{ $t->berat_kg }} kg</td>
                                        <td class="p-2 text-right text-gray-900 font-semibold">Rp {{ number_format($t->total_rp, 0, ',', '.') }}</td>
                                        <td class="p-2 text-right">
                                            <span class="font-bold text-green-600">+{{ $t->poin_awarded ?? 0 }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="mt-4 text-center">
                        <a href="/nasabah/dompet" class="text-indigo-600 hover:text-indigo-700 font-medium text-sm">
                            Lihat Semua Transaksi →
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Top 5 Pahlawan Lingkungan -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-6 mb-8">
        <h2 class="text-lg font-bold text-gray-900 mb-4">Top 5 Pahlawan Lingkungan Bulan Ini</h2>
        
        @php
            $leaders = \App\Models\User::whereHas('roles', function ($q) {
                $q->where('name', 'nasabah');
            })
            ->withCount(['transactions as month_transactions' => function ($q) {
                $q->whereMonth('created_at', now()->month)
                  ->whereYear('created_at', now()->year);
            }])
            ->orderByDesc('total_poin_lingkungan')
            ->limit(5)
            ->get();
        @endphp

        @if($leaders->isEmpty())
            <p class="text-gray-500 text-center py-8">Belum ada data peringkat</p>
        @else
            <div class="space-y-3">
                @foreach($leaders as $idx => $leader)
                    <div class="flex items-center justify-between p-4 bg-gradient-to-r {{ 
                        match($idx) {
                            0 => 'from-amber-50 to-amber-100 border border-amber-200',
                            1 => 'from-gray-100 to-gray-50 border border-gray-200',
                            2 => 'from-orange-50 to-orange-100 border border-orange-200',
                            default => 'from-gray-50 to-gray-50 border border-gray-100'
                        }
                    }} rounded-lg hover:shadow-md transition">
                        <div class="flex items-center gap-4 flex-1">
                            <div class="w-10 h-10 rounded-full bg-indigo-600 text-white flex items-center justify-center font-bold text-sm">
                                {{ $idx + 1 }}
                            </div>
                            <div class="flex-1">
                                <p class="font-bold text-gray-900">{{ $leader->name }}</p>
                                <p class="text-xs text-gray-500">RT {{ $leader->rt ?? '-' }}/RW {{ $leader->rw ?? '-' }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="font-bold text-lg text-indigo-600">{{ $leader->total_poin_lingkungan }}</p>
                            <p class="text-xs text-gray-500">poin</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <!-- Action Buttons -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <a href="/nasabah/jemput-sampah" class="block p-6 bg-gradient-to-br from-indigo-600 to-indigo-700 text-white rounded-lg shadow-lg hover:shadow-xl transition text-center hover:scale-105 transform">
            <div class="text-4xl mb-3">📦</div>
            <h3 class="font-bold text-lg mb-1">Ajukan Jemput</h3>
            <p class="text-indigo-100 text-sm">Minta petugas jemput sampah Anda</p>
        </a>

        <a href="/nasabah/dompet" class="block p-6 bg-gradient-to-br from-green-600 to-green-700 text-white rounded-lg shadow-lg hover:shadow-xl transition text-center hover:scale-105 transform">
            <div class="text-4xl mb-3">💰</div>
            <h3 class="font-bold text-lg mb-1">Dompet & Tarik Saldo</h3>
            <p class="text-green-100 text-sm">Kelola saldo dan ajukan penarikan</p>
        </a>
    </div>
</div>
@endsection
