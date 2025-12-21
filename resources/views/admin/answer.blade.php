@extends('admin/admin')
@section('title','Data Diskusi')
@section('Diskusi','active')

@section('content')

          <div class="content">                             
                <!-- Table Product -->
                <div class="row">
                  <div class="col-12">
                    <div class="card card-default">
                      <div class="card-header">
                        <h2>Data Diskusi Jawaban dari Pertanyaan <small>"{{ $diskusi->questions_detail }}"</small></h2>
                                                
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
                              <th>Penjawab</th>
                              <th>Jawaban</th>
                              <th>Likes</th>
                              <th>Waktu Dibuat</th>
                              <th>Waktu Diubah</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($answer as $index => $answers)
                              <tr>
                                <td>{{ $answers->user->username }}</td>
                                <td>{{ $answers->answer_detail }}</td>
                                <td>{{ $answers->likes }}</td>
                                <td>{{ $answers->created_at?->format('d M Y H:i') }}</td>
                                <td>{{ $answers->updated_at?->format('d M Y H:i') }}</td>
                                <td>
                                  <div class="dropdown">
                                    <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                      aria-haspopup="true" aria-expanded="false">
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                      <form id="delete-user-{{ $answers->id }}"
                                            action="{{ route('answer.destroy', $answers->id) }}"
                                            method="POST"
                                            class="d-none">
                                        @csrf
                                        @method('DELETE')
                                      </form>
                                      <a class="dropdown-item" href="#" onclick="event.preventDefault();
                                                  if(confirm('Yakin hapus jawaban {{ $answers->answer_detail }} ini?')) {
                                                    document.getElementById('delete-user-{{ $answers->id }}').submit();
                                                  }">Delete Jawaban</a>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                        <a href="/diskusi_admin" class="btn btn-primary btn-pill" style="margin-top: 30px;">Kembali Ke Daftar Pertanyaan</a>
                      </div>
                    </div>
                  </div>
                </div>
              <!-- Stock Modal -->
          </div>         

@endsection

