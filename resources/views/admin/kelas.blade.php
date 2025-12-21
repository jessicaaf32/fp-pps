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
                                            action="{{ route('kelas.destroy', $class->id) }}"
                                            method="POST"
                                            class="d-none">
                                        @csrf
                                        @method('DELETE')
                                      </form>
                                      <a class="dropdown-item" href="#" onclick="event.preventDefault();
                                                  if(confirm('Yakin hapus kelas ini?')) {
                                                    document.getElementById('delete-user-{{ $class->id }}').submit();
                                                  }">Delete Kelas</a>
                                      <a href="#"
                                        class="dropdown-item btn-edit-user"
                                        data-id="{{ $class->id }}"
                                        data-nama="{{ $class->nama }}"
                                        data-keterangan="{{ $class->keterangan }}"
                                        data-gambar="{{ $class->gambar }}"
                                        data-toggle="modal"
                                        data-target="#modal-stock">
                                        Update Kelas
                                      </a>
                                      <a href="{{ route('materi.view', $class->id) }}" class="dropdown-item btn-edit-user">Lihat Materi</a>
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
                  <form id="userForm" method="POST" action="{{ route('class.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                      <div class="modal-header align-items-center p3 p-md-5">
                        <h2 class="modal-title" id="exampleModalGridTitle">Add Class</h2>
                        <div>
                          <button type="button" class="btn btn-light btn-pill mr-1 mr-md-2" data-dismiss="modal"> cancel </button>
                          <button type="submit" class="btn btn-primary  btn-pill"> save </button>
                        </div>

                      </div>
                      <div class="modal-body p3 p-md-5">
                        <div class="row">
                          <div class="col-lg-8">
                            <h3 class="h5 mb-5">Class Information</h3>
                            <div class="form-row mb-4">
                              <input type="hidden" name="_method" id="formMethod">
                              <input type="hidden" name="user_id" id="user_id">
                              <div class="col">
                                <label for="new-nama">Nama Kelas</label>
                                <input type="text" class="form-control" id="new-nama" name="nama" placeholder="Add Kelas">
                              </div>
                            </div>
                            <div class="form-row mb-4">
                              <div class="col">
                                <label for="keterangan">Deskripsi</label>
                                <div class="input-group">
                                  <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Add Deskripsi Kelas" aria-label="keterangan"
                                    aria-describedby="basic-addon1"></textarea>
                                </div>
                              </div>
                            </div>

                          </div>
                          <div class="col-lg-4">
                            <div class="custom-file">
                              <input type="file" name="gambar" class="custom-file-input" id="customFile" placeholder="please imgae here">
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

            const nama = document.getElementById('new-nama');
            const keterangan = document.getElementById('keterangan');
            const gambar = document.getElementById('gambar');
            const modalTitle = document.getElementById('exampleModalGridTitle');

            // 👉 MODE ADD USER (klik tombol Add User)
            document.querySelector('[data-target="#modal-stock"]').addEventListener('click', function () {
              form.action = "{{ route('class.store') }}";
              methodInput.value = '';
              userIdInput.value = '';

              nama.value = '';
              keterangan.value = '';
              gambar.value = '';

              modalTitle.innerText = 'Add Class';
            });

            // 👉 MODE UPDATE USER
            document.querySelectorAll('.btn-edit-user').forEach(btn => {
              btn.addEventListener('click', function () {

                const id = this.dataset.id;

                form.action = `/update_kelas/${id}`;
                methodInput.value = 'PUT';
                userIdInput.value = id;

                nama.value = this.dataset.nama;
                keterangan.value = this.dataset.keterangan;
                gambar.value = this.dataset.gambar;

                modalTitle.innerText = 'Update Class';
              });
            });

          });
          </script>

@endsection

