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
                        <select id="Select" name="cls_id" class="form-control" required value="{{ $student->std_classes_id }}"
                            id="classes" placeholder="Kelas">
                            <option  value="{{ $student->std_classes_id }}" id="class">
                            {{ $classes->cls_level." ".$classes->cls_major->mjr_name." ".$classes->cls_number }}</option>
                            @foreach ($classes as $class)
                            <option value="{{ $classes->cls_id }}">{{ $classes->cls_level." ".$classes->cls_major->mjr_name." ".$classes->cls_number }}</option>
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
