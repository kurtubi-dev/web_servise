@extends('layouts.app')

@section('title', 'Portal Layanan Terpadu &mdash; Politeknik')

@section('content')
<div class="py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

        <!-- User Identity Header (Institutional Academic Profile) -->
        <div class="bg-white rounded-xl border border-slate-200/90 p-6 shadow-xs flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="flex items-start sm:items-center space-x-4">
                <img src="{{ $user->avatar ?: 'https://ui-avatars.com/api/?name='.urlencode($user->name).'&background=0f172a&color=fff&bold=true' }}" 
                     alt="{{ $user->name }}" 
                     onerror="this.onerror=null; this.src='https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=0f172a&color=fff&bold=true';"
                     class="w-16 h-16 rounded-lg border border-slate-300 object-cover bg-slate-100 flex-shrink-0">
                <div class="space-y-1">
                    <div class="flex flex-wrap items-center gap-2">
                        <h1 class="text-xl sm:text-2xl font-extrabold text-slate-900 tracking-tight">{{ $user->name }}</h1>
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-mono font-semibold bg-emerald-50 text-emerald-800 border border-emerald-200">
                            SSO VERIFIED
                        </span>
                    </div>
                    <p class="text-xs text-slate-500 font-mono">
                        {{ $user->email }} &bull; ID: {{ substr($user->google_id ?? 'SSO-LOCAL', 0, 16) }}...
                    </p>
                    <p class="text-xs text-slate-600">
                        Status: <span class="font-medium text-slate-900">Mahasiswa Aktif</span> &bull; Program Studi Teknik Informatika
                    </p>
                </div>
            </div>

            <!-- Session & Time Metadata -->
            <div class="flex sm:flex-col items-start sm:items-end justify-between border-t sm:border-t-0 pt-4 sm:pt-0 border-slate-100 text-xs">
                <div class="text-[11px] text-slate-400 font-mono">SESI SSO DIAWALI:</div>
                <div class="font-mono font-bold text-slate-800">{{ now()->format('d M Y, H:i') }} WIB</div>
                <div class="text-[11px] text-emerald-700 font-medium mt-1">
                    <i class="fa-solid fa-lock text-[10px] mr-1"></i> Sesi Tersinkronisasi Global
                </div>
            </div>
        </div>

        <!-- Academic Verification Callout (SSO Notice) -->
        <div class="rounded-lg bg-slate-900 text-slate-200 p-4 sm:p-5 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="space-y-1">
                <div class="flex items-center space-x-2 text-xs font-mono font-bold text-emerald-400">
                    <i class="fa-solid fa-circle-check"></i>
                    <span>VERIFIKASI TUGAS: PENGUJIAN LINTAS LAYANAN (SSO PASSPORT)</span>
                </div>
                <p class="text-xs text-slate-300 leading-relaxed max-w-3xl">
                    Anda telah melewati autentikasi tunggal di gerbang masuk. Seluruh menu di bawah dapat Anda buka secara bergantian <strong>tanpa diminta memasukkan kata sandi lagi</strong>.
                </p>
            </div>
            <div class="flex-shrink-0">
                <span class="inline-block text-[11px] font-mono px-3 py-1.5 rounded bg-slate-800 text-slate-300 border border-slate-700">
                    Protokol: OAuth 2.0 / OIDC
                </span>
            </div>
        </div>

        <!-- 3 Primary Campus Services -->
        <div>
            <div class="mb-3 flex items-center justify-between">
                <h2 class="text-xs font-mono font-bold uppercase tracking-wider text-slate-500">Layanan Kampus Terintegrasi (3 Modul)</h2>
                <span class="text-[11px] text-slate-400">Pilih modul untuk masuk instan</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                
                <!-- 1. Akademik (SIAKAD) -->
                <div class="bg-white rounded-xl border border-slate-200/90 p-5 flex flex-col justify-between hover:border-slate-400 transition-colors">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="w-9 h-9 rounded-lg bg-indigo-50 text-indigo-700 flex items-center justify-center text-sm font-bold border border-indigo-100">
                                <i class="fa-solid fa-graduation-cap"></i>
                            </span>
                            <span class="text-[10px] font-mono font-semibold uppercase text-slate-500 bg-slate-100 px-2 py-0.5 rounded">
                                SIAKAD
                            </span>
                        </div>
                        <h3 class="text-base font-bold text-slate-900">Portal Akademik</h3>
                        <p class="text-xs text-slate-600 mt-1.5 leading-relaxed">
                            Pengelolaan Kartu Rencana Studi (KRS), perolehan nilai semester (KHS), transkrip akademik, dan jadwal kuliah.
                        </p>

                        <div class="mt-4 pt-4 border-t border-slate-100 grid grid-cols-2 gap-2 text-xs">
                            <div>
                                <span class="text-[10px] text-slate-400 uppercase font-mono block">IPK Kumulatif</span>
                                <span class="font-bold text-slate-900 font-mono">3.85 / 4.00</span>
                            </div>
                            <div>
                                <span class="text-[10px] text-slate-400 uppercase font-mono block">Beban SKS</span>
                                <span class="font-bold text-slate-900 font-mono">18 SKS</span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('services.akademik') }}" 
                           class="w-full inline-flex items-center justify-center space-x-2 px-4 py-2.5 rounded-lg bg-slate-900 hover:bg-indigo-900 text-white font-semibold text-xs transition-colors">
                            <span>Akses Portal Akademik</span>
                            <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </div>

                <!-- 2. E-Learning (LMS) -->
                <div class="bg-white rounded-xl border border-slate-200/90 p-5 flex flex-col justify-between hover:border-slate-400 transition-colors">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="w-9 h-9 rounded-lg bg-emerald-50 text-emerald-700 flex items-center justify-center text-sm font-bold border border-emerald-100">
                                <i class="fa-solid fa-laptop-code"></i>
                            </span>
                            <span class="text-[10px] font-mono font-semibold uppercase text-slate-500 bg-slate-100 px-2 py-0.5 rounded">
                                LMS
                            </span>
                        </div>
                        <h3 class="text-base font-bold text-slate-900">E-Learning Kampus</h3>
                        <p class="text-xs text-slate-600 mt-1.5 leading-relaxed">
                            Ruang perkuliahan daring, unduh modul materi ajar, pengumpulan tugas praktikum, dan forum diskusi kelas.
                        </p>

                        <div class="mt-4 pt-4 border-t border-slate-100 grid grid-cols-2 gap-2 text-xs">
                            <div>
                                <span class="text-[10px] text-slate-400 uppercase font-mono block">Kelas Aktif</span>
                                <span class="font-bold text-slate-900 font-mono">6 Mata Kuliah</span>
                            </div>
                            <div>
                                <span class="text-[10px] text-slate-400 uppercase font-mono block">Tugas Tertunda</span>
                                <span class="font-bold text-rose-600 font-mono">1 Tugas (Besok)</span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('services.elearning') }}" 
                           class="w-full inline-flex items-center justify-center space-x-2 px-4 py-2.5 rounded-lg bg-slate-900 hover:bg-emerald-900 text-white font-semibold text-xs transition-colors">
                            <span>Akses E-Learning</span>
                            <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </div>

                <!-- 3. Perpustakaan Digital (DigiLib) -->
                <div class="bg-white rounded-xl border border-slate-200/90 p-5 flex flex-col justify-between hover:border-slate-400 transition-colors">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="w-9 h-9 rounded-lg bg-amber-50 text-amber-700 flex items-center justify-center text-sm font-bold border border-amber-100">
                                <i class="fa-solid fa-book-bookmark"></i>
                            </span>
                            <span class="text-[10px] font-mono font-semibold uppercase text-slate-500 bg-slate-100 px-2 py-0.5 rounded">
                                DIGILIB
                            </span>
                        </div>
                        <h3 class="text-base font-bold text-slate-900">Perpustakaan Digital</h3>
                        <p class="text-xs text-slate-600 mt-1.5 leading-relaxed">
                            Penelusuran katalog buku fisik, peminjaman mandiri, akses jurnal internasional terindeks, dan e-book repository.
                        </p>

                        <div class="mt-4 pt-4 border-t border-slate-100 grid grid-cols-2 gap-2 text-xs">
                            <div>
                                <span class="text-[10px] text-slate-400 uppercase font-mono block">Pinjaman Aktif</span>
                                <span class="font-bold text-slate-900 font-mono">2 Judul Buku</span>
                            </div>
                            <div>
                                <span class="text-[10px] text-slate-400 uppercase font-mono block">Bebas Pustaka</span>
                                <span class="font-bold text-emerald-600 font-mono">Terpenuhi</span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('services.perpustakaan') }}" 
                           class="w-full inline-flex items-center justify-center space-x-2 px-4 py-2.5 rounded-lg bg-slate-900 hover:bg-amber-900 text-white font-semibold text-xs transition-colors">
                            <span>Akses Perpustakaan</span>
                            <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection
