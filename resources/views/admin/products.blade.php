@extends('admin.layout')

@section('title', 'Products')
@section('menu_product', 'active')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h3>Products</h3>
    <a href="/product_tambah" class="btn btn-success">Tambah +</a>
</div>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Product</th>
            <th>Keterangan</th>
            <th>Picture</th>
            <th>Price</th>
            <th>Category</th>
            <th>Stock</th>
            <th width="80">Action</th>
        </tr>
    </thead>

    <tbody>
    @foreach ($product as $data)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $data->product }}</td>
            <td>{{ $data->ket1 }}</td>
            <td>{{ $data->gambar }}</td>
            <td>{{ $data->price }}</td>
            <td>{{ $data->category }}</td>
            <td>{{ $data->stock }}</td>
            <td>
                <a href="{{ route('product.edit', $data->id) }}" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit"></i>
                </a>

                <form action="{{ route('product.destroy', $data->id) }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection
