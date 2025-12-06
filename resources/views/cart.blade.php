@extends('index')
@section('title','Cart')
@section('Cart','active')

@section('content')
<section class="py-5">
  <div class="container" data-aos="fade-up">

    <div class="section-header">
      <h2>Keranjang Belanja</h2>
    </div>

    {{-- FORM UTAMA --}}
    <form id="checkoutForm" action="/checkout" method="POST">
      @csrf

      <div class="row">
        {{-- ======================== KOLOM KIRI ======================== --}}
        <div class="col-md-8">

          <div class="d-flex align-items-center mb-3">
            <input type="checkbox" id="select-all"
                   style="transform: scale(1.2); margin-right:10px;">
            <label for="select-all" class="mb-0">Pilih Semua</label>
          </div>

          @forelse($carts as $cart)
            @php $subtotal = $cart->qty * $cart->price; @endphp

            <div class="card mb-3 shadow-sm p-3">
              <div class="d-flex align-items-start">

                {{-- Checkbox Item --}}
                <input type="checkbox"
                       class="item-checkbox align-self-center"
                       style="transform: scale(1.3); margin-right:15px;"
                       name="selected_items[]"
                       value="{{ $cart->rowId }}"
                       data-price="{{ $subtotal }}">

                {{-- Gambar --}}
                <div class="me-3"
                     style="width:80px; height:80px; background:#f3f3f3; border-radius:10px; overflow:hidden;">
                  @if($cart->options->gambar)
                    <img src="{{ asset('/img/product/' . $cart->options->gambar) }}"
                         style="width:100%; height:100%; object-fit:cover;">
                  @else
                    <img src="https://via.placeholder.com/80"
                         style="width:100%; height:100%; object-fit:cover;">
                  @endif
                </div>

                {{-- Detail --}}
                <div class="flex-grow-1">
                  <h5 class="mb-1" style="font-size:16px; font-weight:600;">
                    {{ $cart->name }}
                  </h5>
                  <small class="text-muted">Qty: {{ $cart->qty }}</small>
                </div>

                {{-- Harga --}}
                <div class="text-right" style="min-width:110px;">
                  <div class="text-danger fw-bold">
                    Rp {{ number_format($cart->price,0,',','.') }}
                  </div>
                  <small class="text-muted">
                    Subtotal:<br>
                    Rp {{ number_format($subtotal,0,',','.') }}
                  </small>
                </div>

              </div>
            </div>
          @empty
            <p>Keranjang masih kosong.</p>
          @endforelse

          <div class="d-flex justify-content-between mt-3 mb-4">
            <a href="/clear" class="btn btn-outline-danger btn-sm">Clear Cart</a>
            <a href="/beranda" class="btn btn-outline-primary btn-sm">Continue Shopping</a>
          </div>

        </div>

        {{-- ======================== KOLOM KANAN ======================== --}}
        <div class="col-md-4" style="margin-top:40px;">
          <div class="card shadow-sm mb-3">
            <div class="card-body">
              <h5 class="card-title mb-3">Ringkasan Pesanan</h5>

              <div class="d-flex justify-content-between mb-1">
                <span>Subtotal</span>
                <span id="subtotalSelected">Rp 0</span>
              </div>

              <div class="d-flex justify-content-between mb-1">
                <span>Ongkir</span>
                <span>Rp 0</span>
              </div>

              <hr>

              <div class="d-flex justify-content-between fw-bold">
                <span>Total</span>
                <span id="totalSelected">Rp 0</span>
              </div>
            </div>
          </div>

          <button type="submit" id="checkoutBtn"
                  class="btn w-100 py-2"
                  style="background:#008080; color:white;"
                  disabled>
            Checkout
          </button>
        </div>

      </div> {{-- end .row --}}
    </form> {{-- end form --}}

  </div>
</section>

<script>
  const selectAll        = document.getElementById('select-all');
  const checkboxes       = document.querySelectorAll('.item-checkbox');
  const subtotalSelected = document.getElementById('subtotalSelected');
  const totalSelected    = document.getElementById('totalSelected');
  const checkoutBtn      = document.getElementById('checkoutBtn');

  function updateTotal() {
    let total = 0;
    let selected = 0;

    checkboxes.forEach(cb => {
      if (cb.checked) {
        total += parseInt(cb.dataset.price);
        selected++;
      }
    });

    const formatted = 'Rp ' + total.toLocaleString('id-ID');
    subtotalSelected.textContent = formatted;
    totalSelected.textContent    = formatted;
    checkoutBtn.disabled         = selected === 0;
  }

  selectAll.addEventListener('change', () => {
    checkboxes.forEach(cb => cb.checked = selectAll.checked);
    updateTotal();
  });

  checkboxes.forEach(cb => {
    cb.addEventListener('change', () => {
      if (!cb.checked) selectAll.checked = false;
      updateTotal();
    });
  });
</script>
@endsection
