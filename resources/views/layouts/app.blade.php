<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SSO Portal Layanan Kampus') - Politeknik</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                        }
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen flex flex-col">

    <!-- Top SSO Status Bar -->
    @auth
    <div class="bg-gradient-to-r from-blue-700 via-indigo-700 to-blue-800 text-white text-xs py-1.5 px-4">
        <div class="max-w-7xl mx-auto flex flex-wrap items-center justify-between gap-2">
            <div class="flex items-center space-x-2">
                <span class="inline-block w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                <span class="font-semibold tracking-wide uppercase">Sesi SSO Terpusat Aktif</span>
                <span class="text-blue-200">|</span>
                <span class="text-blue-100">Identity Provider (IdP): <strong class="text-white">Google OAuth 2.0</strong></span>
            </div>
            <div class="text-blue-200 hidden md:block">
                Token ID: <span class="font-mono text-white">{{ substr(Auth::user()->google_id ?? 'SSO-LOCAL-MOCK', 0, 16) }}...</span>
            </div>
        </div>
    </div>
    @endauth

    <!-- Main Navigation Bar -->
    <header class="bg-white border-b border-slate-200 sticky top-0 z-40 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Brand / Logo -->
                <div class="flex items-center space-x-3">
                    <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-blue-600 to-indigo-600 flex items-center justify-center text-white shadow-md shadow-blue-500/20 group-hover:scale-105 transition-transform">
                            <i class="fa-solid fa-graduation-cap text-lg"></i>
                        </div>
                        <div>
                            <div class="font-extrabold text-lg text-slate-900 tracking-tight leading-tight flex items-center gap-1.5">
                                POLITEKNIK <span class="text-blue-600 text-xs px-2 py-0.5 rounded-full bg-blue-50 border border-blue-200 uppercase font-bold tracking-wider">SSO Hub</span>
                            </div>
                            <p class="text-xs text-slate-500">Single Sign-On Campus Ecosystem</p>
                        </div>
                    </a>
                </div>

                @auth
                <!-- Navigation Links for Services -->
                <nav class="hidden lg:flex items-center space-x-1">
                    <a href="{{ route('portal') }}" class="px-3.5 py-2 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('portal') ? 'bg-blue-50 text-blue-700 font-semibold' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100' }}">
                        <i class="fa-solid fa-grid-2 mr-1.5"></i> Portal Utama
                    </a>
                    <a href="{{ route('services.akademik') }}" class="px-3.5 py-2 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('services.akademik') ? 'bg-indigo-50 text-indigo-700 font-semibold' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100' }}">
                        <i class="fa-solid fa-chart-user mr-1.5 text-indigo-500"></i> Akademik (SIAKAD)
                    </a>
                    <a href="{{ route('services.elearning') }}" class="px-3.5 py-2 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('services.elearning') ? 'bg-emerald-50 text-emerald-700 font-semibold' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100' }}">
                        <i class="fa-solid fa-laptop-code mr-1.5 text-emerald-500"></i> E-Learning
                    </a>
                    <a href="{{ route('services.perpustakaan') }}" class="px-3.5 py-2 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('services.perpustakaan') ? 'bg-amber-50 text-amber-700 font-semibold' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100' }}">
                        <i class="fa-solid fa-book-bookmark mr-1.5 text-amber-500"></i> Perpustakaan
                    </a>
                </nav>

                <!-- User Profile & Single Sign-Out -->
                <div class="flex items-center space-x-3">
                    <div class="flex items-center space-x-3 pl-3 border-l border-slate-200">
                        <img src="{{ Auth::user()->avatar ?: 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name).'&background=3b82f6&color=fff' }}" 
                             alt="{{ Auth::user()->name }}" 
                             class="w-9 h-9 rounded-full ring-2 ring-blue-500/20 object-cover">
                        <div class="hidden sm:block text-left">
                            <div class="text-sm font-bold text-slate-800 leading-none truncate max-w-[150px]">
                                {{ Auth::user()->name }}
                            </div>
                            <div class="text-[11px] text-slate-500 truncate max-w-[150px] mt-0.5">
                                {{ Auth::user()->email }}
                            </div>
                        </div>
                    </div>

                    <!-- Single Sign-Out Button -->
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" 
                                onclick="return confirm('Apakah Anda yakin ingin Single Sign-Out? Seluruh sesi layanan kampus akan ditutup.')" 
                                class="inline-flex items-center px-3 py-1.5 text-xs font-semibold rounded-lg text-red-600 bg-red-50 hover:bg-red-100 border border-red-200 transition-colors"
                                title="Single Sign-Out dari seluruh layanan">
                            <i class="fa-solid fa-arrow-right-from-bracket mr-1.5"></i>
                            <span class="hidden md:inline">Logout SSO</span>
                        </button>
                    </form>
                </div>
                @else
                <div>
                    <a href="{{ route('login') }}" class="inline-flex items-center px-4 py-2 text-sm font-bold rounded-xl text-white bg-blue-600 hover:bg-blue-700 shadow-md shadow-blue-500/20 transition-all">
                        <i class="fa-brands fa-google mr-2"></i> Gerbang Login SSO
                    </a>
                </div>
                @endauth
            </div>
        </div>
    </header>

    <!-- Mobile Nav Bar (Small screens) -->
    @auth
    <div class="lg:hidden bg-white border-b border-slate-200 px-4 py-2 overflow-x-auto flex space-x-2 text-xs">
        <a href="{{ route('portal') }}" class="px-3 py-1.5 rounded-lg whitespace-nowrap {{ request()->routeIs('portal') ? 'bg-blue-600 text-white font-bold' : 'text-slate-600 bg-slate-100' }}">Portal</a>
        <a href="{{ route('services.akademik') }}" class="px-3 py-1.5 rounded-lg whitespace-nowrap {{ request()->routeIs('services.akademik') ? 'bg-indigo-600 text-white font-bold' : 'text-slate-600 bg-slate-100' }}">Akademik</a>
        <a href="{{ route('services.elearning') }}" class="px-3 py-1.5 rounded-lg whitespace-nowrap {{ request()->routeIs('services.elearning') ? 'bg-emerald-600 text-white font-bold' : 'text-slate-600 bg-slate-100' }}">E-Learning</a>
        <a href="{{ route('services.perpustakaan') }}" class="px-3 py-1.5 rounded-lg whitespace-nowrap {{ request()->routeIs('services.perpustakaan') ? 'bg-amber-600 text-white font-bold' : 'text-slate-600 bg-slate-100' }}">Perpustakaan</a>
    </div>
    @endauth

    <!-- Notification Toasts -->
    <main class="flex-1">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-4">
            @if(session('success'))
            <div class="mb-4 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 flex items-center justify-between shadow-sm animate-fade-in">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>
                    <span class="text-sm font-medium">{{ session('success') }}</span>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-800 text-sm">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            @endif

            @if(session('error'))
            <div class="mb-4 p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 flex items-center justify-between shadow-sm">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 rounded-lg bg-rose-100 text-rose-700 flex items-center justify-center font-bold">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                    </div>
                    <span class="text-sm font-medium">{{ session('error') }}</span>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-rose-500 hover:text-rose-800 text-sm">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            @endif

            @if(session('warning'))
            <div class="mb-4 p-4 rounded-xl bg-amber-50 border border-amber-200 text-amber-800 flex items-center justify-between shadow-sm">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 rounded-lg bg-amber-100 text-amber-700 flex items-center justify-center font-bold">
                        <i class="fa-solid fa-circle-info"></i>
                    </div>
                    <span class="text-sm font-medium">{{ session('warning') }}</span>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-amber-500 hover:text-amber-800 text-sm">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            @endif

            @if(session('info'))
            <div class="mb-4 p-4 rounded-xl bg-blue-50 border border-blue-200 text-blue-800 flex items-center justify-between shadow-sm">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 rounded-lg bg-blue-100 text-blue-700 flex items-center justify-center font-bold">
                        <i class="fa-solid fa-info"></i>
                    </div>
                    <span class="text-sm font-medium">{{ session('info') }}</span>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-blue-500 hover:text-blue-800 text-sm">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            @endif
        </div>

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-slate-200 mt-16 py-6 text-center text-xs text-slate-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center justify-between gap-4">
            <div class="flex items-center space-x-2">
                <i class="fa-solid fa-shield-halved text-blue-600"></i>
                <span>Tugas Praktikum Web Service & SSO &copy; {{ date('Y') }} - Politeknik</span>
            </div>
            <div class="flex items-center space-x-4 text-slate-400">
                <span>OAuth 2.0 / OpenID Connect</span>
                <span>•</span>
                <span>Laravel Socialite</span>
                <span>•</span>
                <span>Single Sign-On Architecture</span>
            </div>
        </div>
    </footer>

</body>
</html>

