@extends('admin.admin')
@section('title','Admin Product')
@section('Products','active')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm">
            <h1 class="m-0">questions</h1>
            <br><br>
            <div class="container"> 
              <a href="/question_tambah" class="btn btn-success">Tambah +</a>
            <br> <br>
            <form action="/aksi_question" method="post">
                @csrf
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                    <label for="validationDefault01">Question</label>
                    <input type="text" class="form-control" id="validationDefault01" name="question" placeholder="question" required>
                    </div>
                    <div class="col-md-6 mb-3">
                    <label for="validationDefault02">Answer</label>
                    <input type="text" class="form-control" id="validationDefault02" name="answer" placeholder="Answer" required>
                    </div>
                </div>
                <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="validationDefaultUsername">Kategori</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        </div>
                        <input type="text" class="form-control" id="validationDefaultUsername" name="categoryt" placeholder="Kategori" aria-describedby="inputGroupPrepend2" required>
                    </div>
                    
                </div>

</div>
<div class="form-row">
                    <div class="form-group col-6">
                    <button class="btn btn-dark" type="submit">Simpan</button>
                    </div>
                    
                </div>
                </form>
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