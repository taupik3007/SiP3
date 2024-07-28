@extends('master.main')
@section('title')
    SiP3 | Siswa
@endsection
@section('sub-title')
    Daftar Siswa
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Siswa</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>kelas</th>
                        <th>Jumlah Poin</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($student as $no => $student)
                        <tr>
                            <td>{{ $no + 1 }}</td>
                            <td>{{ $student->std_name }}</td>
                            <td>{{ $student->cls_level." ".$student->mjr_name." ".$student->cls_number }}</td>

                            @if ($student->point == null)
                            <td>0</td>
                            @else 
                            <td>{{$student->point}}</td>
                            @endif
                            <td>
                                <a href="/student/{{$student->std_id}}/edit" class="btn btn-primary">Edit</a>
                                <a href="/student/{{$student->std_id}}/destroy" class="btn btn-danger" data-confirm-delete="true">Hapus</a>


                            </td>

                        </tr>
                    @endforeach

                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>kelas</th>
                        <th>Jumlah Poin</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
@push('link')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@push('script')
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": [{
                    text: 'Tambah Siswa',
                    action: function(e, dt, button, config) {
                        window.location = '/student/create';
                    }
                }]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush
