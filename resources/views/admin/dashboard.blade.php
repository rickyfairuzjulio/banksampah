@extends('layouts.master')

@section('title', 'Dashboard Admin - SiSampah')

@section('content')
<div class="max-w-6xl mx-auto">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">Dashboard Admin</h1>
        <p class="text-gray-600">Pantau dan kelola sistem bank sampah</p>
    </div>

    <!-- Quick Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
        <x-card 
            title="Total Nasabah" 
            value="{{ \App\Models\User::whereHas('roles', fn($q) => $q->where('name', 'nasabah'))->count() }}"
            icon="👥"
            color="indigo"
        />

        <x-card 
            title="Total Transaksi" 
            value="{{ \App\Models\Transaction::count() }}"
            icon="📋"
            color="green"
        />

        <x-card 
            title="Total Berat (Kg)" 
            value="{{ number_format(\App\Models\Transaction::sum('berat_kg') ?? 0, 1, ',', '.') }}"
            icon="📦"
            color="blue"
        />

        <x-card 
            title="Total Nilai (Rp)" 
            value="{{ number_format(\App\Models\Transaction::sum('total_rp') ?? 0, 0, ',', '.') }}"
            icon="💰"
            color="amber"
        />
    </div>

    <!-- Chart Section -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-6 mb-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Peta Kompetisi Kebersihan (Bulan Ini)</h2>
        <div style="position: relative; height: 400px;">
            <canvas id="rtChart"></canvas>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <a href="/admin/harga-sampah" class="block p-6 bg-white rounded-lg shadow-sm border border-gray-100 hover:shadow-lg transition text-center">
            <div class="text-4xl mb-3">💵</div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Master Harga</h3>
            <p class="text-gray-600 text-sm">Kelola harga sampah</p>
        </a>

        <a href="/admin/validasi-keuangan" class="block p-6 bg-white rounded-lg shadow-sm border border-gray-100 hover:shadow-lg transition text-center">
            <div class="text-4xl mb-3">✓</div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Validasi Keuangan</h3>
            <p class="text-gray-600 text-sm">Persetujuan penarikan dana</p>
        </a>

        <a href="/admin/laporan" class="block p-6 bg-white rounded-lg shadow-sm border border-gray-100 hover:shadow-lg transition text-center">
            <div class="text-4xl mb-3">📊</div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Laporan Logistik</h3>
            <p class="text-gray-600 text-sm">Analisis data transaksi</p>
        </a>
    </div>

    <!-- Additional Links -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <a href="/admin/konfigurasi-wilayah" class="block p-6 bg-white rounded-lg shadow-sm border border-gray-100 hover:shadow-lg transition">
            <h3 class="text-lg font-bold text-gray-900 mb-2">⚙️ Konfigurasi Wilayah</h3>
            <p class="text-gray-600 text-sm">Kelola RT/RW dan geofencing</p>
        </a>

        <a href="/edukasi" class="block p-6 bg-white rounded-lg shadow-sm border border-gray-100 hover:shadow-lg transition">
            <h3 class="text-lg font-bold text-gray-900 mb-2">📚 Kelola Edukasi</h3>
            <p class="text-gray-600 text-sm">Buat dan kelola artikel edukasi</p>
        </a>
    </div>
</div>

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4"></script>
<script>
    const labels = {!! json_encode($labels ?? []) !!};
    const values = {!! json_encode($values ?? []) !!};

    const ctx = document.getElementById('rtChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Total Berat (Kg) - Bulan Ini',
                data: values,
                backgroundColor: [
                    'rgba(99, 102, 241, 0.8)',
                    'rgba(34, 197, 94, 0.8)',
                    'rgba(59, 130, 246, 0.8)',
                    'rgba(139, 92, 246, 0.8)',
                    'rgba(236, 72, 153, 0.8)',
                ],
                borderColor: [
                    'rgba(99, 102, 241, 1)',
                    'rgba(34, 197, 94, 1)',
                    'rgba(59, 130, 246, 1)',
                    'rgba(139, 92, 246, 1)',
                    'rgba(236, 72, 153, 1)',
                ],
                borderWidth: 2,
                borderRadius: 8,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                    labels: {
                        font: { size: 14 },
                        padding: 20,
                    }
                }
            },
            scales: {
                y: { 
                    beginAtZero: true,
                    ticks: { font: { size: 12 } },
                    grid: { drawBorder: false }
                },
                x: {
                    ticks: { font: { size: 12 } },
                    grid: { display: false }
                }
            }
        }
    });
</script>
@endsection

@endsection