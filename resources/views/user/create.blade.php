@extends('master.main')
@section('title')
    SiP3 | Osis
@endsection
@section('sub-title')
    Tambah Osis
@endsection
@section('content')
    
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Quick Example</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="">
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="major">Nama Osis</label>
                  <input type="text" class="form-control" name="name" id="user" placeholder="Nama Osis">
                  @error('name')
                  <p class="text-danger">{{$message}}</p>
                      
                  @enderror
    
              </div>
                <div class="form-group">
                  <label for="major">Email</label>
                  <input type="email" class="form-control" name="email" id="user" placeholder="Email">
                  @error('email')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="major">Password</label>
                  <input type="password" class="form-control" name="password" id="user" placeholder="Password">
                  @error('password')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
    
@endsection



