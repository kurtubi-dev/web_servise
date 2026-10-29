@extends('layouts.app')

@section('title', 'Gerbang Masuk SSO &mdash; Politeknik')

@section('content')
<div class="py-10 sm:py-16">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 rounded-2xl bg-white border border-slate-200/90 shadow-sm overflow-hidden">
            
            <!-- Left Column: Institutional Identity & Context -->
            <div class="lg:col-span-5 bg-[#0f172a] text-slate-200 p-8 sm:p-10 flex flex-col justify-between border-b lg:border-b-0 lg:border-r border-slate-800">
                <div>
                    <!-- Institutional Crest / Seal -->
                    <div class="flex items-center space-x-3 mb-8">
                        <div class="w-11 h-11 rounded-lg bg-white/10 text-white flex items-center justify-center font-bold text-lg border border-white/15">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </div>
                        <div>
                            <div class="font-extrabold text-white text-base tracking-tight uppercase">POLITEKNIK</div>
                            <div class="text-[11px] text-slate-400 font-mono">Gerbang Identitas Terpusat</div>
                        </div>
                    </div>

                    <h2 class="text-xl sm:text-2xl font-bold text-white tracking-tight leading-snug">
                        Satu Akun untuk Seluruh Layanan Kampus.
                    </h2>
                    
                    <p class="mt-4 text-xs text-slate-300 leading-relaxed">
                        Implementasi federasi identitas menggunakan protokol <strong>OAuth 2.0 / OpenID Connect</strong> memungkinkan civitas akademika mengakses <strong>Portal Akademik</strong>, <strong>E-Learning</strong>, dan <strong>Perpustakaan Digital</strong> hanya dengan satu kali login.
                    </p>

                    <!-- Trust / Architecture Specs -->
                    <div class="mt-8 pt-6 border-t border-slate-800 space-y-3">
                        <div class="text-[11px] font-mono text-slate-400 uppercase tracking-wider font-semibold">Spesifikasi Arsitektur SSO</div>
                        <ul class="text-xs space-y-2 text-slate-300">
                            <li class="flex items-center space-x-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                                <span>Identity Provider: <strong>Google Accounts (IdP)</strong></span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span>
                                <span>Service Provider: <strong>Politeknik Gateway (SP)</strong></span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span>
                                <span>Session Scope: <strong>Cross-Module Unified Session</strong></span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="mt-8 pt-4 border-t border-slate-800 text-[11px] text-slate-500 font-mono">
                    Enkripsi Sesi: SHA-256 &bull; TLS 1.3
                </div>
            </div>

            <!-- Right Column: Authentication Form -->
            <div class="lg:col-span-7 p-8 sm:p-10 flex flex-col justify-center bg-white">
                <div class="max-w-md mx-auto w-full space-y-6">
                    
                    <div>
                        <span class="text-[11px] font-mono uppercase font-bold text-slate-500 tracking-wider">Langkah 1 &mdash; Autentikasi Pengguna</span>
                        <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight mt-1">Masuk ke Portal Layanan</h1>
                        <p class="text-xs text-slate-500 mt-1">
                            Gunakan akun Google Workspace kampus Anda untuk memulai sesi SSO.
                        </p>
                    </div>

                    <!-- Official Google SSO Button -->
                    <div>
                        <a href="{{ route('auth.google') }}" 
                           class="w-full flex items-center justify-center space-x-3 px-5 py-3.5 rounded-lg border border-slate-300 hover:border-slate-400 bg-white hover:bg-slate-50 text-slate-700 font-semibold text-xs tracking-wide shadow-xs transition-colors">
                            <svg class="w-4 h-4 flex-shrink-0" viewBox="0 0 24 24">
                                <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/>
                                <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"/>
                            </svg>
                            <span>Lanjutkan dengan Akun Google</span>
                        </a>

                        @if(!$isGoogleConfigured)
                        <p class="mt-2 text-[11px] text-amber-700 bg-amber-50 p-2.5 rounded border border-amber-200">
                            <strong>Catatan:</strong> Kredensial Google belum diisi di .env. Gunakan simulasi di bawah untuk menguji alur.
                        </p>
                        @endif
                    </div>

                    <!-- Subtle Divider -->
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-slate-200"></div>
                        </div>
                        <div class="relative flex justify-center text-[11px] uppercase tracking-wider font-mono">
                            <span class="bg-white px-2 text-slate-400">Atau Uji Coba Simulasi IdP</span>
                        </div>
                    </div>

                    <!-- Mock Simulator Identity Cards -->
                    <div class="space-y-2">
                        <div class="text-[11px] font-medium text-slate-500">Pilih identitas uji simulasi:</div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                            
                            <a href="{{ route('auth.mock', ['account' => 'mahasiswa']) }}" 
                               class="p-3 rounded-lg border border-slate-200 hover:border-slate-400 bg-slate-50/70 hover:bg-white transition-all text-left group">
                                <div class="flex items-center space-x-2.5">
                                    <div class="w-7 h-7 rounded-md bg-slate-200 text-slate-700 flex items-center justify-center text-xs font-bold group-hover:bg-slate-900 group-hover:text-white transition-colors">
                                        M
                                    </div>
                                    <div>
                                        <div class="text-xs font-bold text-slate-800">Dimas Pratama</div>
                                        <div class="text-[10px] text-slate-500 font-mono">Mahasiswa TI</div>
                                    </div>
                                </div>
                            </a>

                            <a href="{{ route('auth.mock', ['account' => 'dosen']) }}" 
                               class="p-3 rounded-lg border border-slate-200 hover:border-slate-400 bg-slate-50/70 hover:bg-white transition-all text-left group">
                                <div class="flex items-center space-x-2.5">
                                    <div class="w-7 h-7 rounded-md bg-slate-200 text-slate-700 flex items-center justify-center text-xs font-bold group-hover:bg-slate-900 group-hover:text-white transition-colors">
                                        D
                                    </div>
                                    <div>
                                        <div class="text-xs font-bold text-slate-800">Dr. Hendra Wijaya</div>
                                        <div class="text-[10px] text-slate-500 font-mono">Dosen Pengampu</div>
                                    </div>
                                </div>
                            </a>

                        </div>
                    </div>

                    <div class="pt-4 border-t border-slate-100 flex items-center justify-between text-[11px] text-slate-400">
                        <span>Pusat Bantuan Akademik</span>
                        <a href="mailto:helpdesk@politeknik.ac.id" class="text-slate-600 hover:underline">helpdesk@politeknik.ac.id</a>
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>
@endsection
