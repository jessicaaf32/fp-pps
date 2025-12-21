@extends('admin/admin')
@section('title','Data Score Quiz')
@section('Kuis','active')

@section('content')

          <div class="content">                             
                <!-- Table Product -->
                <div class="row">
                  <div class="col-12">
                    <div class="card card-default">
                      <div class="card-header">
                        <h2>Data Score Quiz</h2>
                                                
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
                                <th></th>
                                <th>#</th>
                                <th>Quiz</th>
                                <th>User</th>
                                <th>Score</th>
                                <th>Time Spent</th>
                                <th>Tanggal</th>
                                <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($kuis as $i => $score)
                            <tr>
                                <td></td>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $score->quiz_slug }}</td>
                                <td>{{ $score->user_name }}</td>
                                <td>
                                <span class="badge badge-success">
                                    {{ $score->score }}
                                </span>
                                </td>
                                <td>{{ $score->time_spent }} detik</td>
                                <td>{{ $score->created_at->format('d M Y H:i') }}</td>
                                                                <td>
                                  <div class="dropdown">
                                    <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                      aria-haspopup="true" aria-expanded="false">
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                      <form id="delete-user-{{ $score->id }}"
                                            action="{{ route('kuis.destroy', $score->id) }}"
                                            method="POST"
                                            class="d-none">
                                        @csrf
                                        @method('DELETE')
                                      </form>
                                      <a class="dropdown-item" href="#" onclick="event.preventDefault();
                                        if(confirm('Yakin hapus data ini?')) {
                                          document.getElementById('delete-user-{{ $score->id }}').submit();
                                        }">Delete Data
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

