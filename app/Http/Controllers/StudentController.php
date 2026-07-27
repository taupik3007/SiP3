<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Classes;
use App\Models\Violation;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use App\Imports\StudentsImport;
use App\Exports\StudentsTemplateExport;

use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student =  Student::selectRaw('students.std_name,students.std_id,classes.*,majors.*, sum(violations.vlt_point) as point')
            ->join('classes', 'students.std_classes_id', '=', 'classes.cls_id')
            ->join('majors', 'cls_major_id', '=', 'majors.mjr_id')
            ->leftjoin('violation_records', 'students.std_id', '=', 'violation_records.vlr_student_id')
            ->leftjoin('violations', 'violation_records.vlr_violation_id', '=', 'violations.vlt_id')
            ->groupBy('students.std_id')
            // ->sum('')
            ->get();
        // dd($student);

        $title = 'Yakin Hapus Siswa!';
        $text = "Kamu Yakin Untuk Menghapus Siswa Ini?";
        confirmDelete($title, $text);

        // dd($major);
        return view('student.index', compact(['student']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = Classes::all();
        // dd($classes);
        return view('student.create', compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $majroCreate = Student::create([
            'std_name' => $request->std_name,
            'std_classes_id' => $request->cls_id,
            'std_created_by' => Auth::user()->usr_id
        ]);
        Alert::success('Berhasil Menambah', 'Siswa Berhasil Ditambah');
        return redirect('/student');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::selectRaw('students.std_name,students.std_id,classes.*,majors.*, sum(violations.vlt_point) as point')
            ->join('classes', 'students.std_classes_id', '=', 'classes.cls_id')
            ->join('majors', 'cls_major_id', '=', 'majors.mjr_id')
            ->leftjoin('violation_records', 'students.std_id', '=', 'violation_records.vlr_student_id')
            ->leftjoin('violations', 'violation_records.vlr_violation_id', '=', 'violations.vlt_id')
            ->groupBy('students.std_id')->where('std_id', $id)
            // ->sum('')
            ->first();
        $violation = Violation::join('violation_records', 'violation_records.vlr_violation_id', '=', 'violations.vlt_id')
            ->join('students', 'students.std_id', '=', 'violation_records.vlr_student_id')->where('std_id', $id)
            ->select('vlt_name', 'vlr_created_at', 'vlt_point')
            ->orderBy('vlr_created_at', 'desc')
            ->get();
        // $violation  = Violation::all();
        // dd($violation);
        return view('student.detail', compact(['student', 'id', 'violation']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::join('classes', 'students.std_classes_id', '=', 'classes.cls_id')
            ->join('majors', 'cls_major_id', '=', 'majors.mjr_id')->where('std_id', $id)->first();

        // dd($student);
        $classes = Classes::where('cls_id', '!=', $student->std_classes_id)->get();
        // dd($classes);
        return view('student.edit', compact(['student', 'id', 'classes']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'std_name' => 'required',
            'cls_id' => 'required'

        ], [
            'required' => 'harus di isi'
        ]);

        $studentUpdate = Student::findOrFail($id);
        $studentUpdate->std_name = $request->std_name;
        $studentUpdate->std_classes_id = $request->cls_id;
        $studentUpdate->std_updated_by = Auth::user()->usr_id;
        $studentUpdate->save();
        Alert::success('Berhasil Mengubah', 'Siswa Berhasil Diubah');
        return redirect('/student');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $studentDelete = Student::findOrFail($id);
        $studentDelete->delete();
        Alert::success('Berhasil Menghapus', 'Siswa Berhasil Dihapus');
        return redirect('/student');
    }

    public function importForm()
    {
        $classes = Classes::with('cls_major')->get();
        return view('student.import', compact('classes'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'cls_id' => 'required|exists:classes,cls_id',
            'file'   => 'required|mimes:xlsx,csv,xls|max:2048',
        ]);

        $import = new StudentsImport($request->cls_id);
        Excel::import($import, $request->file('file'));

        if ($import->failures()->isNotEmpty()) {
            return back()
                ->with('warning', 'Sebagian data gagal diimport.')
                ->with('failures', $import->failures());
        }

        return back()->with('success', 'Data siswa berhasil diimport.');
    }
    public function downloadTemplate()
{
    return Excel::download(new StudentsTemplateExport(), 'template_import_siswa.xlsx');
}
}
