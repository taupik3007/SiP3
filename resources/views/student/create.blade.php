@extends('master.main')
@section('title')
    SiP3 | Siswa
@endsection
@section('sub-title')
    Tambah Siswa
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


                <form method="post" action="">
                    @csrf

                    <div class="mb-3">
                        <label for="crp_name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="std_name" name="std_name"
                            aria-describedby="std_name" placeholder="Nama Siswa" required>
                        @error('std_name')
                            <div id="std_name" class="form-text">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <label for="Select" class="form-label">Kelas</label>
                        <br>
                        <select id="Select" name="cls_id" class="form-control" required>
                            <option hidden value="">Pilih kelas</option>
                            @foreach ($classes as $class)
                                <option value="{{ $class->cls_id }}">{{ $class->cls_level." ".$class->cls_major->mjr_name." ".$class->cls_number }}</option>
                            @endforeach
                        </select>
                        @error('cls_level')
                            <div id="cls_id" class="form-text">{{ $message }}</div>
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
