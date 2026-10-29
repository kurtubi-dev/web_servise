@extends('layouts.app')

@section('title', 'Portal Akademik (SIAKAD) - Layanan Kampus')

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
                <span class="font-bold text-indigo-600">Portal Akademik (SIAKAD)</span>
            </div>

            <!-- Quick Jump to Other Services (Cross-Service Navigation Test) -->
            <div class="flex items-center space-x-2 text-xs">
                <span class="text-slate-400 font-medium hidden sm:inline">Pindah Layanan (Tanpa Login Lagi):</span>
                <a href="{{ route('services.elearning') }}" class="px-3 py-1.5 rounded-lg bg-emerald-50 text-emerald-700 hover:bg-emerald-100 font-semibold border border-emerald-200 transition-colors flex items-center gap-1.5">
                    <i class="fa-solid fa-laptop-code"></i> Ke E-Learning
                </a>
                <a href="{{ route('services.perpustakaan') }}" class="px-3 py-1.5 rounded-lg bg-amber-50 text-amber-700 hover:bg-amber-100 font-semibold border border-amber-200 transition-colors flex items-center gap-1.5">
                    <i class="fa-solid fa-book-bookmark"></i> Ke Perpustakaan
                </a>
            </div>
        </div>

        <!-- Service Hero Header -->
        <div class="bg-gradient-to-r from-indigo-700 to-indigo-900 rounded-3xl p-6 sm:p-8 text-white shadow-xl shadow-indigo-950/10 flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="flex items-center space-x-4">
                <div class="w-14 h-14 rounded-2xl bg-white/10 backdrop-blur border border-white/20 flex items-center justify-center text-2xl text-indigo-200">
                    <i class="fa-solid fa-graduation-cap"></i>
                </div>
                <div>
                    <div class="inline-flex items-center space-x-1.5 px-2.5 py-0.5 rounded-full bg-emerald-400/20 text-emerald-300 text-[11px] font-bold mb-1.5 border border-emerald-400/30">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-ping"></span>
                        <span>Sesi Terverifikasi Otomatis (SSO)</span>
                    </div>
                    <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight">Sistem Informasi Akademik (SIAKAD)</h1>
                    <p class="text-xs sm:text-sm text-indigo-100 mt-1">
                        Login sebagai <strong>{{ $user->name }}</strong> ({{ $user->email }})
                    </p>
                </div>
            </div>

            <div class="flex items-center space-x-3 bg-white/10 p-3 rounded-2xl border border-white/15">
                <div class="text-center px-3 border-r border-white/15">
                    <div class="text-[10px] uppercase tracking-wider text-indigo-200">IPK Kumulatif</div>
                    <div class="text-lg font-black">3.85</div>
                </div>
                <div class="text-center px-3">
                    <div class="text-[10px] uppercase tracking-wider text-indigo-200">Total SKS</div>
                    <div class="text-lg font-black">18 SKS</div>
                </div>
            </div>
        </div>

        <!-- SSO Verification Callout -->
        <div class="p-4 rounded-2xl bg-indigo-50/70 border border-indigo-200/80 text-xs text-indigo-900 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <i class="fa-solid fa-circle-check text-indigo-600 text-base"></i>
                <div>
                    <span class="font-bold">Bukti Pengujian SSO Berhasil:</span>
                    Halaman Akademik ini terbuka langsung tanpa meminta input username atau password, karena identitas Anda telah diverifikasi oleh Google IdP.
                </div>
            </div>
            <a href="{{ route('portal') }}" class="font-bold underline text-indigo-700 hover:text-indigo-900 ml-4 whitespace-nowrap">
                Kembali ke Portal
            </a>
        </div>

        <!-- Jadwal Kuliah & KHS Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
            
            <!-- Jadwal Kuliah -->
            <div class="lg:col-span-7 bg-white rounded-3xl p-6 border border-slate-200 shadow-sm">
                <div class="flex items-center justify-between mb-5">
                    <h3 class="font-bold text-slate-900 flex items-center gap-2">
                        <i class="fa-solid fa-calendar-days text-indigo-600"></i>
                        <span>Jadwal Perkuliahan Semester Ini</span>
                    </h3>
                    <span class="text-xs bg-slate-100 text-slate-600 px-2.5 py-1 rounded-lg font-semibold">Semester Ganjil</span>
                </div>

                <div class="space-y-3">
                    @foreach($jadwalKuliah as $jadwal)
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100 hover:border-indigo-200 hover:bg-indigo-50/30 transition-all flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <div class="space-y-1">
                            <div class="flex items-center gap-2">
                                <span class="px-2 py-0.5 rounded bg-indigo-100 text-indigo-800 text-[10px] font-bold">{{ $jadwal['hari'] }}</span>
                                <span class="text-xs font-semibold text-slate-500">{{ $jadwal['jam'] }}</span>
                                <span class="text-xs text-slate-400">• {{ $jadwal['sks'] }} SKS</span>
                            </div>
                            <div class="text-sm font-bold text-slate-900">{{ $jadwal['matkul'] }}</div>
                            <div class="text-xs text-slate-500"><i class="fa-regular fa-user mr-1"></i> {{ $jadwal['dosen'] }}</div>
                        </div>
                        <div class="sm:text-right">
                            <span class="inline-block px-3 py-1 rounded-xl bg-white text-indigo-700 text-xs font-bold border border-slate-200">
                                <i class="fa-solid fa-location-dot mr-1 text-indigo-500"></i> {{ $jadwal['ruangan'] }}
                            </span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Kartu Hasil Studi (KHS) -->
            <div class="lg:col-span-5 bg-white rounded-3xl p-6 border border-slate-200 shadow-sm">
                <div class="flex items-center justify-between mb-5">
                    <h3 class="font-bold text-slate-900 flex items-center gap-2">
                        <i class="fa-solid fa-award text-amber-500"></i>
                        <span>Kartu Hasil Studi (KHS)</span>
                    </h3>
                    <span class="text-xs text-emerald-600 font-bold bg-emerald-50 px-2.5 py-1 rounded-lg">Status: Lulus</span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-xs text-left">
                        <thead>
                            <tr class="text-slate-400 uppercase text-[10px] border-b border-slate-100 pb-2">
                                <th class="pb-2">Mata Kuliah</th>
                                <th class="pb-2 text-center">SKS</th>
                                <th class="pb-2 text-center">Nilai</th>
                                <th class="pb-2 text-right">Bobot</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @foreach($khs as $item)
                            <tr>
                                <td class="py-3">
                                    <div class="font-bold text-slate-800">{{ $item['matkul'] }}</div>
                                    <div class="text-[10px] text-slate-400 font-mono">{{ $item['kode'] }}</div>
                                </td>
                                <td class="py-3 text-center text-slate-600">{{ $item['sks'] }}</td>
                                <td class="py-3 text-center">
                                    <span class="px-2 py-0.5 rounded font-extrabold text-[11px] {{ in_array($item['nilai'], ['A', 'A-']) ? 'bg-emerald-100 text-emerald-800' : 'bg-blue-100 text-blue-800' }}">
                                        {{ $item['nilai'] }}
                                    </span>
                                </td>
                                <td class="py-3 text-right font-mono font-bold text-slate-700">{{ number_format($item['bobot'], 1) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-4 pt-4 border-t border-slate-100 flex items-center justify-between text-xs">
                    <span class="font-bold text-slate-700">Indeks Prestasi Semester:</span>
                    <span class="text-sm font-black text-indigo-600">3.85 / 4.00</span>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection

