@extends('admin/admin')
@section('title','Data Kelas')
@section('Kelas','active')

@section('content')

          <div class="content">                             
                <!-- Table Product -->
                <div class="row">
                  <div class="col-12">
                    <div class="card card-default">
                      <div class="card-header">
                        <h2>Data Kelas</h2>
                                                
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
                        <a href="#" class="btn btn-primary btn-pill" data-toggle="modal" data-target="#modal-stock">Add Kelas</a>
                      </div>
                      <div class="card-body">
                        {{-- ALERT SUCCESS --}}
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
                              <th>No</th>
                              <th>Jenis Kelas</th>
                              <th>Deskripsi Kelas</th>
                              <th>Gambar</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($kelas as $index => $class)
                              <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $class->nama }}</td>
                                <td>
                                  <div>{{ Str::limit($class->keterangan, 120, '...') }}</div>
                                </td>
                                <td>
                                  @php
                                      $avatar = (!empty($class->gambar) && file_exists(public_path('img/kelas/'.$class->gambar)))
                                                ? $class->gambar
                                                : 'Default.png';
                                  @endphp

                                  <img src="{{ asset('img/kelas/'.$avatar) }}">
                                </td>
                                <td>
                                  <div class="dropdown">
                                    <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                      aria-haspopup="true" aria-expanded="false">
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                      <form id="delete-user-{{ $class->id }}"
                                            action="{{ route('user.destroy', $class->id) }}"
                                            method="POST"
                                            class="d-none">
                                        @csrf
                                        @method('DELETE')
                                      </form>
                                      <a class="dropdown-item" href="#" onclick="event.preventDefault();
                                                  if(confirm('Yakin hapus user ini?')) {
                                                    document.getElementById('delete-user-{{ $class->id }}').submit();
                                                  }">Delete User</a>
                                      <a href="#"
                                        class="dropdown-item btn-edit-user"
                                        data-id="{{ $class->id }}"
                                        data-username="{{ $class->username }}"
                                        data-email="{{ $class->email }}"
                                        data-phone="{{ $class->phone }}"
                                        data-address="{{ $class->address }}"
                                        data-toggle="modal"
                                        data-target="#modal-stock">
                                        Update User
                                      </a>
                                      <a href="{{ route('materi.view', $class->id) }}" class="dropdown-item btn-edit-user">Lihat Materi</a>
                                    </div>
                                  </div>
                                </td>
                                <td>

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
                  <form id="userForm" method="POST" action="{{ route('user.store') }}">
                    @csrf
                    <div class="modal-content">
                      <div class="modal-header align-items-center p3 p-md-5">
                        <h2 class="modal-title" id="exampleModalGridTitle">Add User</h2>
                        <div>
                          <button type="button" class="btn btn-light btn-pill mr-1 mr-md-2" data-dismiss="modal"> cancel </button>
                          <button type="submit" class="btn btn-primary  btn-pill"> save </button>
                        </div>

                      </div>
                      <div class="modal-body p3 p-md-5">
                        <div class="row">
                          <div class="col-lg-8">
                            <h3 class="h5 mb-5">User Information</h3>
                            <div class="form-row mb-4">
                              <input type="hidden" name="_method" id="formMethod">
                              <input type="hidden" name="user_id" id="user_id">
                              <div class="col">
                                <label for="new-username">Username</label>
                                <input type="text" class="form-control" id="new-username" name="username" placeholder="Add Username">
                              </div>
                              <div class="col">
                                <label for="email">Email</label>
                                <div class="input-group">
                                  <input type="email" class="form-control" id="email" name="email" placeholder="Add Email" aria-label="email"
                                    aria-describedby="basic-addon1">
                                </div>
                              </div>
                            </div>
                            <div class="form-row mb-4">
                              <div class="col">
                                <label for="password">
                                  Password <small class="text-muted">(kosongkan jika tidak diubah)</small>
                                </label>
                                <div class="input-group">
                                  <input type="password"
                                        class="form-control"
                                        id="password"
                                        name="password"
                                        placeholder="Add Password">
                                </div>
                              </div>

                              <div class="col">
                                <label for="phone">Phone</label>
                                <div class="input-group">
                                  <input type="tel" class="form-control" id="phone" name="phone" placeholder="Add Phone" aria-label="phone"
                                    aria-describedby="basic-addon1">
                                </div>
                              </div>
                            </div>
                            <div class="form-row mb-4">
                              <div class="col">
                                <label for="address">Address</label>
                                <div class="input-group">
                                  <textarea class="form-control" id="address" name="address" placeholder="Add address" aria-label="address"
                                    aria-describedby="basic-addon1"></textarea>
                                </div>
                              </div>
                            </div>

                          </div>
                          <div class="col-lg-4">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="customFile" placeholder="please imgae here">
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
          document.addEventListener('DOMContentLoaded', function () {

            const form = document.getElementById('userForm');
            const methodInput = document.getElementById('formMethod');
            const userIdInput = document.getElementById('user_id');

            const username = document.getElementById('new-username');
            const email = document.getElementById('email');
            const phone = document.getElementById('phone');
            const address = document.getElementById('address');
            const password = document.getElementById('password');
            const modalTitle = document.getElementById('exampleModalGridTitle');

            // 👉 MODE ADD USER (klik tombol Add User)
            document.querySelector('[data-target="#modal-stock"]').addEventListener('click', function () {
              form.action = "{{ route('user.store') }}";
              methodInput.value = '';
              userIdInput.value = '';

              username.value = '';
              email.value = '';
              phone.value = '';
              address.value = '';
              password.value = '';

              modalTitle.innerText = 'Add User';
            });

            // 👉 MODE UPDATE USER
            document.querySelectorAll('.btn-edit-user').forEach(btn => {
              btn.addEventListener('click', function () {

                const id = this.dataset.id;

                form.action = `/update_user/${id}`;
                methodInput.value = 'PUT';
                userIdInput.value = id;

                username.value = this.dataset.username;
                email.value = this.dataset.email;
                phone.value = this.dataset.phone;
                address.value = this.dataset.address;

                password.value = ''; // kosongkan password
                modalTitle.innerText = 'Update User';
              });
            });

          });
          </script>

@endsection

