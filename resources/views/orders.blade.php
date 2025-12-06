@extends('index')
@section('title', 'Pesanan Saya')

@section('content')
<section class="py-4" style="background:#f5f5f5;">
    <div class="container">
        <br>
        <div class="section-header">
            <h2>Pembayaran</h2>
        </div>

        @if($orders->isEmpty())
            <div class="alert alert-info text-center">
                Kamu belum memiliki pesanan.
            </div>
        @endif

        @foreach ($orders as $order)
            <div class="card shadow-sm mb-3 border-0">
                <div class="card-body">

                    {{-- HEADER PESANAN --}}
                    <div class="d-flex justify-content-between mb-2">
                        <div>
                            <strong>ID Pesanan:</strong> #{{ $order->id }}  
                        </div>

                        {{-- STATUS --}}
                        <span class="badge 
                            @if($order->status == 'pending') bg-warning 
                            @elseif($order->status == 'paid') bg-primary
                            @elseif($order->status == 'shipped') bg-info
                            @elseif($order->status == 'completed') bg-success
                            @else bg-secondary 
                            @endif">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>

                    <hr>

                    {{-- ITEM PRODUK (ambil item pertama untuk preview) --}}
                    @php $firstItem = $order->items->first(); @endphp

                    <div class="d-flex align-items-center mb-3"> 

                        <div class="flex-grow-1">
                            <strong>{{ $firstItem->product_name ?? 'Produk' }}</strong><br>
                            <small class="text-muted">Total item: {{ $order->items->sum('qty') }}</small>
                        </div>

                        <div class="text-end">
                            <div class="fw-bold">
                                Rp {{ number_format($order->total, 0, ',', '.') }}
                            </div>
                            <small class="text-muted">Total Pembayaran</small>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</section>
@endsection
