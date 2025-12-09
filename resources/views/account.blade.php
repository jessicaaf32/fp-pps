<style>
    .btn-teal {
        background: #008080;
    }
    .btn-teal:hover {
        background: #006d6d;
    }
</style>



@extends('index')
@section('title','Akun Saya')
@section('Akun','active')

@section('content')

<div class="container py-5" style="max-width:700px;">

    {{-- Card Profil --}}
    <div class="card shadow-sm mb-4 border-0">
        <div class="card-body text-center">
            <div class="rounded-circle bg-light mx-auto mb-3 d-flex justify-content-center align-items-center"
                 style="width:90px;height:90px;font-size:35px;overflow:hidden;">
                @if($user->ava)
                    <img src="{{ asset('img/team/'.$user->ava) }}" class="img-fluid h-100 w-100" style="object-fit:cover;">
                @else
                    <i class="bi bi-person text-secondary"></i>
                @endif
            </div>

            <h5 class="mb-1">{{ $user->username }}</h5>
            <p class="text-muted mb-3">{{ $user->email }}</p>

            <a href="/account/edit" class="btn btn-teal text-white px-4">
                Ubah Profil
            </a>
        </div>
    </div>

    {{-- MENU --}}
    <div class="card shadow-sm border-0">
        <div class="list-group list-group-flush">

            <a href="/account/edit" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                <div><i class="bi bi-person me-2"></i> Ubah Profil</div>
                <i class="bi bi-chevron-right"></i>
            </a>

            <a href="/account/address" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                <div><i class="bi bi-geo-alt me-2"></i> Daftar Alamat</div>
                <i class="bi bi-chevron-right"></i>
            </a>

            <a href="/account/security" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                <div><i class="bi bi-lock me-2"></i> Keamanan Akun</div>
                <i class="bi bi-chevron-right"></i>
            </a>

            <a href="/orders" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                <div><i class="bi bi-receipt me-2"></i> Riwayat Transaksi</div>
                <i class="bi bi-chevron-right"></i>
            </a>

            <a href="/logout" class="list-group-item list-group-item-action text-danger fw-bold">
                <i class="bi bi-box-arrow-right me-2"></i> Keluar
            </a>

        </div>
    </div>

</div>

@endsection
