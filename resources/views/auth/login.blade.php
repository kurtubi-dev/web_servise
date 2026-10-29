@extends('layouts.app')

@section('title', 'Gerbang Login SSO (Single Sign-On) - Politeknik')

@section('content')
<div class="py-12 sm:py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header Section -->
        <div class="text-center mb-10">
            <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full bg-blue-100 text-blue-800 text-xs font-bold uppercase tracking-wider mb-4 border border-blue-200">
                <i class="fa-solid fa-key"></i>
                <span>Gerbang Utama SSO (SSO Gateway)</span>
            </div>
            <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                Single Sign-On Layanan Terpadu Politeknik
            </h1>
            <p class="mt-3 text-base text-slate-600 max-w-2xl mx-auto">
                Cukup satu kali login untuk mengakses seluruh ekosistem layanan kampus: <strong>Portal Akademik</strong>, <strong>E-Learning</strong>, dan <strong>Perpustakaan Digital</strong> tanpa perlu memasukkan password berulang kali.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- Left Card: Login Gateway -->
            <div class="lg:col-span-7 bg-white rounded-3xl p-8 sm:p-10 shadow-xl shadow-slate-200/50 border border-slate-200/80">
                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-12 h-12 rounded-2xl bg-blue-50 border border-blue-200 flex items-center justify-center text-blue-600">
                        <i class="fa-solid fa-shield-cat text-xl"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-slate-900">Autentikasi Terpusat</h2>
                        <p class="text-xs text-slate-500">Identity Provider (IdP): Google Workspace</p>
                    </div>
                </div>

                <!-- Google SSO Button (Production / Real OAuth) -->
                <div class="space-y-4">
                    <a href="{{ route('auth.google') }}" 
                       class="w-full flex items-center justify-center space-x-3 px-6 py-4 rounded-2xl bg-white hover:bg-slate-50 text-slate-700 font-bold border-2 border-slate-200 hover:border-blue-400 hover:shadow-lg hover:shadow-blue-500/10 transition-all text-base group">
                        <!-- Google SVG Icon -->
                        <svg class="w-6 h-6 flex-shrink-0" viewBox="0 0 24 24">
                            <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                            <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                            <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/>
                            <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"/>
                        </svg>
                        <span>Masuk dengan SSO Google</span>
                        <i class="fa-solid fa-arrow-right text-xs text-slate-400 group-hover:translate-x-1 transition-transform"></i>
                    </a>

                    @if(!$isGoogleConfigured)
                    <div class="p-3.5 rounded-xl bg-amber-50 border border-amber-200 text-amber-800 text-xs">
                        <div class="flex items-start space-x-2">
                            <i class="fa-solid fa-triangle-exclamation text-amber-600 mt-0.5"></i>
                            <div>
                                <span class="font-bold">Info Konfigurasi:</span> Kredensial Google OAuth belum diisi pada file <code class="bg-amber-100 px-1 py-0.5 rounded font-mono">.env</code>.
                                Anda dapat menggunakan <strong>Simulasi SSO</strong> di bawah untuk langsung mencoba demo lengkap.
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Divider -->
                <div class="relative my-8">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-slate-200"></div>
                    </div>
                    <div class="relative flex justify-center text-xs uppercase">
                        <span class="bg-white px-3 text-slate-500 font-semibold">Atau Simulasi IdP Instan (Demo Mode)</span>
                    </div>
                </div>

                <!-- Instant Mock SSO for testing & demo -->
                <div class="space-y-3">
                    <p class="text-xs text-slate-600 mb-2">
                        Pilih peran simulasi identitas dari Identity Provider (IdP):
                    </p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <a href="{{ route('auth.mock', ['account' => 'mahasiswa']) }}" 
                           class="flex items-center space-x-3 p-3.5 rounded-xl bg-slate-50 hover:bg-blue-50 border border-slate-200 hover:border-blue-300 transition-all group">
                            <div class="w-9 h-9 rounded-lg bg-blue-100 text-blue-700 flex items-center justify-center font-bold">
                                <i class="fa-solid fa-user-graduate"></i>
                            </div>
                            <div class="text-left">
                                <div class="text-xs font-bold text-slate-800 group-hover:text-blue-700">Dimas Pratama</div>
                                <div class="text-[11px] text-slate-500">Mahasiswa TI</div>
                            </div>
                        </a>

                        <a href="{{ route('auth.mock', ['account' => 'dosen']) }}" 
                           class="flex items-center space-x-3 p-3.5 rounded-xl bg-slate-50 hover:bg-indigo-50 border border-slate-200 hover:border-indigo-300 transition-all group">
                            <div class="w-9 h-9 rounded-lg bg-indigo-100 text-indigo-700 flex items-center justify-center font-bold">
                                <i class="fa-solid fa-chalkboard-user"></i>
                            </div>
                            <div class="text-left">
                                <div class="text-xs font-bold text-slate-800 group-hover:text-indigo-700">Dr. Hendra Wijaya</div>
                                <div class="text-[11px] text-slate-500">Dosen Pengampu</div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-slate-100 text-center">
                    <p class="text-xs text-slate-400">
                        Protokol Keamanan: OpenID Connect & OAuth 2.0 didukung oleh Laravel Socialite.
                    </p>
                </div>
            </div>

            <!-- Right Card: Study Case Info & Architecture Explanation -->
            <div class="lg:col-span-5 space-y-6">
                
                <!-- Studi Kasus Card -->
                <div class="bg-gradient-to-br from-slate-900 to-indigo-950 text-white rounded-3xl p-7 shadow-xl">
                    <div class="flex items-center space-x-2 text-indigo-300 text-xs font-bold uppercase tracking-wider mb-2">
                        <i class="fa-solid fa-graduation-cap"></i>
                        <span>Studi Kasus Praktikum</span>
                    </div>
                    <h3 class="text-lg font-bold mb-3 text-white">SSO di Sistem Kampus</h3>
                    <p class="text-xs text-indigo-100 leading-relaxed bg-white/10 p-3.5 rounded-xl border border-white/10 mb-4">
                        "Politeknik dapat mengimplementasikan SSO agar mahasiswa hanya perlu login satu kali untuk mengakses <strong>e-learning</strong>, <strong>portal akademik</strong>, dan <strong>perpustakaan digital</strong>."
                    </p>

                    <h4 class="text-xs font-bold uppercase tracking-wider text-indigo-300 mb-2">Fitur yang Disediakan:</h4>
                    <ul class="text-xs space-y-2 text-indigo-100">
                        <li class="flex items-center space-x-2">
                            <i class="fa-solid fa-check-circle text-emerald-400"></i>
                            <span>1. Identity Provider (IdP) via Google Socialite</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <i class="fa-solid fa-check-circle text-emerald-400"></i>
                            <span>2. Gerbang Login Tunggal (SSO Gateway)</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <i class="fa-solid fa-check-circle text-emerald-400"></i>
                            <span>3. Portal Utama Launchpad Layanan</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <i class="fa-solid fa-check-circle text-emerald-400"></i>
                            <span>4. Pengujian Bebas Keluar-Masuk Lintas Layanan</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <i class="fa-solid fa-check-circle text-emerald-400"></i>
                            <span>5. Single Sign-Out (Logout Serentak)</span>
                        </li>
                    </ul>
                </div>

                <!-- How It Works Card -->
                <div class="bg-white rounded-2xl p-6 border border-slate-200 text-xs space-y-3">
                    <h4 class="font-bold text-slate-800 flex items-center space-x-2">
                        <i class="fa-solid fa-network-wired text-blue-600"></i>
                        <span>Cara Kerja Alur SSO</span>
                    </h4>
                    <p class="text-slate-600 leading-relaxed">
                        Saat tombol SSO ditekan, aplikasi mengarahkan browser ke Identity Provider (Google). Setelah identitas divalidasi, sesi login berlaku global ke seluruh modul internal tanpa perlu meminta kata sandi lagi.
                    </p>
                </div>

            </div>

        </div>

    </div>
</div>
@endsection

