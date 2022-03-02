<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\models\M_guru;
use Illuminate\Support\Facades\Session;
use \App\models\M_status;

class C_guru extends Controller
{
    public function index(){
        $title = 'Dashboard Guru';
        $guru = M_guru::orderBy('nama', 'asc')->get();

        return view('guru.index', compact('title', 'guru')); 

    }

    public function aktif() {
        $title = 'Guru Aktif';
        $guru = M_guru::where('status',1)->orderBy('nama','asc')->get();

        return view('guru.index', compact('title', 'guru'));
    }
    public function nonaktif() {
        $title = 'Guru Non Aktif';
        $guru = M_guru::where('status',2)->orderBy('nama','asc')->get();

        return view('guru.index', compact('title', 'guru'));
    }


    public function add(){
        $title = 'Tambah Data Guru';

        return view('guru.add', compact('title'));
    }

    public function add_guru(Request $request){
        $request->validate([
            'nama'              => 'required',
            'tempat_lahir'      => 'required',
            'tanggal_lahir'     => 'required',
            'no_hp'             => 'required',
            'email'             => 'required',
            'awal_kerja'        => 'required',
            'nip'               => 'required'
        ]);

        $guru = $request->except(['_token','_method', 'photo']);
        $guru['status'] = 1;
        $guru['created_at']     = date('Y-m-d H:i:s');
        $guru['updated_at']     = date('Y-m-d H:i:s');

        
        $file = $request->file('photo');
        if ($file) {
            $nama_file = rand().'-'.$file->getClientOriginalName();

            $file->move('photo_guru', $nama_file);
            $guru['photo'] = 'photo_guru/'.$nama_file;
        }
        M_guru::insert($guru);
        Session::flash('sukses', 'data Guru Berhasil ditambahkan');

        return redirect()->route('guru.add');
    }

    public function guru_status ($id) {
        $gr = M_guru::find($id);
        $status = $gr->status;

        if($status == 1){
            M_guru::where('guru_id',$id)->update([
                   'status' =>2, 
            ]);
        }
        else {
                M_guru::where('guru_id',$id)->update([
                     'status' =>1,   
                ]);
        }

        Session::flash('sukses', 'Status Guru Sudah Terupdate');

        return redirect()->back();
    }

    public function edit_guru($id) {

        $title = 'Update data Guru';
        $gr = M_guru::find($id);
        $status = M_status::get();

        return view('guru.edit', compact('title', 'gr', 'status'));

    }

    public function update_guru(Request $request, $id) {
         $request->validate([
            'nama'              => 'required',
            'tempat_lahir'      => 'required',
            'tanggal_lahir'     => 'required',
            'no_hp'             => 'required',
            'email'             => 'required',
            'awal_kerja'        => 'required',
            'nip'               => 'required'
        ]);

        $guru = $request->except(['_token','_method', 'photo']);
        // $guru['status'] = $request->status;
        $guru['updated_at']     = date('Y-m-d H:i:s');

        
        $file = $request->file('photo');
        if ($file) {
            $nama_file = rand().'-'.$file->getClientOriginalName();

            $file->move('photo_guru', $nama_file);
            $guru['photo'] = 'photo_guru/'.$nama_file;
        }
        M_guru::where('guru_id',$id)->update($guru); 
        Session::flash('sukses', 'Data Guru Berhasil Terupdate');
        return redirect()->route('guru.index');
    }

    public function delete($id){
        try {
            M_guru::where('guru_id', $id)->delete();
            Session::flash('sukses','data berhasil terhapus');
            
        } catch (Exception $e) {
            Session::flash('Gagal', $e->getMessage());
        }

        return redirect()->back();
    }
}
