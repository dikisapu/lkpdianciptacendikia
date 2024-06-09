@extends('layouts.front')
@section('content')
<div class="card bg-base-100 shadow-xl">
    <div class="hero rounded-box"
         style="min-height: 70vh; background-image: url('{{ asset('gedung.jpg') }}');">
        <div class="hero-overlay bg-opacity-50 rounded-box"></div>
        <div class="hero-content flex min-h-max text-center text-neutral-conten mt-30" style="height: 100%">
            <div class="max-w-md">
                <h1 class="mb-5 text-xl font-bold text-base-100">Selamat Datang</h1>
                <p class="mb-5 text-base-100">LPK Dian Cipta Cendikia Kalianda Juga Merupakan Tempat Magang Siswa-Siswi
                    SMK Yang Ada Di Lampung Selatan. LPK Dian Cipta Cendikia Sudah Terkreditasi Oleh LA.LPK Th 2017 Dan
                    Terkareditasi B Oleh BAN PNFI. Th 2015. Serta Berkinerja B Sejak Tahun 2010.</p>
                <a href="{{ route('daftar-paket') }}" class="btn btn-primary">Get Started</a>
            </div>
        </div>
    </div>
    </div>
@endsection
