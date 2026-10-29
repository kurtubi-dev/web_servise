@extends('layouts.app')

@section('title', 'E-Learning (LMS) - Layanan Kampus')

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
                <span class="font-bold text-emerald-600">E-Learning (LMS Kampus)</span>
            </div>

            <!-- Quick Jump to Other Services (Cross-Service Navigation Test) -->
            <div class="flex items-center space-x-2 text-xs">
                <span class="text-slate-400 font-medium hidden sm:inline">Pindah Layanan (Tanpa Login Lagi):</span>
                <a href="{{ route('services.akademik') }}" class="px-3 py-1.5 rounded-lg bg-indigo-50 text-indigo-700 hover:bg-indigo-100 font-semibold border border-indigo-200 transition-colors flex items-center gap-1.5">
                    <i class="fa-solid fa-graduation-cap"></i> Ke Akademik
                </a>
                <a href="{{ route('services.perpustakaan') }}" class="px-3 py-1.5 rounded-lg bg-amber-50 text-amber-700 hover:bg-amber-100 font-semibold border border-amber-200 transition-colors flex items-center gap-1.5">
                    <i class="fa-solid fa-book-bookmark"></i> Ke Perpustakaan
                </a>
            </div>
        </div>

        <!-- Service Hero Header -->
        <div class="bg-gradient-to-r from-emerald-700 to-teal-900 rounded-3xl p-6 sm:p-8 text-white shadow-xl shadow-teal-950/10 flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="flex items-center space-x-4">
                <div class="w-14 h-14 rounded-2xl bg-white/10 backdrop-blur border border-white/20 flex items-center justify-center text-2xl text-emerald-200">
                    <i class="fa-solid fa-laptop-code"></i>
                </div>
                <div>
                    <div class="inline-flex items-center space-x-1.5 px-2.5 py-0.5 rounded-full bg-emerald-300/20 text-emerald-200 text-[11px] font-bold mb-1.5 border border-emerald-300/30">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-300 animate-ping"></span>
                        <span>Sesi Terverifikasi Otomatis (SSO)</span>
                    </div>
                    <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight">Learning Management System (LMS)</h1>
                    <p class="text-xs sm:text-sm text-emerald-100 mt-1">
                        Siswa terdaftar: <strong>{{ $user->name }}</strong> | Google Auth Token Aktif
                    </p>
                </div>
            </div>

            <div class="flex items-center space-x-3 bg-white/10 p-3 rounded-2xl border border-white/15">
                <div class="text-center px-3 border-r border-white/15">
                    <div class="text-[10px] uppercase tracking-wider text-emerald-200">Kelas Aktif</div>
                    <div class="text-lg font-black">6 Kelas</div>
                </div>
                <div class="text-center px-3">
                    <div class="text-[10px] uppercase tracking-wider text-emerald-200">Avg Progress</div>
                    <div class="text-lg font-black">84%</div>
                </div>
            </div>
        </div>

        <!-- SSO Verification Callout -->
        <div class="p-4 rounded-2xl bg-emerald-50/70 border border-emerald-200/80 text-xs text-emerald-900 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <i class="fa-solid fa-circle-check text-emerald-600 text-base"></i>
                <div>
                    <span class="font-bold">Bukti Pengujian SSO Berhasil:</span>
                    Anda berpindah dari portal utama ke menu E-Learning ini tanpa pernah diminta memasukkan kembali kata sandi!
                </div>
            </div>
            <a href="{{ route('portal') }}" class="font-bold underline text-emerald-700 hover:text-emerald-900 ml-4 whitespace-nowrap">
                Kembali ke Portal
            </a>
        </div>

        <!-- Courses List -->
        <div class="space-y-4">
            <h3 class="text-lg font-bold text-slate-900 flex items-center gap-2">
                <i class="fa-solid fa-layer-group text-emerald-600"></i>
                <span>Daftar Mata Kuliah Online yang Sedang Diikuti</span>
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($courses as $course)
                <div class="bg-white rounded-3xl p-6 border border-slate-200 hover:border-emerald-300 hover:shadow-lg transition-all flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-[10px] font-mono font-bold px-2 py-0.5 rounded bg-emerald-50 text-emerald-700 border border-emerald-200">{{ $course['code'] }}</span>
                            <span class="text-xs font-bold text-slate-700">{{ $course['progress'] }}% Selesai</span>
                        </div>
                        
                        <h4 class="font-bold text-slate-900 text-base leading-snug">{{ $course['title'] }}</h4>
                        <p class="text-xs text-slate-500 mt-1"><i class="fa-regular fa-user mr-1"></i> {{ $course['lecturer'] }}</p>

                        <!-- Progress Bar -->
                        <div class="w-full bg-slate-100 rounded-full h-2 my-4">
                            <div class="bg-emerald-500 h-2 rounded-full" style="width: {{ $course['progress'] }}%"></div>
                        </div>

                        <div class="p-3 rounded-xl bg-slate-50 border border-slate-100 text-xs space-y-1.5">
                            <div class="text-slate-500 text-[11px] font-medium">Topik Terakhir:</div>
                            <div class="font-semibold text-slate-800">{{ $course['current_topic'] }}</div>
                            <div class="pt-2 border-t border-slate-200/60 flex items-center justify-between text-[11px]">
                                <span class="text-rose-600 font-bold"><i class="fa-regular fa-clock mr-1"></i> {{ $course['deadline'] }}</span>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="mt-5 w-full py-2.5 rounded-xl bg-emerald-50 hover:bg-emerald-600 hover:text-white text-emerald-700 font-bold text-xs border border-emerald-200 transition-all">
                        Masuk Ruang Kelas Online
                    </button>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</div>
@endsection

