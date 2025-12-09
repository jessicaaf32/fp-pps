<style>
    #btn-teal { background:#008080; color:#fff; }
    #btn-teal:hover { background:#006d6d; color:#fff; }

    #card-style {
        border: none;
        border-radius: 12px;
    }
</style>

@extends('index')
@section('title','Daftar Alamat')
@section('Akun','active')

@section('content')

<div class="container py-5" style="max-width:700px;">

    <div class="section-header">
        <h2>Daftar Alamat</h2>
    </div>

    {{-- Alert sukses --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Card Alamat --}}
    <div class="card shadow-sm card-style mb-4" id="card-style">
        <div class="card-body">

            <h5 class="mb-3 text-center">Alamat Utama</h5>

            <form action="/account/address" method="POST">
                @csrf
    
                <label class="mb-1">Alamat Lengkap</label>
                <textarea name="address" class="form-control" rows="4" required>{{ old('address', $user->address) }}</textarea>

                <button type="submit" class="btn btn-teal mt-3 px-4" id="btn-teal">Simpan Alamat</button>
            </form>

        </div>
    </div>

    {{-- Tombol kembali --}}
    <a href="/account" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Kembali ke Profil
    </a>

</div>

@endsection
