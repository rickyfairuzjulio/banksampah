@extends('layouts.master')

@section('content')
<div class="max-w-4xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Konfigurasi Wilayah</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Data Wilayah Terdaftar</h2>

            @php
                $areas = \App\Models\User::select('rt', 'rw')->distinct()->orderBy('rt')->orderBy('rw')->get();
            @endphp

            @if($areas->isEmpty())
                <p class="text-gray-500 text-center py-6">Belum ada wilayah terdaftar</p>
            @else
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b bg-gray-50">
                            <th class="text-left p-3 font-semibold">RT</th>
                            <th class="text-left p-3 font-semibold">RW</th>
                            <th class="text-center p-3 font-semibold">Jumlah Nasabah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($areas as $area)
                            @php
                                $count = \App\Models\User::where('rt', $area->rt)
                                    ->where('rw', $area->rw)
                                    ->whereHas('roles', function ($q) {
                                        $q->where('name', 'nasabah');
                                    })->count();
                            @endphp
                            <tr class="border-b hover:bg-gray-50">
                                <td class="p-3">{{ $area->rt }}</td>
                                <td class="p-3">{{ $area->rw }}</td>
                                <td class="text-center p-3">{{ $count }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Informasi Sistem</h2>

            <div class="space-y-4">
                <div class="bg-indigo-50 p-4 rounded">
                    <h3 class="font-semibold text-indigo-900 mb-2">📊 Total Nasabah</h3>
                    @php
                        $total_nasabah = \App\Models\User::whereHas('roles', function ($q) {
                            $q->where('name', 'nasabah');
                        })->count();
                    @endphp
                    <p class="text-2xl font-bold text-indigo-600">{{ $total_nasabah }}</p>
                </div>

                <div class="bg-green-50 p-4 rounded">
                    <h3 class="font-semibold text-green-900 mb-2">📦 Total Transaksi</h3>
                    @php
                        $total_tx = \App\Models\Transaction::count();
                    @endphp
                    <p class="text-2xl font-bold text-green-600">{{ $total_tx }}</p>
                </div>

                <div class="bg-blue-50 p-4 rounded">
                    <h3 class="font-semibold text-blue-900 mb-2">💰 Total Nilai Transaksi</h3>
                    @php
                        $total_value = \App\Models\Transaction::sum('total_rp');
                    @endphp
                    <p class="text-2xl font-bold text-blue-600">Rp {{ number_format($total_value, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
