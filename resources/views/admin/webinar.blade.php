@extends('admin/admin')
@section('title','Data Webinar')
@section('Webinar','active')

@section('content')

          <div class="content">                             
                <!-- Table Product -->
                <div class="row">
                  <div class="col-12">
                    <div class="card card-default">
                      <div class="card-header">
                        <h2>Data Webinar</h2>
                                                
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
                        <a href="#" class="btn btn-primary btn-pill" data-toggle="modal" data-target="#modal-stock">Add Webinar</a>
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
                              <th>Poster</th>
                              <th>Judul</th>
                              <th>Sub Judul</th>
                              <th>Deskripsi</th>
                              <th>Tanggal</th>
                              <th>Jam Pelaksanaan</th>
                              <th>Jenis</th>
                              <th>Link</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($webinar as $index => $webinarr)
                              <tr>
                                <td>
                                  @php
                                      $avatar = (!empty($webinarr->poster_url) && file_exists(public_path('img/webinar/'.$webinarr->poster_url)))
                                                ? $webinarr->poster_url
                                                : 'Default.png';
                                  @endphp

                                  <img src="{{ asset('img/webinar/'.$avatar) }}" alt="Profile Image">
                                </td>
                                <td>{{ $webinarr->title }}</td>
                                <td>{{ $webinarr->subtitle }}</td>
                                <td>
                                  <div>{{ Str::limit($webinarr->description, 120, '...') }}</div>
                                <td>{{ $webinarr->date}}</td>
                                <td>
                                  <div>{{ $webinarr->time_start}} - {{ $webinarr->time_end}}</div>
                                </td>
                                <td>{{ $webinarr->webinar_type}}</td>
                                <td>{{ $webinarr->link}}</td>
                                <td>
                                  <div class="dropdown">
                                    <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                      aria-haspopup="true" aria-expanded="false">
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                      <form id="delete-user-{{ $webinarr->id }}"
                                            action="{{ route('webinar.destroy', $webinarr->id) }}"
                                            method="POST"
                                            class="d-none">
                                        @csrf
                                        @method('DELETE')
                                      </form>
                                      <a class="dropdown-item" href="#" onclick="event.preventDefault();
                                                  if(confirm('Yakin hapus data webinar {{ $webinarr->title }}ini?')) {
                                                    document.getElementById('delete-user-{{ $webinarr->id }}').submit();
                                                  }">Delete</a>
                                      <a href="#"
                                        class="dropdown-item btn-edit-user"
                                        data-id="{{ $webinarr->id }}"
                                        data-title="{{ $webinarr->title }}"
                                        data-subtitle="{{ $webinarr->subtitle }}"
                                        data-description="{{ $webinarr->description }}"
                                        data-date="{{ $webinarr->date }}"
                                        data-time_start="{{ $webinarr->time_start }}"
                                        data-time_end="{{ $webinarr->time_end }}"
                                        data-webinar_type="{{ $webinarr->webinar_type }}"
                                        data-poster_url="{{ $webinarr->poster_url }}"
                                        data-link="{{ $webinarr->link }}"
                                        data-toggle="modal"
                                        data-target="#modal-stock">
                                        Update
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
                  <form id="userForm" method="POST" action="{{ route('webinar.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                      <div class="modal-header align-items-center p3 p-md-5">
                        <h2 class="modal-title" id="exampleModalGridTitle">Add Webinar</h2>
                        <div>
                          <button type="button" class="btn btn-light btn-pill mr-1 mr-md-2" data-dismiss="modal"> cancel </button>
                          <button type="submit" class="btn btn-primary  btn-pill"> save </button>
                        </div>

                      </div>
                      <div class="modal-body p3 p-md-5">
                        <div class="row">
                          <div class="col-lg-8">
                            <h3 class="h5 mb-5">Webinar Information</h3>
                            <div class="form-row mb-4">
                              <input type="hidden" name="_method" id="formMethod">
                              <input type="hidden" name="user_id" id="user_id">
                              <div class="col">
                                <label for="title">Judul Webinar</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Add Judul Webinar">
                              </div>
                              <div class="col">
                                <label for="date">Tanggal Pelaksanaan</label>
                                <div class="input-group">
                                  <input type="date" class="form-control" id="date" name="date" placeholder="Add Tanggal Pelaksanaan" aria-label="date"
                                    aria-describedby="basic-addon1">
                                </div>
                              </div>
                            </div>
                            <div class="form-row mb-4">
                              <div class="col">
                                <label for="subtitle">Sub Judul Webinar</label>
                                <div class="input-group">
                                  <textarea class="form-control" id="subtitle" name="subtitle" placeholder="Add Sub Judul Webinar" aria-label="subtitle"
                                    aria-describedby="basic-addon1"></textarea>
                                </div>
                              </div>
                              <div class="col">
                                <label for="description">Deskripsi</label>
                                <div class="input-group">
                                  <textarea class="form-control" id="description" name="description" placeholder="Add Deskripsi" aria-label="description"
                                    aria-describedby="basic-addon1"></textarea>
                                </div>
                              </div>
                            </div>
                            <div class="form-row mb-4">
                              <div class="col">
                                <label for="time_start">Jam Mulai</label>
                                <input type="time" class="form-control" id="time_start" name="time_start" placeholder="Add Jam Mulai">
                              </div>
                              <div class="col">
                                <label for="time_end">Jam Selesai</label>
                                <div class="input-group">
                                  <input type="time" class="form-control" id="time_end" name="time_end" placeholder="Add Jam Selesai" aria-label="time_end"
                                    aria-describedby="basic-addon1">
                                </div>
                              </div>
                            </div>
                            <div class="form-row mb-4">
                              <div class="col">
                                <label for="webinar_type">Tipe Webinar</label>
                                <select name="webinar_type" id="webinar_type" class="form-control">
                                  <option value="">-- Pilih Tipe Webinar --</option>
                                  <option value="Nasional">Nasional</option>
                                  <option value="Internasional">Internasional</option>
                                </select>
                              </div>
                              <div class="col">
                                <label for="link">Tautan Webinar</label>
                                <input type="text" class="form-control" id="link" name="link" placeholder="Add Tautan Webinar">
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="custom-file">
                              <input type="file" name="poster_url" class="custom-file-input" id="poster_url" placeholder="please imgae here">
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

            const title = document.getElementById('title');
            const subtitle = document.getElementById('subtitle');
            const description = document.getElementById('description');
            const date = document.getElementById('date');
            const time_start = document.getElementById('time_start');
            const time_end = document.getElementById('time_end');
            const webinar_type = document.getElementById('webinar_type');
            const link = document.getElementById('link');
            const poster_url = document.getElementById('poster_url');
            const modalTitle = document.getElementById('exampleModalGridTitle');

            // 👉 MODE ADD USER (klik tombol Add User)
            document.querySelector('[data-target="#modal-stock"]').addEventListener('click', function () {
              form.action = "{{ route('webinar.store') }}";
              methodInput.value = '';
              userIdInput.value = '';

              title.value = '';
              subtitle.value = '';
              description.value = '';
              date.value = '';
              time_start.value = '';
              time_end.value = '';
              webinar_type.value = '';
              link.value = '';
              poster_url.value = '';


              modalTitle.innerText = 'Add Webinar';
            });

            // 👉 MODE UPDATE USER
            document.querySelectorAll('.btn-edit-user').forEach(btn => {
              btn.addEventListener('click', function () {

                const id = this.dataset.id;

                form.action = `/update_webinar/${id}`;
                methodInput.value = 'PUT';
                userIdInput.value = id;

                title.value = this.dataset.title;
                subtitle.value = this.dataset.subtitle;
                description.value = this.dataset.description;
                date.value = this.dataset.date;
                time_start.value = this.dataset.time_start;
                time_end.value = this.dataset.time_end;
                webinar_type.value = this.dataset.webinar_type;
                link.value = this.dataset.link;
                poster_url.value = this.dataset.poster_url;

                modalTitle.innerText = 'Update Webinar';
              });
            });

          });
          </script>

@endsection

