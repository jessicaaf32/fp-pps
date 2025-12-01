@extends('admin.admin')
@section('title','Admin Product')
@section('Products','active')

@section('content')
<link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"/>
  <link href="{{ asset('admin/vendor/select2/dist/css/select2.min.css') }}" rel="stylesheet"/>

  
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
            <div class="table-responsive">
        <table
          class="table table-bordered table-striped table-hover"
          id="dataTable"
          width="100%"
          cellspacing="0"
        >
          <thead>
            <tr>
              <th>No</th>
              <th>Product</th>
              <th>Keterangan 1</th>
              <th>Keterangan 2</th>
              <th>Keterangan 3</th>
              <th>Picture</th>
              <th>Price</th>
              <th>Category</th>
              <th>Stock</th>
              <th width="100">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($product as $data)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->product }}</td>
                <td>{{ $data->ket1 }}</td>
                <td>{{ $data->height }}</td>
                <td>{{ $data->ket3 }}</td>
                <td>{{ $data->gambar }}</td>
                <td>{{ $data->price }}</td>
                <td>{{ $data->category }}</td>
                <td>{{ $data->stock }}</td>
                <td>
                  <form
                    action="{{ route('product.destroy', $data->id) }}"
                    method="POST"
                  >
                    @method('delete')
                    @csrf
                    <a
                      href="{{ route('product.edit', ['product'=>$data->id]) }}"
                      type="button"
                      class="btn btn-outline-warning btn-sm btn-circle"
                      ><i class="fas fa-edit"></i
                    ></a>
                    <button
                      type="submit"
                      class="btn btn-outline-danger btn-sm btn-circle"
                      onclick="return confirm('Apakah anda yakin menghapus data');"
                    >
                      <i class="fas fa-trash"></i>
                    </button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

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