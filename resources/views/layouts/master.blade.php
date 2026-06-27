<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title', 'SiSampah - Platform Bank Sampah')</title>
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#4f46e5">
    <meta name="description" content="SiSampah - Platform Bank Sampah Skala Lokal RT/RW/Desa">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif; }
        .container { max-width: 1200px; margin: 0 auto; }
        .touch-target { min-height: 3rem; }
        a { text-decoration: none; }
        input::-webkit-outer-spin-button, input::-webkit-inner-spin-button { -webkit-appearance: none; margin: 0; }
        input[type=number] { -moz-appearance: textfield; }
        @media (min-width: 768px) { nav.fixed.bottom-0 { display: none !important; } }
    </style>
    @yield('styles')
</head>
<body class="bg-gray-50">
    <div id="app" class="pb-24 md:pb-0 flex flex-col min-h-screen">
        <!-- Top Navigation -->
        <header class="bg-white shadow-sm sticky top-0 z-50 border-b border-gray-100">
            <div class="container mx-auto px-4 py-4">
                <div class="flex justify-between items-center">
                    <a href="/" class="flex items-center gap-3 hover:opacity-80 transition">
                        <div class="w-10 h-10 bg-gradient-to-br from-indigo-600 to-indigo-700 rounded-lg flex items-center justify-center text-white font-bold text-lg">
                            S
                        </div>
                        <span class="text-xl font-bold text-gray-900">SiSampah</span>
                    </a>

                    <nav class="hidden md:flex gap-8 items-center">
                        <a href="/" class="text-gray-600 hover:text-indigo-600 transition font-medium">Home</a>
                        <a href="/edukasi" class="text-gray-600 hover:text-indigo-600 transition font-medium">Edukasi</a>
                        @auth
                            <div class="flex items-center gap-4 pl-4 border-l border-gray-200">
                                <span class="text-gray-700 text-sm">
                                    <span class="font-medium">{{ auth()->user()->name }}</span>
                                    <span class="text-gray-500 text-xs block">{{ auth()->user()->roles->first()?->name ?? 'User' }}</span>
                                </span>
                                <a href="/logout" class="px-4 py-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition text-sm font-medium">
                                    Logout
                                </a>
                            </div>
                        @else
                            <a href="/login" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition font-medium text-sm">
                                Login
                            </a>
                        @endauth
                    </nav>

                    <!-- Mobile Menu Button -->
                    <button id="mobile-menu-btn" class="md:hidden p-2 hover:bg-gray-100 rounded-lg transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>

                <!-- Mobile Menu -->
                <div id="mobile-menu" class="hidden md:hidden mt-4 pt-4 border-t border-gray-100 space-y-3">
                    <a href="/" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg transition">Home</a>
                    <a href="/edukasi" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg transition">Edukasi</a>
                    @auth
                        <div class="px-4 py-2 border-t border-gray-100 mt-3 pt-3">
                            <p class="text-sm font-medium text-gray-900">{{ auth()->user()->name }}</p>
                            <p class="text-xs text-gray-500">{{ auth()->user()->roles->first()?->name ?? 'User' }}</p>
                        </div>
                        <a href="/logout" class="block px-4 py-2 text-red-600 hover:bg-red-50 rounded-lg transition text-sm font-medium">
                            Logout
                        </a>
                    @else
                        <a href="/login" class="block px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition text-center font-medium">
                            Login
                        </a>
                    @endauth
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-1 container mx-auto px-4 py-6 md:py-8">
            @if(session('status'))
                <x-alert type="success" dismissible="true">
                    {{ session('status') }}
                </x-alert>
            @endif

            @if($errors->any())
                <x-alert type="error" title="Terjadi Kesalahan" dismissible="true">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </x-alert>
            @endif

            @yield('content')
        </main>

        <!-- Floating Chatbot Button -->
        <div id="chatbot-slot" style="position:fixed;right:24px;bottom:104px;z-index:60" class="md:bottom-6">
            <button id="open-chatbot" class="bg-indigo-600 text-white p-4 rounded-full shadow-lg hover:bg-indigo-700 transition-all hover:scale-110 w-14 h-14 flex items-center justify-center text-xl" title="Chatbot AI">
                💬
            </button>
        </div>

        <!-- Mobile Bottom Navigation -->
        <nav class="fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 md:hidden">
            <div class="flex justify-around items-stretch px-0">
                <a href="/" class="flex-1 touch-target flex flex-col items-center justify-center text-xs text-gray-600 hover:bg-gray-50 transition py-2 border-r border-gray-100 last:border-r-0">
                    <span class="text-xl mb-1">🏠</span>
                    Home
                </a>
                @auth
                    @if(auth()->user()->hasRole('nasabah'))
                        <a href="/nasabah/dashboard" class="flex-1 touch-target flex flex-col items-center justify-center text-xs text-gray-600 hover:bg-gray-50 transition py-2 border-r border-gray-100 last:border-r-0">
                            <span class="text-xl mb-1">📊</span>
                            Dashboard
                        </a>
                        <a href="/nasabah/jemput-sampah" class="flex-1 touch-target flex flex-col items-center justify-center text-xs text-gray-600 hover:bg-gray-50 transition py-2 border-r border-gray-100 last:border-r-0">
                            <span class="text-xl mb-1">📦</span>
                            Jemput
                        </a>
                        <a href="/nasabah/dompet" class="flex-1 touch-target flex flex-col items-center justify-center text-xs text-gray-600 hover:bg-gray-50 transition py-2 border-r border-gray-100 last:border-r-0">
                            <span class="text-xl mb-1">💰</span>
                            Dompet
                        </a>
                    @elseif(auth()->user()->hasRole('petugas'))
                        <a href="/petugas/dashboard-manifes" class="flex-1 touch-target flex flex-col items-center justify-center text-xs text-gray-600 hover:bg-gray-50 transition py-2 border-r border-gray-100 last:border-r-0">
                            <span class="text-xl mb-1">📋</span>
                            Manifes
                        </a>
                        <a href="/petugas/setor-mandiri" class="flex-1 touch-target flex flex-col items-center justify-center text-xs text-gray-600 hover:bg-gray-50 transition py-2 border-r border-gray-100 last:border-r-0">
                            <span class="text-xl mb-1">⚖️</span>
                            Input
                        </a>
                    @elseif(auth()->user()->hasRole('admin'))
                        <a href="/admin/dashboard" class="flex-1 touch-target flex flex-col items-center justify-center text-xs text-gray-600 hover:bg-gray-50 transition py-2 border-r border-gray-100 last:border-r-0">
                            <span class="text-xl mb-1">📊</span>
                            Dashboard
                        </a>
                        <a href="/admin/validasi-keuangan" class="flex-1 touch-target flex flex-col items-center justify-center text-xs text-gray-600 hover:bg-gray-50 transition py-2 border-r border-gray-100 last:border-r-0">
                            <span class="text-xl mb-1">✓</span>
                            Validasi
                        </a>
                    @endif
                @else
                    <a href="/edukasi" class="flex-1 touch-target flex flex-col items-center justify-center text-xs text-gray-600 hover:bg-gray-50 transition py-2 border-r border-gray-100 last:border-r-0">
                        <span class="text-xl mb-1">📚</span>
                        Edukasi
                    </a>
                @endauth
            </div>
        </nav>
    </div>

    <!-- Service Worker Registration -->
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('/sw.js').catch(err => {
                    console.warn('ServiceWorker registration failed: ', err);
                });
            });
        }

        // Mobile menu toggle
        document.getElementById('mobile-menu-btn')?.addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });

        // Chatbot button
        document.getElementById('open-chatbot')?.addEventListener('click', function() {
            alert('Fitur chatbot AI sedang dalam pengembangan. Terima kasih atas kesabaran Anda.');
        });
    </script>

    @yield('scripts')
</body>
</html>