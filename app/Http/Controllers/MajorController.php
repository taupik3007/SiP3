<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Major;
use App\Models\Classes;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;


class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $major = Major::all();

        $title = 'Yakin Hapus Jurusan!';
        $text = "Kamu Yakin Untuk Menghapus Jurusan Ini?";
        confirmDelete($title, $text);
        
        // dd($major);
        return view('major.index',compact(['major']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('major.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'mjr_name' => 'required'
        ],[
            'required' => 'harus di isi'
        ]);

        $majorCheck = Major::where('mjr_name',$request->mjr_name)->first();
        // dd($majorCheck);
        if($majorCheck){
            Alert::error('Gagal Menambah', 'Jurusan Sudah Terdaftar');
            return redirect('/major');
        }
            $majroCreate = Major::create([
                'mjr_name' => $request->mjr_name,
                'mjr_created_by'=> Auth::user()->usr_id
            ]);
            Alert::success('Berhasil Menambah', 'Jurusan Berhasil Ditambah');
            return redirect('/major');


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
        $major = Major::findOrFail($id);
        // dd($major);
        return view('major.edit',compact(['major','id']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'mjr_name' => 'required'
        ],[
            'required' => 'harus di isi'
        ]);

        $majorCheck = Major::where('mjr_name',$request->mjr_name)->where('mjr_id','!=',$id)->first();
        // dd($majorCheck);
        if($majorCheck){
            Alert::error('Gagal Mengubah', 'Jurusan Sudah terdaftar');
            return redirect('/major');
        }
            $majroUpdate = Major::findOrFail($id)->update([
                'mjr_name' => $request->mjr_name,
                'mjr_updated_by'=> Auth::user()->usr_id
            ]);
            Alert::success('Berhasil Mengubah', 'Jurusan Berhasil Diubah');
            return redirect('/major');


    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $classCheck = Classes::where('cls_major_id',$id)->first();
        if($classCheck){
            Alert::error('Gagal Menghapus', 'Masih Ada Kelas Yang Terkait Ke Jurusan');
            return redirect('/major');
        }
        $majorUpdate = Major::findOrFail($id)->update([
           
            'mjr_deleted_by'=> Auth::user()->usr_id
        ]);
        $majorDelete= Major::findOrFail($id)->delete();
        Alert::success('Berhasil Menghapus', 'Jurusan Berhasil Dihapus');
        return redirect('/major');
    }
}
