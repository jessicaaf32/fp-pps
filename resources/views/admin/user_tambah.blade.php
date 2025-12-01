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
            <h1 class="m-0">User</h1>
            <br><br>
            <div class="container"> 
              <a href="/product_tambah" class="btn btn-success">Tambah +</a>
            <br> <br>
            <form>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                    <label for="validationDefault01">Username</label>
                    <input type="text" class="form-control" id="validationDefault01" name="username" placeholder="Username" value="Mark" required>
                    </div>
                    <div class="col-md-6 mb-3">
                    <label for="validationDefault02">Email</label>
                    <input type="text" class="form-control" id="validationDefault02" name="email" placeholder="Email" value="Otto" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationDefault03">Password</label>
                        <input type="text" class="form-control" id="validationDefault03" name="password" placeholder="password" required>
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