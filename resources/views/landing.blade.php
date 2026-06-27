@extends('layouts.master')

@section('title', 'SiSampah - Platform Bank Sampah Lokal')

@section('content')
<div class="max-w-5xl mx-auto">
    <!-- Hero Section -->
    <div class="text-center mb-16 py-12">
        <div class="inline-block w-20 h-20 bg-gradient-to-br from-indigo-600 to-indigo-700 rounded-3xl flex items-center justify-center text-4xl mb-6 shadow-lg">
            ♻️
        </div>
        
        <h1 class="text-5xl md:text-6xl font-bold text-gray-900 mb-4 leading-tight">
            SiSampah
        </h1>
        
        <p class="text-xl md:text-2xl text-gray-600 mb-8 max-w-2xl mx-auto leading-relaxed">
            Platform Bank Sampah untuk Komunitas Lokal RT/RW/Desa yang Lebih Bersih dan Menguntungkan
        </p>

        @auth
            <div class="flex gap-4 justify-center flex-wrap">
                @if(auth()->user()->hasRole('nasabah'))
                    <a href="/nasabah/dashboard" class="px-8 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 font-semibold transition shadow-lg">
                        Akses Dashboard Nasabah
                    </a>
                @elseif(auth()->user()->hasRole('petugas'))
                    <a href="/petugas/dashboard-manifes" class="px-8 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 font-semibold transition shadow-lg">
                        Dashboard Petugas
                    </a>
                @elseif(auth()->user()->hasRole('admin'))
                    <a href="/admin/dashboard" class="px-8 py-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700 font-semibold transition shadow-lg">
                        Dashboard Admin
                    </a>
                @endif
            </div>
        @else
            <div class="flex gap-4 justify-center flex-wrap">
                <a href="/login" class="px-8 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 font-semibold transition shadow-lg">
                    Login
                </a>
                <a href="/edukasi" class="px-8 py-3 bg-gray-200 text-gray-900 rounded-lg hover:bg-gray-300 font-semibold transition">
                    Pelajari Selengkapnya
                </a>
            </div>
        @endauth
    </div>

    <!-- Features Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
        <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-8 text-center hover:shadow-lg transition">
            <div class="text-5xl mb-4">💰</div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Dapatkan Uang Tunai</h3>
            <p class="text-gray-600">Tukarkan sampah Anda dengan uang tunai yang dapat langsung dicairkan</p>
        </div>

        <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-8 text-center hover:shadow-lg transition">
            <div class="text-5xl mb-4">📊</div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Pantau Progres</h3>
            <p class="text-gray-600">Dashboard real-time untuk melihat saldo, poin, dan riwayat transaksi Anda</p>
        </div>

        <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-8 text-center hover:shadow-lg transition">
            <div class="text-5xl mb-4">🌍</div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Jaga Lingkungan</h3>
            <p class="text-gray-600">Berkontribusi menjaga lingkungan sambil mendapatkan reward dan poin</p>
        </div>
    </div>

    <!-- How It Works -->
    <div class="bg-gradient-to-br from-indigo-50 to-blue-50 rounded-lg shadow-sm border border-indigo-100 p-12 mb-16">
        <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">Cara Kerja SiSampah</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="text-center">
                <div class="w-14 h-14 bg-indigo-600 text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">
                    1
                </div>
                <h4 class="font-bold text-gray-900 mb-2">Daftar</h4>
                <p class="text-gray-600 text-sm">Buat akun sebagai nasabah atau petugas</p>
            </div>

            <div class="text-center">
                <div class="w-14 h-14 bg-indigo-600 text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">
                    2
                </div>
                <h4 class="font-bold text-gray-900 mb-2">Kumpulkan</h4>
                <p class="text-gray-600 text-sm">Kumpulkan dan pisahkan sampah Anda</p>
            </div>

            <div class="text-center">
                <div class="w-14 h-14 bg-indigo-600 text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">
                    3
                </div>
                <h4 class="font-bold text-gray-900 mb-2">Setor</h4>
                <p class="text-gray-600 text-sm">Setor atau minta jemput sampah Anda</p>
            </div>

            <div class="text-center">
                <div class="w-14 h-14 bg-indigo-600 text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">
                    4
                </div>
                <h4 class="font-bold text-gray-900 mb-2">Terima</h4>
                <p class="text-gray-600 text-sm">Terima pembayaran dan poin lingkungan</p>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="text-center bg-gradient-to-r from-indigo-600 to-indigo-700 text-white rounded-lg shadow-lg p-12">
        <h2 class="text-3xl font-bold mb-4">Siap untuk Bergabung?</h2>
        <p class="text-lg mb-8 text-indigo-100">Mulai tukarkan sampah Anda dengan uang tunai hari ini</p>
        
        @auth
        @else
            <a href="/login" class="inline-block px-8 py-3 bg-white text-indigo-600 rounded-lg hover:bg-indigo-50 font-bold transition">
                Login Sekarang
            </a>
        @endauth
    </div>
</div>
@endsection