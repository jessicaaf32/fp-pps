@extends('index')
@section('title','Checkout')

@section('content')
<section class="py-5">
  <div class="container">

    <h2 class="mb-4">Ringkasan Pesanan</h2>

    <form action="/order" method="POST">
      @csrf

      <div class="row">
        {{-- KIRI: alamat + produk --}}
        <div class="col-md-8">

          {{-- 1. ALAMAT PENGIRIMAN --}}
          <div class="card mb-3">
            <div class="card-body">
              <h5 class="mb-3">Alamat Pengiriman</h5>

              <div class="form-group mb-2">
                <label>Nama Penerima</label>
                <input type="text" name="receiver_name" class="form-control"
                       value="{{ old('receiver_name', Auth::user()->username) }}" required>
              </div>

              <div class="form-group mb-2">
                <label>No. Telepon</label>
                <input type="text" name="receiver_phone" class="form-control"
                       value="{{ old('receiver_phone', Auth::user()->phone ?? '') }}" required>
              </div>

              <div class="form-group mb-2">
                <label>Alamat Lengkap</label>
                <textarea name="receiver_address" rows="3" class="form-control" required>
{{ trim(old('receiver_address', Auth::user()->address ?? '')) }}
                </textarea>
              </div>
            </div>
          </div>

          {{-- 2. LIST PRODUK YANG DI-CHECKOUT --}}
          <div class="card">
            <div class="card-body">
              <h5 class="mb-3">Produk</h5>

              @foreach ($items as $item)
                @php $subtotal = $item->qty * $item->price; @endphp

                <div class="d-flex mb-3">
                  {{-- gambar --}}
                  <div style="width:70px;height:70px;background:#f3f3f3;border-radius:8px;overflow:hidden" class="me-3">
                    @if($item->options->gambar)
                      <img src="{{ asset('img/product/'.$item->options->gambar) }}"
                           style="width:100%;height:100%;object-fit:cover">
                    @endif
                  </div>

                  {{-- detail --}}
                  <div class="flex-grow-1">
                    <div class="fw-semibold">{{ $item->name }}</div>
                    <small class="text-muted">Qty: {{ $item->qty }}</small>
                  </div>

                  {{-- harga --}}
                  <div class="text-end">
                    <div>Rp {{ number_format($item->price,0,',','.') }}</div>
                    <small class="text-muted">Subtotal:
                      Rp {{ number_format($subtotal,0,',','.') }}
                    </small>
                  </div>
                </div>

                {{-- kirim rowId & qty ke backend --}}
                <input type="hidden" name="items[{{ $loop->index }}][row_id]" value="{{ $item->rowId }}">
                <input type="hidden" name="items[{{ $loop->index }}][qty]" value="{{ $item->qty }}">
              @endforeach
            </div>
          </div>
        </div>

        {{-- KANAN: ringkasan & metode bayar --}}
        <div class="col-md-4">

          {{-- 3. RINGKASAN TOTAL --}}
          <div class="card mb-3">
            <div class="card-body">
              <h5 class="mb-3">Ringkasan Pesanan</h5>

              <div class="d-flex justify-content-between mb-1">
                <span>Subtotal</span>
                <span>Rp {{ number_format($total,0,',','.') }}</span>
              </div>

              <div class="d-flex justify-content-between mb-1">
                <span>Ongkir</span>
                <span>Rp 0</span>
              </div>

              <hr>

              <div class="d-flex justify-content-between fw-bold">
                <span>Total</span>
                <span>Rp {{ number_format($total,0,',','.') }}</span>
              </div>
            </div>
          </div>

          {{-- 4. METODE PEMBAYARAN --}}
          <div class="card mb-3">
            <div class="card-body">
              <h5 class="mb-3">Metode Pembayaran</h5>

              <select name="payment_method" class="form-control" required>
                <option value="" disabled selected>Pilih metode</option>
                <option value="cod">Bayar di tempat (COD)</option>
                <option value="transfer_bri">Transfer BRI</option>
                <option value="transfer_bni">Transfer BNI</option>
                <option value="qris">QRIS</option>
              </select>
            </div>
          </div>

          {{-- TOMBOL --}}
          <button type="submit" class="btn w-100 py-2"
                  style="background:#008080;color:#fff;">
            Buat Pesanan
          </button>
        </div>
      </div>
    </form>

  </div>
</section>
@endsection
