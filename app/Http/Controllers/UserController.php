<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();

        $title = 'Yakin Hapus User!';
        $text = "Kamu Yakin Untuk Menghapus User Ini?";
        confirmDelete($title, $text);
        
        // dd($major);
        return view('user.index',compact(['user']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ],[
            'required' => 'harus di isi'
        ]);

        $userCheck = User::where('name',$request->name)->first();
        // dd($majorCheck);
        if($userCheck){
            Alert::error('Gagal Menambah', 'User Sudah Terdaftar');
            return redirect('/user');
        }
            $userCreate = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'usr_created_by'=> Auth::user()->usr_id
            ]);
            Alert::success('Berhasil Menambah', 'User Berhasil Ditambah');
            return redirect('/user');
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
        $user = User::findOrFail($id);
        // dd($major);
        return view('user.edit',compact(['user','id']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::all();
        $userCheck = User::where('name',$request->name)->where('usr_id','!=',$id)->first();
        if($userCheck){
            Alert::error('Gagal Mengubah', 'kelas Sudah Terdaftar');
            return redirect('/user');
        }
            // $request->validate([
            //     'cls_number' => 'required'
            // ],[
            //     'required' => 'harus di isi'
            // ]);

            $userUpdate = User::findOrFail($id)->update([
                'name'     => $request->name,
                'email'  => $request->email,
                //'usr_updated_by'=> Auth::user()->usr_id
            ]);
            Alert::success('Berhasil Mengubah', 'User Berhasil Diubah');
            return redirect('/user');
    }
    public function destroy(string $id)
    {
        $userDelete= User::findOrFail($id)->delete();
        Alert::success('Berhasil Menghapus', 'User Berhasil Dihapus');
        return redirect('/user');
    }


}
