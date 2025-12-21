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
                        <h2>Data Orders</h2>
                                                
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
                          <thead class="text-center">
                            <tr>
                              <th>User</th>
                              <th>Nama Penerima</th>
                              <th>Nomor Penerima</th>
                              <th>Alamat Penerima</th>
                              <th>Metode Pembayaran</th>
                              <th>Nomer VA</th>
                              <th>QRIS</th>
                              <th>Total</th>
                              <th>Status</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody class="text-center">
                            @foreach ($order as $index => $orders)
                              <tr>
                                <td>{{ $orders->user->username }}</td>
                                <td>{{ $orders->receiver_name }}</td>
                                <td>{{ $orders->receiver_phone }}</td>
                                <td>{{ $orders->receiver_address }}</td>
                                <td>{{ $orders->payment_method}}</td>
                                <td>{{ $orders->va_number }}</td>
                                <td>
                                @if ($orders->qris_image && file_exists(public_path('qris/'.$orders->qris_image)))
                                    <img src="{{ asset('qris/'.$orders->qris_image) }}"
                                        alt="QRIS"
                                        width="60">
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                                </td>
                                <td>Rp {{ number_format($orders->total, 0, ',', '.') }}</td>
                                <td><span class="badge badge-success">{{ $orders->status }}</span></td>
                                <td>
                                  <div class="dropdown">
                                    <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                      aria-haspopup="true" aria-expanded="false">
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                      <form id="delete-user-{{ $orders->id }}"
                                            action="{{ route('order.destroy', $orders->id) }}"
                                            method="POST"
                                            class="d-none">
                                        @csrf
                                        @method('DELETE')
                                      </form>
                                      <a class="dropdown-item" href="#" onclick="event.preventDefault();
                                                  if(confirm('Yakin hapus data ini?')) {
                                                    document.getElementById('delete-user-{{ $orders->id }}').submit();
                                                  }">Delete Data</a>
                                      <a href="#"
                                        class="dropdown-item btn-edit-user"
                                        data-id="{{ $orders->id }}"
                                        data-status="{{ $orders->status }}"
                                        data-toggle="modal"
                                        data-target="#modal-stock">
                                        Update Status
                                      </a>
                                      <a href="{{ route('order.view', $orders->id) }}" class="dropdown-item btn-edit-user">Lihat Data Order Item</a>
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
              <!-- Stock Modal -->
              <div class="modal fade modal-stock" id="modal-stock" aria-labelledby="modal-stock" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                  <form id="userForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                      <div class="modal-header align-items-center p3 p-md-5">
                        <div>
                          <button type="button" class="btn btn-light btn-pill mr-1 mr-md-2" data-dismiss="modal"> cancel </button>
                          <button type="submit" class="btn btn-primary  btn-pill"> save </button>
                        </div>
                      </div>
                      <div class="modal-body p3 p-md-5">
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group mb-5">
                              <input type="hidden" name="_method" id="formMethod">
                              <input type="hidden" name="user_id" id="user_id">
                                <label for="status">Ubah Status Pembayaran</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="">-- Pilih Status Pembayaran --</option>
                                    <option value="Paid">Paid</option>
                                    <option value="Pending">Pending</option>
                                </select>
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
document.addEventListener('DOMContentLoaded', function () {

  const form = document.getElementById('userForm');
  const methodInput = document.getElementById('formMethod');
  const userIdInput = document.getElementById('user_id');
  const statusSelect = document.getElementById('status');

  document.querySelectorAll('.btn-edit-user').forEach(btn => {
    btn.addEventListener('click', function () {

      // ✅ AMBIL DATA DARI BUTTON
      const id = this.dataset.id;
      const status = this.dataset.status;

      // ✅ SET FORM
      form.action = `/update_order/${id}`;
      methodInput.value = 'PUT';
      userIdInput.value = id;

      // ✅ SET SELECT VALUE
      statusSelect.value = status;

    });
  });

});
</script>

@endsection

