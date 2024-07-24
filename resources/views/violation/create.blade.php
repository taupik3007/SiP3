@extends('master.main')
@section('title')
    SiP3 | Pelanggaran
@endsection
@section('sub-title')
    Tambah Pelanggaran
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
                  <label for="violation">Nama Pelanggaran</label>
                  <input type="text" class="form-control" name="vlt_name" id="violation" placeholder="Nama Pelanggaran">
                  @error('vlt_name')
                  <p class="text-danger">{{$message}}</p>
                      
                  @enderror
                
                  <br>
                  <label for="violation">Jumlah Point</label>
                  <input type="number" class="form-control" name="vlt_point" id="violation" placeholder="Jumlah Point">
                  @error('vlt_point')
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



