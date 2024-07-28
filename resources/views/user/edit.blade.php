@extends('master.main')
@section('title')
    SiP3 | User
@endsection
@section('sub-title')
    Edit User
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
                  <label for="user">Nama User</label>
                  <input type="text" class="form-control" name="name" value="{{$user->name}}" id="user" placeholder="Nama User">
                  @error('name')
                  <p class="text-danger">{{$message}}</p>
                      
                  @enderror
                </div>
                <div class="form-group">
                  <label for="user">Email</label>
                  <input type="email" class="form-control" name="email" value="{{$user->email}}" id="user" placeholder="Email">
                  @error('email')
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



