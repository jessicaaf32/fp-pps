@extends('admin.admin')
@section('title','Admin Order')
@section('Order','active')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm">
            <h1 class="m-0">Order</h1>
            <br><br>
            <div class="container"> 
            <button type="button" class="btn btn-success">Tambah +</button>
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
              <th>Nama</th>
              <th>Email</th>
              <th>Telepon</th>
              <th>Pembayaran</th>
              <th>Rekening</th>
              <th>Alamat</th>
              <th>Keterangan</th>
              <th width="100">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($Invoice as $data)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->telepon }}</td>
                <td>{{ $data->pembayaran }}</td>
                <td>{{ $data->rekening }}</td>
                <td>{{ $data->alamat }}</td>
                <td>{{ $data->ket }}</td>
                <td>
                  <form
                    action="{{ route('transportasi.destroy', $data->id) }}"
                    method="POST"
                  >
                    @csrf
                    @method('delete')
                    <a
                      href="{{ route('transportasi.edit', $data->id) }}"
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