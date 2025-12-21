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
                        <h2>Data Product</h2>
                                                
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
                        <a href="#" class="btn btn-primary btn-pill" data-toggle="modal" data-target="#modal-stock">Add Product</a>
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
                              <th>Produk</th>
                              <th>Nama Produk</th>
                              <th>Deskripsi Produk</th>
                              <th>Harga</th>
                              <th>Kategori</th>
                              <th>Stok</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($product as $index => $products)
                              <tr>
                                <td>
                                  @php
                                      $avatar = (!empty($products->gambar) && file_exists(public_path('img/product/'.$products->gambar)))
                                                ? $products->gambar
                                                : 'Default.png';
                                  @endphp
                                  <img src="{{ asset('img/product/'.$avatar) }}" alt="Profile Image">
                                </td>
                                <td>{{ $products->product }}</td>
                                <td><div>{{ Str::limit($products->ket1, 120, '...') }}</div></td>
                                <td>Rp {{ number_format($products->price, 0, ',', '.') }}</td>
                                <td>{{ $products->category }}</td>
                                <td>{{ $products->stock }}</td>
                                <td>
                                  <div class="dropdown">
                                    <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                      aria-haspopup="true" aria-expanded="false">
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                      <form id="delete-user-{{ $products->id }}"
                                            action="{{ route('product.destroy', $products->id) }}"
                                            method="POST"
                                            class="d-none">
                                        @csrf
                                        @method('DELETE')
                                      </form>
                                      <a class="dropdown-item" href="#" onclick="event.preventDefault();
                                                  if(confirm('Yakin hapus product {{$products->product}} ini?')) {
                                                    document.getElementById('delete-user-{{ $products->id }}').submit();
                                                  }">Delete Product</a>
                                      <a href="#"
                                        class="dropdown-item btn-edit-user"
                                        data-id="{{ $products->id }}"
                                        data-product="{{ $products->product }}"
                                        data-ket1="{{ $products->ket1 }}"
                                        data-price="{{ $products->price }}"
                                        data-category="{{ $products->category }}"
                                        data-stock="{{ $products->stock }}"
                                        data-gambar="{{ $products->gambar }}"
                                        data-toggle="modal"
                                        data-target="#modal-stock">
                                        Update Product
                                      </a>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>

              <!-- Stock Modal -->
              <div class="modal fade modal-stock" id="modal-stock" aria-labelledby="modal-stock" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                  <form id="userForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                      <div class="modal-header align-items-center p3 p-md-5">
                        <h2 class="modal-title" id="exampleModalGridTitle">Add Product</h2>
                        <div>
                          <button type="button" class="btn btn-light btn-pill mr-1 mr-md-2" data-dismiss="modal"> cancel </button>
                          <button type="submit" class="btn btn-primary  btn-pill"> save </button>
                        </div>
                      </div>
                      <div class="modal-body p3 p-md-5">
                        <div class="row">
                          <div class="col-lg-8">
                            <h3 class="h5 mb-5">Products Information</h3>
                            <div class="form-group mb-5">
                              <input type="hidden" name="_method" id="formMethod">
                              <input type="hidden" name="user_id" id="user_id">
                              <label for="product">Nama Produk</label>
                              <input type="text" class="form-control" name="product" id="product" placeholder="Add Produk">
                            </div>
                            <div class="form-group mb-5">
                              <label for="ket1">Deskripsi Produk</label>
                                <div class="input-group">
                                  <textarea class="form-control" id="ket1" name="ket1" placeholder="Add Deskripsi Produk" aria-label="ket1"
                                    aria-describedby="basic-addon1"></textarea>
                                </div>
                            </div>
                            <div class="form-group mb-5">
                                <label for="category">Kategori Produk</label>
                                <select name="category" id="category" class="form-control">
                                  <option value="">-- Pilih Kategori Produk --</option>
                                  <option value="Pemrograman">Pemrograman</option>
                                  <option value="Praktikum">Praktikum</option>
                                  <option value="Security">Security</option>
                                </select>
                            </div>
                            <div class="form-row mb-4">
                              <div class="col">
                                <label for="price">Harga</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">$</span>
                                  </div>
                                  <input 
                                    type="text" 
                                    class="form-control" 
                                    id="price"
                                    name="price"
                                    placeholder="Add harga"
                                    oninput="formatRupiah(this)"
                                  >
                                </div>
                              </div>
                              <div class="col">
                                <label for="stock">Stock</label>
                                <div class="input-group">
                                  <input type="number" class="form-control" id="stock" name="stock" placeholder="Add Stock" aria-label="stock"
                                    aria-describedby="basic-addon1">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="custom-file">
                              <input type="file" name="gambar" class="custom-file-input" id="gambar" placeholder="please imgae here">
                              <span class="upload-image">Click here to <span class="text-primary">add profile image.</span> </span>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                  </form>
                </div>
              </div>
          </div>  
          
          
          <script>
            function formatRupiah(input) {
              let value = input.value.replace(/[^0-9]/g, '');
              input.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
            }

            document.addEventListener('DOMContentLoaded', function () {

              const form = document.getElementById('userForm');
              const methodInput = document.getElementById('formMethod');
              const userIdInput = document.getElementById('user_id');

              const product = document.getElementById('product');
              const ket1 = document.getElementById('ket1');
              const price = document.getElementById('price');
              const category = document.getElementById('category');
              const stock = document.getElementById('stock');
              const gambar = document.getElementById('gambar');
              const modalTitle = document.getElementById('exampleModalGridTitle');

              // 👉 MODE ADD USER (klik tombol Add User)
              document.querySelector('[data-target="#modal-stock"]').addEventListener('click', function () {
                form.action = "{{ route('product.store') }}";
                methodInput.value = '';
                userIdInput.value = '';

                product.value = '';
                ket1.value = '';
                price.value = '';
                category.value = '';
                stock.value = '';
                gambar.value = '';


                modalTitle.innerText = 'Add Product';
              });

              // 👉 MODE UPDATE USER
              document.querySelectorAll('.btn-edit-user').forEach(btn => {
                btn.addEventListener('click', function () {

                  const id = this.dataset.id;

                  form.action = `/update_product/${id}`;
                  methodInput.value = 'PUT';
                  userIdInput.value = id;

                  product.value = this.dataset.product;
                  ket1.value = this.dataset.ket1;
                  price.value = this.dataset.price;
                  category.value = this.dataset.category;
                  stock.value = this.dataset.stock;
                  gambar.value = this.dataset.gambar;

                  modalTitle.innerText = 'Update Product';
                });
              });

            });
          </script>
@endsection

