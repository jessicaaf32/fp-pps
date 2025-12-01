@extends('admin.admin')
@section('title','Admin Product')
@section('Products','active')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm">
            <h1 class="m-0">Products</h1>
            <br><br>
            <div class="container"> 
              <a href="/product_tambah" class="btn btn-success">Tambah +</a>
            <br> <br>
            <form action="/aksi_product" method="post">
                @csrf
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                    <label for="validationDefault01">Nama Product</label>
                    <input type="text" class="form-control" id="validationDefault01" name="product" placeholder="Product" required>
                    </div>
                    <div class="col-md-6 mb-3">
                    <label for="validationDefault02">Keterangan 1</label>
                    <input type="text" class="form-control" id="validationDefault02" name="ket1" placeholder="Keterangan 1" required>
                    </div>
                </div>
                <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="validationDefaultUsername">Height</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        </div>
                        <input type="text" class="form-control" id="validationDefaultUsername" name="height" placeholder="Height" aria-describedby="inputGroupPrepend2" required>
                    </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationDefault03">Keterangan 3</label>
                        <input type="text" class="form-control" id="validationDefault03" name="ket3" placeholder="Keterangan 3" required>
                    </div>
                </div>
                <div class="form-row">          
                    <div class="col-md-6 mb-3">
                        <label for="validationDefault04">Kategori</label>
                        <input type="text" class="form-control" name="category" id="validationDefault04" name="category" placeholder="Kategori" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationDefault05">Price</label>
                        <input type="text" class="form-control" id="validationDefault05" name="price" placeholder="Price" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationDefault05">Stock</label>
                        <input type="text" class="form-control" id="validationDefault05" name="stock" placeholder="Stock" required>
                    </div>
                    <div class="col-md-6 mb-3">
                    <label for="validationDefault05">Gambar</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="gambar" id="validatedCustomFile" required>
                            <label class="custom-file-label" for="validatedCustomFile">Pilih file</label>
                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-6">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                        <label class="form-check-label" for="invalidCheck2">
                            Agree to terms and conditions
                        </label>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-6">
                    <button class="btn btn-dark" type="submit">Simpan</button>
                    </div>
                    
                </div>
                
                </form>
            </div>
              
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

    <!-- /.content -->
  </div>

@endsection