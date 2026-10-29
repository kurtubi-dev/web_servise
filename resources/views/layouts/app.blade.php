<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portal Layanan Terpadu') &mdash; Politeknik</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'system-ui', '-apple-system', 'sans-serif'],
                        mono: ['JetBrains Mono', 'Fira Code', 'Courier New', 'monospace'],
                    },
                    colors: {
                        institutional: {
                            50: '#f8fafc',
                            100: '#f1f5f9',
                            800: '#1e293b',
                            900: '#0f172a',
                            950: '#020617',
                        }
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#f8fafc] text-slate-800 min-h-screen flex flex-col antialiased selection:bg-slate-900 selection:text-white">

    <!-- Institutional Status Bar (High-Craft SSO Indicator) -->
    @auth
    <div class="bg-[#0f172a] text-slate-300 text-[11px] border-b border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2 flex flex-wrap items-center justify-between gap-3">
            <div class="flex items-center space-x-2.5">
                <span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded bg-emerald-950/80 text-emerald-400 border border-emerald-800/60 font-mono text-[10px] uppercase font-bold tracking-wider">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                    SSO Active
                </span>
                <span class="text-slate-500">/</span>
                <span class="text-slate-400">IdP: <strong class="text-slate-200 font-medium">Google Accounts (OIDC)</strong></span>
            </div>
            <div class="font-mono text-slate-400 hidden sm:flex items-center space-x-2 text-[11px]">
                <span class="text-slate-500">Identity UID:</span>
                <span class="text-slate-200 bg-slate-800/80 px-2 py-0.5 rounded border border-slate-700/60">{{ substr(Auth::user()->google_id ?? 'SSO-LOCAL', 0, 20) }}...</span>
            </div>
        </div>
    </div>
    @endauth

    <!-- Main Navigation Bar -->
    <header class="bg-white border-b border-slate-200/90 sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                
                <!-- Institutional Brand -->
                <div class="flex items-center space-x-3">
                    <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                        <div class="w-9 h-9 rounded-lg bg-slate-900 text-white flex items-center justify-center font-bold text-sm shadow-sm group-hover:bg-blue-900 transition-colors">
                            <i class="fa-solid fa-building-columns"></i>
                        </div>
                        <div>
                            <div class="font-extrabold text-slate-900 tracking-tight text-sm uppercase flex items-center gap-2">
                                POLITEKNIK <span class="text-[10px] font-semibold text-slate-500 lowercase font-mono bg-slate-100 px-1.5 py-0.5 rounded border border-slate-200">sso.portal</span>
                            </div>
                            <p class="text-[11px] text-slate-500 font-medium tracking-tight">Sistem Autentikasi Terpadu Layanan Kampus</p>
                        </div>
                    </a>
                </div>

                @auth
                <!-- Desktop Nav -->
                <nav class="hidden lg:flex items-center space-x-1">
                    <a href="{{ route('portal') }}" class="px-3 py-1.5 rounded-md text-xs font-semibold transition-colors {{ request()->routeIs('portal') ? 'bg-slate-100 text-slate-900 font-bold' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
                        <i class="fa-solid fa-compass mr-1.5 text-slate-400"></i> Portal Utama
                    </a>
                    <a href="{{ route('services.akademik') }}" class="px-3 py-1.5 rounded-md text-xs font-semibold transition-colors {{ request()->routeIs('services.akademik') ? 'bg-indigo-50 text-indigo-900 font-bold' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
                        <i class="fa-solid fa-graduation-cap mr-1.5 text-indigo-600"></i> Akademik (SIAKAD)
                    </a>
                    <a href="{{ route('services.elearning') }}" class="px-3 py-1.5 rounded-md text-xs font-semibold transition-colors {{ request()->routeIs('services.elearning') ? 'bg-emerald-50 text-emerald-900 font-bold' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
                        <i class="fa-solid fa-laptop-code mr-1.5 text-emerald-600"></i> E-Learning
                    </a>
                    <a href="{{ route('services.perpustakaan') }}" class="px-3 py-1.5 rounded-md text-xs font-semibold transition-colors {{ request()->routeIs('services.perpustakaan') ? 'bg-amber-50 text-amber-900 font-bold' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
                        <i class="fa-solid fa-book-bookmark mr-1.5 text-amber-600"></i> Perpustakaan
                    </a>
                </nav>

                <!-- User Profile & Single Sign-Out -->
                <div class="flex items-center space-x-3">
                    <div class="flex items-center space-x-2.5 pl-3 border-l border-slate-200">
                        <!-- Avatar with resilient fallback to avoid broken image -->
                        <img src="{{ Auth::user()->avatar ?: 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name).'&background=0f172a&color=fff&bold=true' }}" 
                             alt="{{ Auth::user()->name }}"
                             onerror="this.onerror=null; this.src='https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0f172a&color=fff&bold=true';" 
                             class="w-8 h-8 rounded-full border border-slate-300 object-cover bg-slate-100 flex-shrink-0">
                        <div class="hidden sm:block text-left">
                            <div class="text-xs font-bold text-slate-900 leading-tight truncate max-w-[140px]">
                                {{ Auth::user()->name }}
                            </div>
                            <div class="text-[10px] text-slate-500 font-mono truncate max-w-[140px]">
                                {{ Auth::user()->email }}
                            </div>
                        </div>
                    </div>

                    <!-- Single Sign-Out Button -->
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" 
                                onclick="return confirm('Single Sign-Out: Apakah Anda yakin ingin keluar dari seluruh layanan kampus?')" 
                                class="inline-flex items-center px-2.5 py-1.5 text-xs font-semibold rounded-md text-slate-700 hover:text-rose-700 bg-slate-100 hover:bg-rose-50 border border-slate-200 hover:border-rose-200 transition-colors"
                                title="Single Sign-Out (Logout Serentak)">
                            <i class="fa-solid fa-arrow-right-from-bracket sm:mr-1.5 text-xs"></i>
                            <span class="hidden sm:inline">Logout SSO</span>
                        </button>
                    </form>
                </div>
                @else
                <div>
                    <a href="{{ route('login') }}" class="inline-flex items-center px-3.5 py-2 text-xs font-bold rounded-lg text-white bg-slate-900 hover:bg-slate-800 transition-colors">
                        <i class="fa-solid fa-lock mr-2 text-xs"></i> SSO Gateway
                    </a>
                </div>
                @endauth

            </div>
        </div>
    </header>

    <!-- Mobile Nav Bar -->
    @auth
    <div class="lg:hidden bg-white border-b border-slate-200 px-4 py-2 overflow-x-auto flex space-x-2 text-xs">
        <a href="{{ route('portal') }}" class="px-3 py-1 rounded-md whitespace-nowrap {{ request()->routeIs('portal') ? 'bg-slate-900 text-white font-bold' : 'text-slate-600 bg-slate-100' }}">Portal Utama</a>
        <a href="{{ route('services.akademik') }}" class="px-3 py-1 rounded-md whitespace-nowrap {{ request()->routeIs('services.akademik') ? 'bg-indigo-700 text-white font-bold' : 'text-slate-600 bg-slate-100' }}">Akademik</a>
        <a href="{{ route('services.elearning') }}" class="px-3 py-1 rounded-md whitespace-nowrap {{ request()->routeIs('services.elearning') ? 'bg-emerald-700 text-white font-bold' : 'text-slate-600 bg-slate-100' }}">E-Learning</a>
        <a href="{{ route('services.perpustakaan') }}" class="px-3 py-1 rounded-md whitespace-nowrap {{ request()->routeIs('services.perpustakaan') ? 'bg-amber-700 text-white font-bold' : 'text-slate-600 bg-slate-100' }}">Perpustakaan</a>
    </div>
    @endauth

    <!-- Alerts Container -->
    <main class="flex-1">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-4">
            @if(session('success'))
            <div class="mb-4 p-3.5 rounded-lg bg-emerald-50 border border-emerald-200 text-emerald-900 text-xs flex items-center justify-between">
                <div class="flex items-center space-x-2.5">
                    <i class="fa-solid fa-circle-check text-emerald-600 text-sm"></i>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-emerald-600 hover:text-emerald-900">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            @endif

            @if(session('error'))
            <div class="mb-4 p-3.5 rounded-lg bg-rose-50 border border-rose-200 text-rose-900 text-xs flex items-center justify-between">
                <div class="flex items-center space-x-2.5">
                    <i class="fa-solid fa-triangle-exclamation text-rose-600 text-sm"></i>
                    <span class="font-medium">{{ session('error') }}</span>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-rose-600 hover:text-rose-900">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            @endif

            @if(session('warning'))
            <div class="mb-4 p-3.5 rounded-lg bg-amber-50 border border-amber-200 text-amber-900 text-xs flex items-center justify-between">
                <div class="flex items-center space-x-2.5">
                    <i class="fa-solid fa-circle-info text-amber-600 text-sm"></i>
                    <span class="font-medium">{{ session('warning') }}</span>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-amber-600 hover:text-amber-900">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            @endif

            @if(session('info'))
            <div class="mb-4 p-3.5 rounded-lg bg-slate-100 border border-slate-200 text-slate-900 text-xs flex items-center justify-between">
                <div class="flex items-center space-x-2.5">
                    <i class="fa-solid fa-info text-slate-700 text-sm"></i>
                    <span class="font-medium">{{ session('info') }}</span>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-slate-500 hover:text-slate-900">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            @endif
        </div>

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-slate-200 mt-16 py-6 text-xs text-slate-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-3">
            <div class="flex items-center space-x-2">
                <i class="fa-solid fa-shield-halved text-slate-400"></i>
                <span>Sistem Single Sign-On (SSO) Terpadu &copy; {{ date('Y') }} Politeknik</span>
            </div>
            <div class="font-mono text-[11px] text-slate-400 flex items-center space-x-3">
                <span>OAuth 2.0 / OpenID Connect</span>
                <span>&bull;</span>
                <span>Laravel Socialite IdP</span>
            </div>
        </div>
    </footer>

</body>
</html>
