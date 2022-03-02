<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\models\M_kelas;
use Illuminate\Support\Facades\Session;
use \App\models\M_kelas_siswa;
use \App\models\M_datasiswa;

class C_kelas extends Controller
{
    public function index () {
        $title = 'Mata Pelajaran';
        $kelas = M_kelas::get();


        return view ('kelas.index', compact('title','kelas'));
    }

    public function detail_kelas($id)
    {
        $title = 'Detail kelas';
        $kl = M_kelas::find($id);
        $total_siswa = M_kelas_siswa::where('kelas', $id)->count();
        $siswa = M_datasiswa::orderBy('nama','asc')->where('status',1)->get();

        return view('kelas.detail', compact('title','kl','siswa', 'total_siswa'));
    }

    public function detail_add(Request $request, $id_kelas)
    {
        try {
            $id_siswa = $request->siswa;

            $kelass['kelas'] = $id_kelas;
            $kelass['siswa'] = $id_siswa;
            $kelass['created_at'] = date('Y-m-d H:i:s');
            $kelass['updated_at'] = date('Y-m-d H:i:s');

            M_kelas_siswa::where('kelas',$id_kelas)->where('siswa',$id_siswa)->delete();
            M_kelas_siswa::insert($kelass);
            Session::flash('sukses', 'Siswa Berhasil dimasukan');
        }
         catch (Exception $e) {
            Session::flash('Gagal', $e->getMessage());
        }

        return redirect()->back();
        
    }

    public function add () {
        $title = 'Tambah Mata Pelajaran';

        return view ('kelas.add', compact('title'));
    }

    public function create_kelas (Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required'
        ]);

        $kelas['nama_kelas'] = $request->nama_kelas;
        $kelas['created_at'] = date('Y-m-d H:i:s');
        $kelas['updated_at'] = date('Y-m-d H:i:s');


        M_kelas::insert($kelas);
        Session::flash('sukses', 'kelas Berhasil ditambahkan');

        return redirect()->route('kelas.add');
    }

       public function edit_kelas($id)
    {
        $title = 'Update Kelas';
        $kl = M_kelas::find($id);


        return view('kelas.edit', compact('title', 'kl'));
    }

    public function update_kelas (Request $request, $id)
    {
        $request->validate([
            'nama_kelas' => 'required'
        ]);

        $kelas['nama_kelas'] = $request->nama_kelas;
        $kelas['updated_at'] = date('Y-m-d H:i:s');


        M_kelas::where('kelas_id', $id)->update($kelas);
        Session::flash('sukses', 'kelas Berhasil ditambahkan');
        return redirect()->route('kelas.index');
    }

    public function delete_kelas ($id)
    {
        try {
            M_kelas::where('kelas_id', $id)->delete();
            Session::flash('sukses','data berhasil terhapus');
            
        } catch (Exception $e) {
            Session::flash('Gagal', $e->getMessage());
            
        }

        return redirect()->back();
    }

    public function delete_dtkelas ($id_kelas, $id_siswa){
        try {

            M_kelas_siswa::where('kelas',$id_kelas)->where('siswa',$id_siswa)->delete();
            Session::flash('sukses','data berhasil terhapus');
        } catch (\Exception $e) {
            Session::flash('gagal', $e->getMessage());
            
        }
        return redirect()->back();
    }
}
