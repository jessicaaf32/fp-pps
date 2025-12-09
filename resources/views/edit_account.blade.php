<style>
    #btn-teal { background:#008080; color:#fff; }
    #btn-teal:hover { background:#006d6d; color:white; }

    #avatar-preview {
        width:110px;
        height:110px;
        border-radius:50%;
        overflow:hidden;
        border:3px solid #eaeaea;
        object-fit:cover;
    }
</style>

@extends('index')
@section('title','Ubah Profil')
@section('Akun','active')



@section('content')

<div class="container py-5" style="max-width:700px;">

    {{-- ALERT SUKSES --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <h3 class="mb-4 text-center text-weight-bold">Ubah Profil</h3>
    <div class="card shadow-sm border-0">
        <div class="card-body">

            {{-- FOTO PROFIL --}}
            <div class="text-center mb-4">
                <div class="avatar-preview mx-auto mb-3" id="avatar-preview">

                    @if($user->ava)
                        <img src="{{ asset('img/team/'.$user->ava) }}" class="w-100 h-100">
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&size=110"
                             class="w-100 h-100">
                    @endif

                </div>

                <small class="text-muted">Unggah foto baru jika ingin mengganti.</small>
            </div>

            {{-- FORM --}}
            <form action="/account/update" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-3">
                    <label>Nama Lengkap</label>
                    <input type="text" name="username" class="form-control"
                           value="{{ old('name', $user->username) }}" required>
                </div>

                <div class="form-group mb-3">
                    <label>No. Telepon</label>
                    <input type="text" name="phone" class="form-control"
                           value="{{ old('phone', $user->phone) }}">
                </div>

                <div class="form-group mb-3">
                    <label>Alamat</label>
                    <textarea name="address" class="form-control" rows="2">{{ old('address', $user->address) }}</textarea>
                </div>

                <div class="form-group mb-4">
                    <label>Foto Profil</label>
                    <input type="file" name="ava" class="form-control">
                </div>

                <button class="btn btn-teal w-100 py-2" id="btn-teal">Simpan Perubahan</button>

            </form>

        </div>
    </div>

    <a href="/account" class="btn btn-outline-secondary mt-4">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>

</div>

@endsection
