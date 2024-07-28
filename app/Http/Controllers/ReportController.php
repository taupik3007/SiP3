<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Violation;
use App\Models\ViolationRecording;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;




class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = Student::all();
        $violation = Violation::all();

        return view('report',compact(['student','violation']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $reportViolation = ViolationRecording::create([
            'vlr_student_id' => $request->std_id,
            'vlr_violation_id' => $request->vlt_id,
            'vlr_created_by' => Auth::user()->usr_id,
        ]);
        Alert::success('berhasil Mencatat', 'pelanggaran berhasil Dicatat');
            return redirect('/report');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
