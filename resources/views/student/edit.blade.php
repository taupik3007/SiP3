@extends('master.main')
@section('title')
    SiP3 | Kelas
@endsection
@section('sub-title')
    Edit Kelas
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
                <label for="major">Nama Siswa</label>
                  <input type="text" class="form-control" name="std_name" value="{{$student->std_name}}" id="student" placeholder="Nama Siswa">
                  @error('student_name')
                  <p class="text-danger">{{$message}}</p>
                      
                  @enderror

                </div>

                <form method="post" action="">
                    <div class="mb-3">
                        <label for="Select" class="form-label">Kelas</label>
                        <br>
                        <select id="Select" name="cls_id" class="form-control" required 
                            id="classes" placeholder="Kelas">
                            <option  value="{{$student->std_classes_id}}" id="class">
                            {{ $student->cls_level." ".$student->mjr_name." ".$student->cls_number }}</option>
                            @foreach ($classes as $class)
                            <option value="{{ $class->cls_id }}">{{ $class->cls_level." ".$class->cls_major->mjr_name." ".$class->cls_number }}</option>
                            @endforeach
                        </select>
                        @error('cls_level')
                            <div id="cls_id" class="form-text">{{ $message }}</div>
                        @enderror

                    </div>
            </div>



            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
