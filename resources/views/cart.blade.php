@extends('index')
@section('title','Cart')
@section('Shop','active')

@section('content')
    
<section>
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Pemesanan</h2>
        </div>
        <table class="table table-bordered table-striped table-hover bg-white">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody> 
                <?php 
                    $total=0;
                ?>
                @foreach($carts as $cart)
                <?php 
                    $subtotal = $cart->qty * $cart->price;
                ?>
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$cart->name}}</td>
                    <td>
                        {{$cart->qty}}
                    </td>
                    <td align="right">Rp. {{ number_format($cart->price /1000,3) }}</td>
                    <td align="right">Rp. {{ number_format($subtotal /1000,3) }}</td>
                </tr>
                <?php 
                    $total+=$subtotal;
                ?>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td align="right" colspan="4" class="font-weight-bold">Total </td>
                    <td align="right" name="total">Rp. {{ number_format($total /1000,3) }}</td>
                </tr>
            </tfoot>
        </table> <br>
           
        <div align="right">
            <div class="text-right"><a href="/clear" class="btn btn-danger col-sm-2">Clear cart</a>
            <a href="/beranda" class="btn btn-primary col-sm-2">Continue Shopping</a></div>
            <!-- <div class="text-center"><a href="/order" class="btn btn-success col-sm-2">Check out</a></div> -->
        </div><br>

            <form action="/invoice" method="post">
              @csrf
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="Telepon" id="Telepon" placeholder="Telepon" required>
              </div>
              <div class="form-group mt-3">
                <select
                  class="form-control"
                  id="category_id"
                  name="pembayaran"
                  required
                  style="width: 100%; color: #6e707e;"
                >
                  <option value="" disabled selected>Pilih pembayaran</option>
                    <option value="BRI">BRI</option>
                    <option value="BNI">BNI</option>
                    <option value="Linkaja">Linkaja</option>
                    <option value="DANA">DANA</option>
                </select>
              </div> 
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="norek" id="norek" placeholder="No Rekening" required>
              </div>
              <div class="row mt-3">
                <div class="col-md-6 form-group">
                  <textarea class="form-control" name="Alamat" rows="7" placeholder="Alamat" required></textarea>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <textarea class="form-control" name="ket" rows="7" placeholder="Keterangan Tambahan" required></textarea>
                </div>
              </div>
              <div class="text-center mt-3"><button type="submit" class="btn col-sm-2" style="background-color: #008080; color: white;">Pesan</button></div>  
            </form>

      </div>
    </section><!-- End Contact Section -->


</div>       
@endsection