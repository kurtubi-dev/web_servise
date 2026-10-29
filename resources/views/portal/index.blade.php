@extends('layouts.app')

@section('title', 'Portal Layanan Terpadu &mdash; Politeknik')

@section('content')
<div class="py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

        <!-- Student Identity Header (Authoritative Institutional Strip) -->
        <div class="bg-white rounded-xl border border-slate-200/90 p-6 shadow-xs flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="flex items-start sm:items-center space-x-4">
                <img src="{{ $user->avatar ?: 'https://ui-avatars.com/api/?name='.urlencode($user->name).'&background=0f172a&color=fff&bold=true' }}" 
                     alt="{{ $user->name }}" 
                     onerror="this.onerror=null; this.src='https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=0f172a&color=fff&bold=true';"
                     class="w-16 h-16 rounded-md border border-slate-300 object-cover bg-slate-100 flex-shrink-0">
                <div class="space-y-1">
                    <div class="flex flex-wrap items-center gap-2">
                        <h1 class="text-xl sm:text-2xl font-extrabold text-slate-900 tracking-tight">{{ $user->name }}</h1>
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-mono font-semibold bg-emerald-50 text-emerald-800 border border-emerald-200">
                            SSO TERVERIFIKASI
                        </span>
                    </div>
                    <div class="text-xs text-slate-500 font-mono">
                        {{ $user->email }} &bull; Provider ID: {{ substr($user->google_id ?? 'SSO-LOCAL', 0, 18) }}...
                    </div>
                    <div class="text-xs text-slate-600">
                        Program Studi: <strong class="text-slate-800">Teknik Informatika</strong> &bull; Semester Ganjil 2026/2027
                    </div>
                </div>
            </div>

            <!-- Time & Session Metadata -->
            <div class="flex sm:flex-col items-start sm:items-end justify-between border-t sm:border-t-0 pt-4 sm:pt-0 border-slate-100 text-xs">
                <div class="text-[11px] text-slate-400 font-mono">SESI DIAUTENTIKASI:</div>
                <div class="font-mono font-bold text-slate-800">{{ now()->format('d M Y, H:i') }} WIB</div>
                <div class="text-[11px] text-emerald-700 font-medium mt-1">
                    <i class="fa-solid fa-circle-check text-[10px] mr-1"></i> Akses Lintas Layanan Terbuka
                </div>
            </div>
        </div>

        <!-- Academic SSO Verification Banner (Poin 4 Penjelasan Tugas) -->
        <div class="rounded-lg bg-[#0f172a] text-slate-200 p-4 sm:p-5 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="space-y-1">
                <div class="flex items-center space-x-2 text-xs font-mono font-bold text-emerald-400">
                    <i class="fa-solid fa-lock-open"></i>
                    <span>VERIFIKASI SINGLE SIGN-ON (SSO) AKTIF</span>
                </div>
                <p class="text-xs text-slate-300 leading-relaxed max-w-3xl">
                    Anda telah melewati autentikasi satu pintu di awal via Google Identity Provider. Sekarang Anda dapat mengakses menu <strong>Portal Akademik</strong>, <strong>E-Learning</strong>, maupun <strong>Perpustakaan Digital</strong> secara bebas <strong>tanpa diminta memasukkan kata sandi lagi</strong>.
                </p>
            </div>
            <div class="flex-shrink-0">
                <span class="inline-block text-[11px] font-mono px-3 py-1.5 rounded bg-slate-800 text-slate-300 border border-slate-700">
                    Sesi Global: Aktif
                </span>
            </div>
        </div>

        <!-- 3 Primary Campus Services (Asymmetric High-Craft Grid) -->
        <div>
            <div class="mb-3 flex items-center justify-between">
                <h2 class="text-xs font-mono font-bold uppercase tracking-wider text-slate-500">Layanan Kampus Terpadu (3 Modul)</h2>
                <span class="text-[11px] text-slate-400">Navigasi langsung tanpa login ulang</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                
                <!-- 1. Portal Akademik (SIAKAD) -->
                <div class="bg-white rounded-xl border border-slate-200/90 p-5 flex flex-col justify-between hover:border-indigo-400 transition-colors shadow-2xs group">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="w-9 h-9 rounded-md bg-indigo-50 text-indigo-800 flex items-center justify-center text-sm font-bold border border-indigo-100">
                                <i class="fa-solid fa-graduation-cap"></i>
                            </span>
                            <span class="text-[10px] font-mono font-semibold uppercase text-slate-500 bg-slate-100 px-2 py-0.5 rounded">
                                SIAKAD
                            </span>
                        </div>
                        <h3 class="text-base font-bold text-slate-900 group-hover:text-indigo-900 transition-colors">Portal Akademik</h3>
                        <p class="text-xs text-slate-600 mt-1.5 leading-relaxed">
                            Kartu Rencana Studi (KRS), perolehan nilai hasil studi (KHS), transkrip nilai terverifikasi, dan jadwal kuliah tatap muka.
                        </p>

                        <div class="mt-4 pt-4 border-t border-slate-100 grid grid-cols-2 gap-2 text-xs font-mono">
                            <div>
                                <span class="text-[10px] text-slate-400 uppercase block">IPK Kumulatif</span>
                                <span class="font-bold text-slate-900">3.85 / 4.00</span>
                            </div>
                            <div>
                                <span class="text-[10px] text-slate-400 uppercase block">Beban SKS</span>
                                <span class="font-bold text-slate-900">18 SKS Aktif</span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('services.akademik') }}" 
                           class="w-full inline-flex items-center justify-center space-x-2 px-4 py-2.5 rounded-md bg-[#0f172a] hover:bg-indigo-900 text-white font-semibold text-xs transition-colors">
                            <span>Buka Portal Akademik</span>
                            <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </div>

                <!-- 2. E-Learning (LMS) -->
                <div class="bg-white rounded-xl border border-slate-200/90 p-5 flex flex-col justify-between hover:border-emerald-400 transition-colors shadow-2xs group">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="w-9 h-9 rounded-md bg-emerald-50 text-emerald-800 flex items-center justify-center text-sm font-bold border border-emerald-100">
                                <i class="fa-solid fa-laptop-code"></i>
                            </span>
                            <span class="text-[10px] font-mono font-semibold uppercase text-slate-500 bg-slate-100 px-2 py-0.5 rounded">
                                LMS KAMPUS
                            </span>
                        </div>
                        <h3 class="text-base font-bold text-slate-900 group-hover:text-emerald-900 transition-colors">E-Learning</h3>
                        <p class="text-xs text-slate-600 mt-1.5 leading-relaxed">
                            Ruang perkuliahan daring, materi kuliah digital, tugas praktikum mingguan, dan forum diskusi interaktif dosen-mahasiswa.
                        </p>

                        <div class="mt-4 pt-4 border-t border-slate-100 grid grid-cols-2 gap-2 text-xs font-mono">
                            <div>
                                <span class="text-[10px] text-slate-400 uppercase block">Kelas Terdaftar</span>
                                <span class="font-bold text-slate-900">6 Kelas Aktif</span>
                            </div>
                            <div>
                                <span class="text-[10px] text-slate-400 uppercase block">Tugas Tertunda</span>
                                <span class="font-bold text-rose-600">1 Tugas (Besok)</span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('services.elearning') }}" 
                           class="w-full inline-flex items-center justify-center space-x-2 px-4 py-2.5 rounded-md bg-[#0f172a] hover:bg-emerald-900 text-white font-semibold text-xs transition-colors">
                            <span>Buka E-Learning</span>
                            <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </div>

                <!-- 3. Perpustakaan Digital (DigiLib) -->
                <div class="bg-white rounded-xl border border-slate-200/90 p-5 flex flex-col justify-between hover:border-amber-400 transition-colors shadow-2xs group">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="w-9 h-9 rounded-md bg-amber-50 text-amber-800 flex items-center justify-center text-sm font-bold border border-amber-100">
                                <i class="fa-solid fa-book-bookmark"></i>
                            </span>
                            <span class="text-[10px] font-mono font-semibold uppercase text-slate-500 bg-slate-100 px-2 py-0.5 rounded">
                                DIGILIB
                            </span>
                        </div>
                        <h3 class="text-base font-bold text-slate-900 group-hover:text-amber-900 transition-colors">Perpustakaan Digital</h3>
                        <p class="text-xs text-slate-600 mt-1.5 leading-relaxed">
                            Pencarian katalog pustaka fisik, perpanjangan masa pinjam mandiri, akses koleksi jurnal bereputasi, dan e-book repository.
                        </p>

                        <div class="mt-4 pt-4 border-t border-slate-100 grid grid-cols-2 gap-2 text-xs font-mono">
                            <div>
                                <span class="text-[10px] text-slate-400 uppercase block">Pinjaman Aktif</span>
                                <span class="font-bold text-slate-900">2 Buku</span>
                            </div>
                            <div>
                                <span class="text-[10px] text-slate-400 uppercase block">Bebas Pustaka</span>
                                <span class="font-bold text-emerald-700">Terpenuhi</span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('services.perpustakaan') }}" 
                           class="w-full inline-flex items-center justify-center space-x-2 px-4 py-2.5 rounded-md bg-[#0f172a] hover:bg-amber-900 text-white font-semibold text-xs transition-colors">
                            <span>Buka Perpustakaan Digital</span>
                            <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>

        <!-- Technical SSO Audit Verification Table -->
        <div class="bg-white rounded-xl border border-slate-200/90 p-5 shadow-xs space-y-3">
            <div class="flex items-center justify-between pb-2 border-b border-slate-100">
                <h3 class="text-xs font-mono font-bold uppercase text-slate-800 flex items-center gap-2">
                    <i class="fa-solid fa-shield-halved text-slate-500"></i>
                    Detail Sesi Keamanan SSO (Audit Ledger)
                </h3>
                <span class="text-[10px] font-mono text-slate-400">OAuth 2.0 / OpenID Connect Protocol</span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs font-mono">
                    <tbody class="divide-y divide-slate-100">
                        <tr>
                            <td class="py-2 text-slate-500 w-1/3">Identity Provider (IdP)</td>
                            <td class="py-2 text-slate-900 font-semibold">Google Identity Services (accounts.google.com)</td>
                        </tr>
                        <tr>
                            <td class="py-2 text-slate-500">Subject Token ID</td>
                            <td class="py-2 text-slate-700">{{ $user->google_id ?? 'SSO-LOCAL-MOCK' }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 text-slate-500">Akun Kampus Terautentikasi</td>
                            <td class="py-2 text-slate-900 font-semibold">{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 text-slate-500">Izin Akses Lintas Layanan</td>
                            <td class="py-2 text-slate-700">
                                <span class="px-1.5 py-0.5 rounded bg-slate-100 text-slate-800 text-[10px]">akademik.read</span>
                                <span class="px-1.5 py-0.5 rounded bg-slate-100 text-slate-800 text-[10px]">elearning.read_write</span>
                                <span class="px-1.5 py-0.5 rounded bg-slate-100 text-slate-800 text-[10px]">perpustakaan.borrow</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection
