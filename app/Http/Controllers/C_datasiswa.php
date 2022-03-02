<?php

namespace App\Http\Controllers;

use App\models\M_datasiswa;
use App\models\M_status;
//use Illuminate\Http\Client\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class C_datasiswa extends Controller
{
    public function siswa()
    {
        $title = 'Data siswa';
        $data = M_datasiswa::orderBy('nama', 'asc')->get();

        return view('siswa.index', compact('title', 'data'));
    }

    public function aktif() {
        $title = 'Siswa Aktif';
        $data = M_datasiswa::where('status',1)->orderBy('nama','asc')->get();

        return view('siswa.index', compact('title', 'data'));
    }
    

    public function nonaktif(){
        $title = 'Siswa Non Aktif';
        $data = M_datasiswa::where('status',2)->orderBy('nama','asc')->get();

        return view('siswa.index', compact('title', 'data'));
    }

    public function add()
    {
        $title = 'Tambah data Siswa';

        return view('siswa.add', compact('title'));
    }

    public function datasiswa(Request $request)
    {
        $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'alamat' => 'required'
        ]);

        $data = $request->except(['_token','_method', 'photo']);
        $data['status'] = 1;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        $file = $request->file('photo');
        if ($file) {
            $name_file = rand().'-'.$file->getClientOriginalName();

            $file->move('uploads', $name_file);
            $data['photo'] = 'uploads/'.$name_file;
        }

        M_datasiswa::insert($data);
        Session::flash('sukses', 'data siswa berhasil ditambahkan');

        return redirect('/siswa/add');
    }

    public function update_status($id)
    {
        $dt = M_datasiswa::find($id);
        $status = $dt->status;

        if ($status == 1) {
            M_datasiswa::where('id', $id)->update([
                'status' => 2,
            ]);
        } else {
            M_datasiswa::where('id', $id)->update([
                'status' => 1,
            ]);
        }

        Session::flash('sukses', 'status siswa berhasil dirubah');

        return redirect()->back();
    }

    public function edit_siswa($id)
    {
        $title = 'Update data Siswa';
        $dt = M_datasiswa::find($id);
        $status = M_status::get();

        return view('siswa.edit', compact('title', 'dt', 'status'));
    }

    public function update_siswa(Request $request, $id)
    {
        $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'alamat' => 'required',
        ]);

        $data = $request->except(['_token','_method', 'photo']);
        //$data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        $file = $request->file('photo');
        if ($file) {
            $name_file = rand().'-'.$file->getClientOriginalName();

            $file->move('uploads', $name_file);
            $data['photo'] = 'uploads/'.$name_file;
        }

        M_datasiswa::where ('id', $id)->update($data);
        Session::flash('sukses', 'data siswa berhasil dirubah');

        return redirect('siswa/'.$id);
    }

    public function delete($id){
        try {
            M_datasiswa::where('id',$id)->delete();

            Session::flash('sukses', 'data berhasil dihapus');
        } catch (Exception $e) {
            Session::flash('gagal'. $e->getMessage());
        }
        
        return redirect()->back();
    }
}
