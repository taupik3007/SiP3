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
            <table>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{$student->std_name }}</td>
                    
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>:</td>
                    <td>
                        
                        {{ $student->cls_level." ".$student->mjr_name." ".$student->cls_number }}
                    </td>
                </tr>
                <tr>
                    <td>Jumlah Point</td>
                    <td>:</td>
                    <td>
                    {{ $student->point }}
                    </td>
                </tr>
            </table>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pelanggaran</th>
                        <th>poin</th>
                        <th>tanggal melanggar</th>
                        

                    </tr>
                </thead>
                <tbody>
                    @foreach ($violation as $no => $violation)
                        <tr>
                            <td>{{ $no + 1 }}</td>
                            <td>{{ $violation->vlt_name }}</td>
                            <td>{{ $violation->vlt_point }}</td>
                            <td>{{ $violation->vlr_created_at }}</td>   

                        </tr>
                    @endforeach

                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Pelanggaran</th>
                        <th>poin</th>
                        <th>tanggal melanggar</th>
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
