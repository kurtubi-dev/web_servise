@extends('layouts.app')

@section('title', 'Perpustakaan Digital (DigiLib) - Layanan Kampus')

@section('content')
<div class="py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

        <!-- Breadcrumb & SSO Quick Switcher Bar -->
        <div class="bg-white rounded-2xl p-4 border border-slate-200 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex items-center space-x-2 text-xs text-slate-500">
                <a href="{{ route('portal') }}" class="hover:text-blue-600 flex items-center gap-1">
                    <i class="fa-solid fa-grid-2"></i>
                    <span>Portal Utama</span>
                </a>
                <span>/</span>
                <span class="font-bold text-amber-600">Perpustakaan Digital (DigiLib)</span>
            </div>

            <!-- Quick Jump to Other Services (Cross-Service Navigation Test) -->
            <div class="flex items-center space-x-2 text-xs">
                <span class="text-slate-400 font-medium hidden sm:inline">Pindah Layanan (Tanpa Login Lagi):</span>
                <a href="{{ route('services.akademik') }}" class="px-3 py-1.5 rounded-lg bg-indigo-50 text-indigo-700 hover:bg-indigo-100 font-semibold border border-indigo-200 transition-colors flex items-center gap-1.5">
                    <i class="fa-solid fa-graduation-cap"></i> Ke Akademik
                </a>
                <a href="{{ route('services.elearning') }}" class="px-3 py-1.5 rounded-lg bg-emerald-50 text-emerald-700 hover:bg-emerald-100 font-semibold border border-emerald-200 transition-colors flex items-center gap-1.5">
                    <i class="fa-solid fa-laptop-code"></i> Ke E-Learning
                </a>
            </div>
        </div>

        <!-- Service Hero Header -->
        <div class="bg-gradient-to-r from-amber-600 to-amber-800 rounded-3xl p-6 sm:p-8 text-white shadow-xl shadow-amber-950/10 flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="flex items-center space-x-4">
                <div class="w-14 h-14 rounded-2xl bg-white/10 backdrop-blur border border-white/20 flex items-center justify-center text-2xl text-amber-200">
                    <i class="fa-solid fa-book-bookmark"></i>
                </div>
                <div>
                    <div class="inline-flex items-center space-x-1.5 px-2.5 py-0.5 rounded-full bg-emerald-400/20 text-emerald-200 text-[11px] font-bold mb-1.5 border border-emerald-400/30">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-ping"></span>
                        <span>Sesi Terverifikasi Otomatis (SSO)</span>
                    </div>
                    <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight">Perpustakaan Digital Politeknik</h1>
                    <p class="text-xs sm:text-sm text-amber-100 mt-1">
                        Anggota: <strong>{{ $user->name }}</strong> | Akses Bebas Pustaka Aktif
                    </p>
                </div>
            </div>

            <div class="flex items-center space-x-3 bg-white/10 p-3 rounded-2xl border border-white/15">
                <div class="text-center px-3 border-r border-white/15">
                    <div class="text-[10px] uppercase tracking-wider text-amber-200">Buku Dipinjam</div>
                    <div class="text-lg font-black">2 Buku</div>
                </div>
                <div class="text-center px-3">
                    <div class="text-[10px] uppercase tracking-wider text-amber-200">Denda Berjalan</div>
                    <div class="text-lg font-black">Rp 0</div>
                </div>
            </div>
        </div>

        <!-- SSO Verification Callout -->
        <div class="p-4 rounded-2xl bg-amber-50/70 border border-amber-200/80 text-xs text-amber-900 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <i class="fa-solid fa-circle-check text-amber-600 text-base"></i>
                <div>
                    <span class="font-bold">Bukti Pengujian SSO Berhasil:</span>
                    Layanan Perpustakaan Digital langsung mengenali profil Anda ({{ $user->email }}) tanpa mengharuskan Anda login kembali.
                </div>
            </div>
            <a href="{{ route('portal') }}" class="font-bold underline text-amber-700 hover:text-amber-900 ml-4 whitespace-nowrap">
                Kembali ke Portal
            </a>
        </div>

        <!-- Peminjaman Aktif & Katalog Buku -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
            
            <!-- Buku yang Sedang Dipinjam -->
            <div class="lg:col-span-6 bg-white rounded-3xl p-6 border border-slate-200 shadow-sm">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-bold text-slate-900 flex items-center gap-2">
                        <i class="fa-solid fa-book-open-reader text-amber-600"></i>
                        <span>Buku yang Sedang Dipinjam</span>
                    </h3>
                    <span class="text-xs bg-amber-50 text-amber-700 font-bold px-2.5 py-1 rounded-lg">2 Item</span>
                </div>

                <div class="space-y-3">
                    @foreach($pinjaman as $item)
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <div>
                            <span class="px-2 py-0.5 rounded bg-emerald-100 text-emerald-800 text-[10px] font-bold">{{ $item['status'] }}</span>
                            <h4 class="font-bold text-slate-900 text-sm mt-1">{{ $item['judul'] }}</h4>
                            <p class="text-xs text-slate-500"><i class="fa-solid fa-pen-nib mr-1 text-[10px]"></i> {{ $item['penulis'] }}</p>
                            <div class="text-[11px] text-slate-400 mt-2">
                                Pinjam: <span class="text-slate-600">{{ $item['tgl_pinjam'] }}</span> &bull; 
                                Jatuh Tempo: <span class="font-semibold text-rose-600">{{ $item['tgl_kembali'] }}</span>
                            </div>
                        </div>
                        <div>
                            <span class="inline-block px-3 py-1.5 rounded-xl bg-amber-100 text-amber-800 text-xs font-bold whitespace-nowrap">
                                <i class="fa-regular fa-clock mr-1"></i> {{ $item['sisa_hari'] }}
                            </span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Katalog Rekomendasi Buku -->
            <div class="lg:col-span-6 bg-white rounded-3xl p-6 border border-slate-200 shadow-sm">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-bold text-slate-900 flex items-center gap-2">
                        <i class="fa-solid fa-magnifying-glass text-blue-600"></i>
                        <span>Koleksi Buku Terpopuler</span>
                    </h3>
                    <span class="text-xs text-slate-400">Pustaka Digital</span>
                </div>

                <div class="space-y-3">
                    @foreach($katalogBuku as $buku)
                    <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-100 hover:border-amber-200 hover:bg-amber-50/20 transition-all flex items-center justify-between">
                        <div class="space-y-0.5">
                            <span class="text-[10px] font-bold text-indigo-600 uppercase tracking-wider">{{ $buku['kategori'] }}</span>
                            <h4 class="font-bold text-slate-900 text-xs">{{ $buku['judul'] }}</h4>
                            <div class="text-[11px] text-slate-500">{{ $buku['penulis'] }} &bull; <span class="text-slate-400">{{ $buku['penerbit'] }}</span></div>
                        </div>
                        <div class="text-right">
                            <span class="text-[11px] font-bold text-emerald-700 bg-emerald-50 px-2 py-1 rounded-lg border border-emerald-200">
                                {{ $buku['tersedia'] }} Eks.
                            </span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>

    </div>
</div>
@endsection

