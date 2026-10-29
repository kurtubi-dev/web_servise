@extends('layouts.app')

@section('title', 'Portal Layanan Kampus - SSO Hub')

@section('content')
<div class="py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

        <!-- Welcome Banner with User Profile Info -->
        <div class="bg-gradient-to-r from-blue-700 via-indigo-700 to-indigo-800 rounded-3xl p-6 sm:p-8 text-white shadow-xl shadow-indigo-900/10 relative overflow-hidden">
            <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div class="flex items-center space-x-5">
                    <img src="{{ $user->avatar ?: 'https://ui-avatars.com/api/?name='.urlencode($user->name).'&background=3b82f6&color=fff&size=128' }}" 
                         alt="{{ $user->name }}" 
                         class="w-20 h-20 rounded-2xl ring-4 ring-white/20 object-cover shadow-lg">
                    <div>
                        <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full bg-white/15 backdrop-blur text-blue-100 text-xs font-semibold mb-2 border border-white/20">
                            <i class="fa-solid fa-circle-check text-emerald-400"></i>
                            <span>Terautentikasi SSO via Google Identity Provider</span>
                        </div>
                        <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight">
                            Selamat Datang, {{ $user->name }}!
                        </h1>
                        <p class="text-xs sm:text-sm text-blue-100 mt-1 flex flex-wrap items-center gap-3">
                            <span><i class="fa-regular fa-envelope mr-1"></i> {{ $user->email }}</span>
                            <span>•</span>
                            <span><i class="fa-solid fa-id-badge mr-1"></i> Google ID: <span class="font-mono">{{ substr($user->google_id ?? 'SSO-LOCAL', 0, 18) }}...</span></span>
                        </p>
                    </div>
                </div>

                <!-- Quick Action -->
                <div class="flex md:flex-col items-center md:items-end justify-between gap-2 border-t md:border-t-0 border-white/15 pt-4 md:pt-0">
                    <div class="text-xs text-blue-200">Waktu Sesi SSO:</div>
                    <div class="text-sm font-bold font-mono bg-white/10 px-3 py-1 rounded-lg border border-white/10">
                        {{ now()->format('d M Y - H:i') }} WIB
                    </div>
                </div>
            </div>

            <!-- Background decorative shapes -->
            <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-white/5 rounded-full blur-2xl pointer-events-none"></div>
            <div class="absolute right-40 -top-10 w-48 h-48 bg-indigo-500/20 rounded-full blur-xl pointer-events-none"></div>
        </div>

        <!-- SSO Experiment Banner (Poin 4 Penjelasan Tugas) -->
        <div class="bg-blue-50 border border-blue-200 rounded-2xl p-5 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div class="flex items-start space-x-3.5">
                <div class="w-10 h-10 rounded-xl bg-blue-600 text-white flex items-center justify-center flex-shrink-0 mt-0.5">
                    <i class="fa-solid fa-flask-vial text-lg"></i>
                </div>
                <div>
                    <h3 class="text-sm font-bold text-blue-900">Pengujian Lintas Layanan (SSO Verification):</h3>
                    <p class="text-xs text-blue-800 leading-relaxed mt-0.5">
                        Anda telah berhasil login satu kali di awal. Sekarang silakan klik dan coba keluar-masuk menu <strong>Akademik</strong>, <strong>E-Learning</strong>, atau <strong>Perpustakaan</strong> di bawah ini. Anda dapat berpindah layanan secara bebas <strong>tanpa diminta memasukkan kata sandi lagi</strong>!
                    </p>
                </div>
            </div>
            <span class="inline-flex items-center px-3 py-1.5 rounded-xl bg-emerald-100 text-emerald-800 text-xs font-bold whitespace-nowrap">
                <i class="fa-solid fa-lock-open mr-1.5"></i> Single Sign-On Aktif
            </span>
        </div>

        <!-- 3 Main Campus Services Cards (Sesuai Poin 3) -->
        <div>
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h2 class="text-xl font-bold text-slate-900">Pilihan Layanan Kampus Terpadu</h2>
                    <p class="text-xs text-slate-500">Klik salah satu layanan untuk langsung mengaksesnya secara instan</p>
                </div>
                <span class="text-xs font-semibold text-slate-400">3 Layanan Terhubung</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <!-- 1. Portal Akademik Card -->
                <div class="bg-white rounded-3xl p-6 border border-slate-200 hover:border-indigo-300 hover:shadow-xl hover:shadow-indigo-500/10 transition-all flex flex-col justify-between group">
                    <div>
                        <div class="flex items-center justify-between mb-5">
                            <div class="w-14 h-14 rounded-2xl bg-indigo-50 border border-indigo-200 flex items-center justify-center text-indigo-600 text-2xl group-hover:scale-110 group-hover:bg-indigo-600 group-hover:text-white transition-all shadow-sm">
                                <i class="fa-solid fa-graduation-cap"></i>
                            </div>
                            <span class="px-3 py-1 rounded-full text-[11px] font-bold bg-indigo-50 text-indigo-700 border border-indigo-100">
                                SIAKAD
                            </span>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 group-hover:text-indigo-600 transition-colors">
                            Portal Akademik
                        </h3>
                        <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                            Akses Kartu Rencana Studi (KRS), Kartu Hasil Studi (KHS), Transkrip Nilai, dan Jadwal Perkuliahan semester ini.
                        </p>
                        
                        <div class="mt-4 pt-4 border-t border-slate-100 text-xs text-slate-600 flex items-center justify-between">
                            <span><i class="fa-solid fa-star text-amber-500 mr-1"></i> IPK: 3.85</span>
                            <span class="text-slate-400">18 SKS Aktif</span>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('services.akademik') }}" 
                           class="w-full inline-flex items-center justify-center space-x-2 px-4 py-3 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-xs shadow-md shadow-indigo-500/20 transition-all group-hover:shadow-lg">
                            <span>Buka Portal Akademik</span>
                            <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </div>

                <!-- 2. E-Learning Card -->
                <div class="bg-white rounded-3xl p-6 border border-slate-200 hover:border-emerald-300 hover:shadow-xl hover:shadow-emerald-500/10 transition-all flex flex-col justify-between group">
                    <div>
                        <div class="flex items-center justify-between mb-5">
                            <div class="w-14 h-14 rounded-2xl bg-emerald-50 border border-emerald-200 flex items-center justify-center text-emerald-600 text-2xl group-hover:scale-110 group-hover:bg-emerald-600 group-hover:text-white transition-all shadow-sm">
                                <i class="fa-solid fa-laptop-code"></i>
                            </div>
                            <span class="px-3 py-1 rounded-full text-[11px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-100">
                                LMS Kampus
                            </span>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 group-hover:text-emerald-600 transition-colors">
                            E-Learning (LMS)
                        </h3>
                        <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                            Akses materi kuliah daring, video conference, pengumpulan tugas mingguan, kuis, dan forum diskusi interaktif.
                        </p>

                        <div class="mt-4 pt-4 border-t border-slate-100 text-xs text-slate-600 flex items-center justify-between">
                            <span><i class="fa-solid fa-clock text-emerald-500 mr-1"></i> 3 Tugas Menunggu</span>
                            <span class="text-slate-400">6 Kelas Aktif</span>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('services.elearning') }}" 
                           class="w-full inline-flex items-center justify-center space-x-2 px-4 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs shadow-md shadow-emerald-500/20 transition-all group-hover:shadow-lg">
                            <span>Buka E-Learning</span>
                            <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </div>

                <!-- 3. Perpustakaan Digital Card -->
                <div class="bg-white rounded-3xl p-6 border border-slate-200 hover:border-amber-300 hover:shadow-xl hover:shadow-amber-500/10 transition-all flex flex-col justify-between group">
                    <div>
                        <div class="flex items-center justify-between mb-5">
                            <div class="w-14 h-14 rounded-2xl bg-amber-50 border border-amber-200 flex items-center justify-center text-amber-600 text-2xl group-hover:scale-110 group-hover:bg-amber-600 group-hover:text-white transition-all shadow-sm">
                                <i class="fa-solid fa-book-bookmark"></i>
                            </div>
                            <span class="px-3 py-1 rounded-full text-[11px] font-bold bg-amber-50 text-amber-700 border border-amber-100">
                                DigiLib
                            </span>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 group-hover:text-amber-600 transition-colors">
                            Perpustakaan Digital
                        </h3>
                        <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                            Cari katalog buku cetak, perpanjang masa peminjaman mandiri, download jurnal ilmiah, dan baca koleksi ribuan e-book.
                        </p>

                        <div class="mt-4 pt-4 border-t border-slate-100 text-xs text-slate-600 flex items-center justify-between">
                            <span><i class="fa-solid fa-bookmark text-amber-500 mr-1"></i> 2 Buku Dipinjam</span>
                            <span class="text-emerald-600 font-semibold">Bebas Pustaka</span>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('services.perpustakaan') }}" 
                           class="w-full inline-flex items-center justify-center space-x-2 px-4 py-3 rounded-xl bg-amber-600 hover:bg-amber-700 text-white font-bold text-xs shadow-md shadow-amber-500/20 transition-all group-hover:shadow-lg">
                            <span>Buka Perpustakaan</span>
                            <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>

        <!-- Technical Verification Table -->
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-sm">
            <h3 class="text-base font-bold text-slate-900 mb-1 flex items-center gap-2">
                <i class="fa-solid fa-shield-halved text-blue-600"></i>
                Detail Identitas & Protokol SSO yang Aktif
            </h3>
            <p class="text-xs text-slate-500 mb-4">Data ini didapatkan secara langsung dari Identity Provider saat login</p>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <tbody class="divide-y divide-slate-100">
                        <tr>
                            <td class="py-2.5 font-semibold text-slate-500 w-1/3">Protokol Autentikasi</td>
                            <td class="py-2.5 font-mono text-slate-800">OAuth 2.0 / OpenID Connect (OIDC)</td>
                        </tr>
                        <tr>
                            <td class="py-2.5 font-semibold text-slate-500">Identity Provider (IdP)</td>
                            <td class="py-2.5 font-medium text-slate-800 flex items-center gap-1.5">
                                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                Google Accounts Service (accounts.google.com)
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2.5 font-semibold text-slate-500">Nama Pengguna Terverifikasi</td>
                            <td class="py-2.5 font-bold text-slate-900">{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <td class="py-2.5 font-semibold text-slate-500">Email Akun SSO</td>
                            <td class="py-2.5 font-mono text-slate-800">{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td class="py-2.5 font-semibold text-slate-500">Sub / Unique Google Identifier</td>
                            <td class="py-2.5 font-mono text-slate-800">{{ $user->google_id ?? 'SIMULATION-MODE' }}</td>
                        </tr>
                        <tr>
                            <td class="py-2.5 font-semibold text-slate-500">Cakupan Akses Sesi</td>
                            <td class="py-2.5 text-slate-800">
                                <span class="bg-slate-100 text-slate-700 px-2 py-0.5 rounded font-mono text-[11px] mr-1">Portal Launchpad</span>
                                <span class="bg-indigo-100 text-indigo-700 px-2 py-0.5 rounded font-mono text-[11px] mr-1">SIAKAD</span>
                                <span class="bg-emerald-100 text-emerald-700 px-2 py-0.5 rounded font-mono text-[11px] mr-1">E-Learning</span>
                                <span class="bg-amber-100 text-amber-700 px-2 py-0.5 rounded font-mono text-[11px]">DigiLib</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection

