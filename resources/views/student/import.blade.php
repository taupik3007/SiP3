@extends('master.main')
@section('title')
    SiP3 | Siswa
@endsection
@section('sub-title')
    Import Siswa
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Import Data Siswa</h3>
        </div>

        <form method="POST" action="{{ route('students.import') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if (session('warning'))
                    <div class="alert alert-warning">
                        {{ session('warning') }}
                        <ul class="mb-0">
                            @foreach (session('failures') as $failure)
                                <li>Baris {{ $failure->row() }}: {{ implode(', ', $failure->errors()) }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="mb-3">
                    <label for="Select" class="form-label">Kelas</label>
                    <br>
                    <select id="Select" name="cls_id" class="form-control" required>
                        <option hidden value="">Pilih kelas</option>
                        @foreach ($classes as $class)
                            <option value="{{ $class->cls_id }}">
                                {{ $class->cls_level . ' ' . $class->cls_major->mjr_name . ' ' . $class->cls_number }}
                            </option>
                        @endforeach
                    </select>
                    @error('cls_id')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <a href="{{ route('students.import.template') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="fas fa-download"></i> Download Template
                    </a>
                </div>

                <div class="mb-3">
                    <label for="file" class="form-label">File Excel/CSV</label>
                    <input type="file" class="form-control" id="file" name="file" required>
                    <small class="text-muted">Kolom wajib di file: <code>std_name</code></small>
                    @error('file')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection