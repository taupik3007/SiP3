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
                            <label for="Select" class="form-label">Tingkatan Kelas</label>
                            <br>
                            <select id="Select" name="cls_level" class="form-select" value="{{$class->cls_level}}" id="class" placeholder="Tingkatan Kelas" >
                            <option name="cls_id" value="{{$class->cls_level_id}}" id="class">{{$class->cls_level }}</option>
                                <option value="X">X</option>
                                <option value="XI">XI</option>
                                <option value="XII">XII</option>
                            </select>
                            @error('cls_level')
                                <div id="cls_id" class="form-text">{{ $message }}</div>
                            @enderror

                        </div>

                        <form method="post" action="">
                        <div class="mb-3">
                            <label for="Select" class="form-label">Jurusan</label>
                            <br>
                            <select id="Select" name="mjr_id" class="form-select" value="{{$class->cls_major_id}}" id="class" placeholder="Jurusan">
                            <option name="mjr_id" value="{{$class->cls_major_id}}" id="class">{{$class->cls_major_id }}</option>
                            @foreach ($major as $major)
                              <option value="{{ $major->mjr_id }}">{{ $major->mjr_name }}</option>
                            @endforeach
                            </select>
                            @error('cls_level')
                                <div id="cls_id" class="form-text">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class="mb-3">
                            <label for="crp_name" class="form-label">Nomor Kelas</label>
                            <input type="number" class="form-control" id="cls_number" name="cls_number"
                                aria-describedby="cls_number" value="{{$class->cls_number}}" id="class" placeholder="Nomor Kelas" >
                            @error('cls_number')
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



