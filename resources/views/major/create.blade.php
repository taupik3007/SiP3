@extends('master.main')
@section('title')
    SiP3 | Jurusan
@endsection
@section('sub-title')
    Tambah Jurusan
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
                  <label for="major">nama Jurusan</label>
                  <input type="text" class="form-control" name="mjr_name" id="major" placeholder="Nama Jurusan">
                  @error('mjr_name')
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



