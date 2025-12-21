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
                        <h2>Data Materi Kelas {{ $kelas->nama }}</h2>
                                                
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
                        <a href="#" class="btn btn-primary btn-pill" data-toggle="modal" data-target="#modal-stock">Add Materi</a>
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
                              <th>Jenis Materi</th>
                              <th>Deskripsi Materi</th>
                              <th>Link Pembelajaran</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($materi as $index => $materii)
                              <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $materii->judul_materi }}</td>
                                <td>
                                  <div>{{ Str::limit($materii->keterangan, 120, '...') }}</div>
                                </td>
                                <td>
                                    {{ $materii->link }}
                                </td>
                                <td>
                                  <div class="dropdown">
                                    <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                      aria-haspopup="true" aria-expanded="false">
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                      <form id="delete-user-{{ $materii->id }}"
                                            action="{{ route('materi.destroy', $materii->id) }}"
                                            method="POST"
                                            class="d-none">
                                        @csrf
                                        @method('DELETE')
                                      </form>
                                      <a class="dropdown-item" href="#" onclick="event.preventDefault();
                                                  if(confirm('Yakin hapus materi ini?')) {
                                                    document.getElementById('delete-user-{{ $materii->id }}').submit();
                                                  }">Delete Materi</a>
                                      <a href="#"
                                        class="dropdown-item btn-edit-user"
                                        data-id="{{ $materii->id }}"
                                        data-judul_materi="{{ $materii->judul_materi }}"
                                        data-keterangan="{{ $materii->keterangan }}"
                                        data-link="{{ $materii->link }}"
                                        data-toggle="modal"
                                        data-target="#modal-stock">
                                        Update Materi
                                      </a>
                                    </div>
                                  </div>
                                </td>
                                <td>

                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                        <a href="/kelas_admin" class="btn btn-primary btn-pill" style="margin-top: 30px;">Kembali Ke Daftar Kelas</a>
                      </div>
                    </div>
                  </div>
                </div>

              <!-- Stock Modal -->
              <div class="modal fade modal-stock" id="modal-stock" aria-labelledby="modal-stock" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                  <form id="userForm" method="POST" action="{{ route('materi.store') }}">
                    @csrf
                    <div class="modal-content">
                      <div class="modal-header align-items-center p3 p-md-5">
                        <h2 class="modal-title" id="exampleModalGridTitle">Add Materi</h2>
                        <div>
                          <button type="button" class="btn btn-light btn-pill mr-1 mr-md-2" data-dismiss="modal"> cancel </button>
                          <button type="submit" class="btn btn-primary  btn-pill"> save </button>
                        </div>

                      </div>
                      <div class="modal-body p3 p-md-5">
                        <div class="row">
                          <div class="col-lg-12">
                            <h3 class="h5 mb-5">Materi Information</h3>
                            <div class="form-row mb-4">
                              <input type="hidden" name="_method" id="formMethod">
                              <input type="hidden" name="user_id" id="user_id">
                              <input type="hidden" name="id_kelas" value="{{ $kelas->id }}">
                              <div class="col">
                                <label for="new-judul_materi">Judul Materi</label>
                                <input type="text" class="form-control" id="new-judul_materi" name="judul_materi" placeholder="Add Materi">
                              </div>
                              <div class="col">
                                <label for="link">Tautan Sumber Materi</label>
                                <input type="text" class="form-control" id="link" name="link" placeholder="Add Sumber Tautan">
                              </div>
                            </div>
                            <div class="form-row mb-4">
                              <div class="col">
                                <label for="keterangan">Deskripsi</label>
                                <div class="input-group">
                                  <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Add Deskripsi Materi" aria-label="keterangan"
                                    aria-describedby="basic-addon1"></textarea>
                                </div>
                              </div>
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

            const judul_materi = document.getElementById('new-judul_materi');
            const keterangan = document.getElementById('keterangan');
            const link = document.getElementById('link');
            const modalTitle = document.getElementById('exampleModalGridTitle');

            // 👉 MODE ADD USER (klik tombol Add User)
            document.querySelector('[data-target="#modal-stock"]').addEventListener('click', function () {
              form.action = "{{ route('materi.store') }}";
              methodInput.value = '';
              userIdInput.value = '';

              judul_materi.value = '';
              keterangan.value = '';
              link.value = '';

              modalTitle.innerText = 'Add Materi';
            });

            // 👉 MODE UPDATE USER
            document.querySelectorAll('.btn-edit-user').forEach(btn => {
              btn.addEventListener('click', function () {

                const id = this.dataset.id;

                form.action = `/update_materi/${id}`;
                methodInput.value = 'PUT';
                userIdInput.value = id;

                judul_materi.value = this.dataset.judul_materi;
                keterangan.value = this.dataset.keterangan;
                link.value = this.dataset.link;

                modalTitle.innerText = 'Update User';
              });
            });

          });
          </script>

@endsection

