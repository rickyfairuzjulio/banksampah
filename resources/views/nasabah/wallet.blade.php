@extends('layouts.master')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-gray-600 font-semibold mb-2">Saldo Tunai</h3>
            <div class="text-4xl font-bold text-indigo-600">Rp {{ number_format($user->saldo ?? 0, 0, ',', '.') }}</div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-gray-600 font-semibold mb-2">Total Poin Lingkungan</h3>
            <div class="text-4xl font-bold text-green-600">{{ $user->total_poin_lingkungan ?? 0 }}</div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-gray-600 font-semibold mb-2">Total Transaksi</h3>
            @php $tx_count = $user->transactions()->count(); @endphp
            <div class="text-4xl font-bold text-blue-600">{{ $tx_count }}</div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-2xl font-bold text-gray-800 mb-4">Riwayat Transaksi</h3>

        @php $txs = $user->transactions()->latest()->with('category')->paginate(20); @endphp

        @if($txs->isEmpty())
            <p class="text-gray-500 py-8 text-center">Belum ada transaksi</p>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b bg-gray-50">
                            <th class="text-left p-3 font-semibold">Tanggal</th>
                            <th class="text-left p-3 font-semibold">Kategori</th>
                            <th class="text-right p-3 font-semibold">Berat (kg)</th>
                            <th class="text-right p-3 font-semibold">Harga/kg</th>
                            <th class="text-right p-3 font-semibold">Total</th>
                            <th class="text-right p-3 font-semibold">Poin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($txs as $t)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="p-3">{{ $t->created_at->format('d M Y H:i') }}</td>
                                <td class="p-3">{{ $t->category->name ?? '-' }}</td>
                                <td class="text-right p-3">{{ $t->berat_kg }}</td>
                                <td class="text-right p-3">Rp {{ number_format($t->harga_snapshot ?? 0, 0, ',', '.') }}</td>
                                <td class="text-right p-3 font-semibold">Rp {{ number_format($t->total_rp, 0, ',', '.') }}</td>
                                <td class="text-right p-3 font-semibold text-green-600">+{{ $t->poin_awarded ?? 0 }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $txs->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
