@extends('index')
@section('title','Pembayaran Berhasil')

@section('content')
<section class="py-5">
    <div class="container text-center">

        {{-- ICON SUKSES --}}
        <div class="mb-4">
            <div style="
                width:100px;
                height:100px;
                margin:auto;
                border-radius:50%;
                background:#00C853;
                display:flex;
                align-items:center;
                justify-content:center;">
                <i class="bi bi-check-lg" style="font-size:55px; color:white;"></i>
            </div>
        </div>

        {{-- PESAN --}}
        <h3 class="fw-bold">Pembayaran Berhasil!</h3>
        <p class="text-muted">
            Terima kasih atas pesanan Anda.  
            Kami telah menerima pembayaran Anda dan sedang menyiapkan pesanan.
        </p>

        {{-- INFO ORDER --}}
        <div class="card shadow-sm mx-auto mb-4" style="max-width: 400px;">
            <div class="card-body text-start">
                <h6 class="fw-bold mb-2">Detail Pesanan</h6>

                <div class="d-flex justify-content-between mb-1">
                    <span>ID Pesanan</span>
                    <span>#{{ $order->id }}</span>
                </div>

                <div class="d-flex justify-content-between mb-1">
                    <span>Total Pembayaran</span>
                    <span>Rp {{ number_format($order->total, 0, ',', '.') }}</span>
                </div>

                <div class="d-flex justify-content-between mb-1">
                    <span>Metode Pembayaran</span>
                    <span class="text-uppercase">{{ str_replace('_',' ', $order->payment_method) }}</span>
                </div>

                <hr>

                <small class="text-muted">
                    Anda akan menerima notifikasi ketika pesanan dikirim.
                </small>
            </div>
        </div>

        {{-- TOMBOL --}}
        <a href="/orders" class="btn btn-dark w-100 py-2" style="max-width: 400px;">
            Lihat Pesanan
        </a>

    </div>
</section>
@endsection
