@extends('admin/admin')
@section('title','Marketplace')
@section('Marketplace','active')

@section('content')

          <div class="content">                             
                <!-- Table Product -->
                <div class="row">
                  <div class="col-12">
                    <div class="card card-default">
                      <div class="card-header">
                        <h2>Data Orders Item</h2>
                                                
                        <div class="dropdown">
                          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> Yearly Chart
                          </a>

                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                          </div>
                        </div>
                    </div>
                      <div class="card-body">
                      @if (session('success'))
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                          </div>
                        @endif

                        {{-- ALERT ERROR VALIDATION --}}
                        @if ($errors->any())
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                              @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                              @endforeach
                            </ul>
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                          </div>
                        @endif
                        <table id="productsTable" class="table table-hover table-product" style="width:100%">
                          <thead>
                            <tr>
                              <th>ID Order</th>
                              <th>ID Produk</th>
                              <th>Nama Produk</th>
                              <th>Harga</th>
                              <th>Jumlah</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($order_items as $item)
                              <tr>
                                <td>{{ $item->order_id }}</td>
                                <td>{{ $item->product_id }}</td>
                                <td>{{ $item->product_name }}</td>
                                <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>
                                  <div class="dropdown">
                                    <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                      aria-haspopup="true" aria-expanded="false">
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                      <form id="delete-user-{{ $item->id }}"
                                            action="{{ route('order_item.destroy', $item->id) }}"
                                            method="POST"
                                            class="d-none">
                                        @csrf
                                        @method('DELETE')
                                      </form>
                                      <a class="dropdown-item" href="#" onclick="event.preventDefault();
                                                  if(confirm('Yakin hapus data ini?')) {
                                                    document.getElementById('delete-user-{{ $item->id }}').submit();
                                                  }">Delete Data</a>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                        <a href="/order_admin" class="btn btn-primary btn-pill" style="margin-top: 30px;">Kembali Ke Daftar Kelas</a>
                      </div>
                    </div>
                  </div>
                </div>
          </div>  
@endsection

