<style>
    .card-style {
        border-radius: 12px;
        border: none;
    }
    .icon-box {
        font-size: 30px;
        color: #008080;
    }
</style>

@extends('index')
@section('title','Keamanan Akun')
@section('Akun','active')

@section('content')

<div class="container py-5" style="max-width: 700px;">

    <div class="section-header">
        <h2>Keamanan Akun</h2>
    </div>

    {{-- Informasi Akun --}}
    <div class="card shadow-sm card-style mb-3">
        <div class="card-body d-flex align-items-center">
            <i class="bi bi-shield-lock icon-box me-3"></i>
            <div>
                <h5 class="mb-1">Kata Sandi</h5>
                <p class="text-muted mb-0">
                    Pastikan kata sandi kamu kuat dan tidak digunakan di layanan lain.
                </p>
            </div>
        </div>
    </div>

    {{-- Email --}}
    <div class="card shadow-sm card-style mb-3">
        <div class="card-body d-flex align-items-center">
            <i class="bi bi-envelope-check icon-box me-3"></i>
            <div>
                <h5 class="mb-1">Email Terverifikasi</h5>
                <p class="text-muted mb-0">
                    Email digunakan untuk pemulihan akun dan notifikasi penting.
                </p>
            </div>
        </div>
    </div>

    {{-- Aktivitas Masuk --}}
    <div class="card shadow-sm card-style mb-3">
        <div class="card-body d-flex align-items-center">
            <i class="bi bi-phone icon-box me-3"></i>
            <div>
                <h5 class="mb-1">Perangkat Terhubung</h5>
                <p class="text-muted mb-0">
                    Untuk menjaga keamanan, pastikan hanya perangkat kamu yang dapat mengakses akun ini.
                </p>
            </div>
        </div>
    </div>

    {{-- Tips Keamanan --}}
    <div class="card shadow-sm card-style">
        <div class="card-body">
            <h5 class="mb-3"><i class="bi bi-lightbulb me-2"></i>Tips Keamanan</h5>

            <ul class="text-muted" style="line-height: 1.8;">
                <li>Gunakan kata sandi minimal 8 karakter dengan kombinasi angka dan huruf.</li>
                <li>Jangan bagikan kata sandi kepada siapapun.</li>
                <li>Logout setelah selesai menggunakan perangkat umum.</li>
                <li>Perbarui kata sandi secara berkala untuk keamanan tambahan.</li>
            </ul>
        </div>
    </div>

    {{-- Tombol kembali --}}
    <a href="/account" class="btn btn-outline-secondary mt-4">
        <i class="bi bi-arrow-left"></i> Kembali ke Profil
    </a>
</div>

@endsection
