<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Violation;
use App\Models\ViolationRecording;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class ViolationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $violation = Violation::all();

        $title = 'Yakin Hapus Pelanggaran!';
        $text = "Kamu yakin untuk menghapus pelanggaran ini?";
        confirmDelete($title, $text);
        
        // dd($major);
        return view('violation.index',compact(['violation']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('violation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'vlt_name' => 'required',
            'vlt_point' => 'required'
        ],[
            'required' => 'harus di isi'
        ]);

        $violationCheck = Violation::where('vlt_name',$request->vlt_name)->first();
        // dd($majorCheck);
        if($violationCheck){
            Alert::error('Gagal Menambah', 'Pelanggaran Sudah terdaftar');
            return redirect('/violation');
        }
            $violationCreate = Violation::create([
                'vlt_name' => $request->vlt_name,
                'vlt_point' => $request->vlt_point,
                'vlt_created_by'=> Auth::user()->usr_id
            ]);
            Alert::success('berhasil Menambah', 'Pelanggaran Berhasi Ditambah');
            return redirect('/violation');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $violation = Violation::findOrFail($id);
        return view('violation.edit',compact(['violation','id']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'vlt_name' => 'required',
            'vlt_point' => 'required'

        ],[
            'required' => 'harus di isi'
        ]);

        $violationCheck = Violation::where('vlt_name',$request->vlt_name)->where('vlt_id','!=',$id)->first();
        // dd($majorCheck);
        if($violationCheck){
            Alert::error('Gagal Mengubah', 'Pelanggaran Sudah terdaftar');
            return redirect('/violation');
        }
            $violationUpdate = Violation::findOrFail($id)->update([
                'vlt_name' => $request->vlt_name,
                'vlt_point' => $request->vlt_point,
                'vlt_updated_by'=> Auth::user()->usr_id
            ]);
            Alert::success('berhasil Mengubah', 'Pelanggaran Berhasil Diubah');
            return redirect('/violation');


    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $violationRecordingCheck = ViolationRecording::where('vlr_violation_id',$id)->first();
        if($violationRecordingCheck){
            Alert::error('Gagal Menghapus', 'Masih ada PPelaporan yang terkait Ke Pelanggaran');
            return redirect('/major');
        }
        $violationUpdate = Violation::findOrFail($id)->update([
           
            'vlt_deleted_by'=> Auth::user()->usr_id
        ]);
        $violationDelete= Violation::findOrFail($id)->delete();
        Alert::success('berhasil Menghapus', 'Pelanggran Berhasil Dihapus');
        return redirect('/violation');
    }
}
