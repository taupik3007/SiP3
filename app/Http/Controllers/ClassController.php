<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Major;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {    
        $class = Classes::all();
        $major = Major::all();
        $title = 'Yakin Hapus Kelas!';
        $text = "Kamu yakin untuk menghapus kelas ini?";
        confirmDelete($title, $text);
        return view('class.index',compact(['class', 'major']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $major = Major::all();
        return view('class.create', compact('major'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $class = Classes::create([
            'cls_level'     => $request->cls_level,
            'cls_major_id'  => $request->mjr_id,
            'cls_number'    => $request->cls_number
        ]);

            Alert::success('berhasil Menambah', 'Jurusan Berhasi Ditambah');
            return redirect('/class');


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
        
        $class = Classes::findOrFail($id);
        $major = Major::all();
        return view('class.edit',compact(['class','id', 'major']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $major = Major::all();
        $request->validate([
            'cls_number' => 'required'
        ],[
            'required' => 'harus di isi'
        ]);

            $classUpdate = Classes::findOrFail($id)->update([
                'cls_level'     => $request->cls_level,
                'cls_major_id'  => $request->mjr_id,
                'cls_number'    => $request->cls_number,
                'cls_updated_by'=> Auth::user()->usr_id
            ]);
            Alert::success('berhasil Mengubah', 'Kelas Berhasil Diubah');
            return redirect('/class');


    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $classDelete= Classes::findOrFail($id)->delete();
        Alert::success('berhasil Menghapus', 'Kelas Berhasil Dihapus');
        return redirect('/class');
    }
}
