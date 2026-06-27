@extends('layouts.master')

@section('title', 'Login - SiSampah')

@section('content')
<div class="max-w-md mx-auto">
    <div class="bg-white rounded-lg shadow-lg border border-gray-100 overflow-hidden">
        <!-- Header -->
        <div class="bg-gradient-to-r from-indigo-600 to-indigo-700 px-8 py-12 text-center text-white">
            <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center text-3xl mx-auto mb-4">
                ♻️
            </div>
            <h1 class="text-2xl font-bold mb-1">SiSampah</h1>
            <p class="text-indigo-100">Platform Bank Sampah Lokal</p>
        </div>

        <!-- Form -->
        <div class="p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-1 text-center">Login</h2>
            <p class="text-center text-gray-600 text-sm mb-6">Masuk ke akun Anda</p>

            @if ($errors->any())
                <x-alert type="error" title="Login Gagal" dismissible="true">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li class="text-sm">{{ $error }}</li>
                        @endforeach
                    </ul>
                </x-alert>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                    <input name="email" type="email" required 
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                        placeholder="nama@example.com"
                        value="{{ old('email') }}" />
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                    <input name="password" type="password" required
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                        placeholder="••••••••" />
                </div>

                <button type="submit" class="w-full bg-indigo-600 text-white py-2.5 rounded-lg hover:bg-indigo-700 font-semibold transition text-lg">
                    Login
                </button>
            </form>

            <!-- Demo Accounts -->
            <div class="mt-8 pt-6 border-t border-gray-200">
                <p class="text-xs font-semibold text-gray-600 uppercase tracking-wide mb-3">Akun Demo untuk Testing</p>
                
                <div class="space-y-2">
                    <div class="bg-blue-50 p-3 rounded-lg border border-blue-200">
                        <p class="font-mono text-xs font-semibold text-blue-900">Admin</p>
                        <p class="font-mono text-xs text-blue-700">admin@sisampah.test</p>
                        <p class="font-mono text-xs text-blue-700">password</p>
                    </div>

                    <div class="bg-green-50 p-3 rounded-lg border border-green-200">
                        <p class="font-mono text-xs font-semibold text-green-900">Petugas</p>
                        <p class="font-mono text-xs text-green-700">petugas@sisampah.test</p>
                        <p class="font-mono text-xs text-green-700">password</p>
                    </div>

                    <div class="bg-indigo-50 p-3 rounded-lg border border-indigo-200">
                        <p class="font-mono text-xs font-semibold text-indigo-900">Nasabah</p>
                        <p class="font-mono text-xs text-indigo-700">nasabah@sisampah.test</p>
                        <p class="font-mono text-xs text-indigo-700">password</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="text-center mt-6 text-gray-600 text-sm">
        Kembali ke <a href="/" class="text-indigo-600 hover:underline font-semibold">Beranda</a>
    </div>
</div>
@endsection
