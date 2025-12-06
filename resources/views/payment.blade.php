@extends('index')
@section('title','Payment')

@section('content')
<section class="py-5">
<div class="container">

    <div class="section-header">
      <h2>Pembayaran</h2>
    </div>

    {{-- INFO TOTAL --}}
    <div class="card shadow-sm mb-3">
        <div class="card-body">
            <h5>Order ID: {{ $order->id }}</h5>
            <p>Total pembayaran:</p>
            <h3 class="text-success">Rp {{ number_format($order->total,0,',','.') }}</h3>
        </div>
    </div>

    {{-- METODE BAYAR --}}
    @if($order->payment_method == 'cod')
        <div class="alert alert-info">
            Pesanan Anda akan dibayar saat barang diterima (COD).
        </div>

    @elseif($order->payment_method == 'transfer_bri' || $order->payment_method == 'transfer_bni')
        <div class="card p-3 mb-3">
            <h5>Transfer Bank</h5>
            <p>No. Virtual Account:</p>

            <h3 class="fw-bold">{{ $order->va_number }}</h3>
            <p class="text-muted">Silakan transfer sesuai total pembayaran.</p>
        </div>

    @elseif($order->payment_method == 'qris')
        <div class="card p-3 mb-3">
            <h5>Pembayaran QRIS</h5>

            <img src="{{ asset('qris/qris-default2.png') }}" width="250">

            <p class="text-muted mt-2">Scan QR untuk menyelesaikan pembayaran.</p>
        </div>
    @endif

    <a href="/payment-success/{{ $order->id }}" class="btn btn-success w-100" style="background:#008080; color:white;">
        Saya Sudah Membayar
    </a>

</div>
</section>
@endsection
