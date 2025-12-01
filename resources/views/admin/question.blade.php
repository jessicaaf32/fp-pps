@extends('admin.admin')
@section('title','Admin Question')
@section('Question','active')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm">
            <h1 class="m-0">Questions</h1>
            <br><br>
            <div class="container"> 
            <a href="/question_tambah" class="btn btn-success">Tambah +</a>
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
              <th>Questions</th>
              <th>Answer</th>
              <th>Categoryt</th>
              <th width="100">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($Questions as $data)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->questions }}</td>
                <td>{{ $data->answer }}</td>
                <td>{{ $data->categoryt }}</td>
                <td>
                  <form
                    action="{{ route('question.destroy', $data->id) }}"
                    method="POST"
                  >
                    @csrf
                    @method('delete')
                    <a
                      href="{{ route('question.edit', ['question'=>$data->id]) }}"
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