<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\M_mapel;
use Illuminate\Support\Facades\Session;

class C_mapel extends Controller
{
    public function index ()
    {
        $title = 'Dashboard Mata Pelajaran';
        $mapel = M_mapel::orderBy('nama_mapel', 'asc')->get();


        return view('mapel.index',compact('title', 'mapel'));
    }

    public function add(){

        $title = 'Tambah Mata Pelajaran';

        return view('mapel.add', compact('title'));

    }

    public function add_mapel(Request $request){
        $request->validate([
            'nama_mapel' => 'required'
        ]);

        $mapel['nama_mapel'] = $request->nama_mapel;
        $mapel['created_at'] = date('Y-m-d H:i:s');
        $mapel['updated_at'] = date('Y-m-d H:i:s');

        M_mapel::insert($mapel);
        Session::flash('sukses', 'Mata Pelajaran berhasil ditambahkan');

        return redirect()->route('mapel.add');
    }

    public function edit_mapel($id)
    {
        $title = 'Update mapel';
        $mp = M_mapel::find($id);


        return view('mapel.edit', compact('title', 'mp'));
    }


    public function mapel_update (Request $request, $id) {
        $request->validate([
            'nama_mapel' => 'required'
        ]);

        $mapel['nama_mapel'] = $request->nama_mapel;
        $mapel['updated_at'] = date('Y-m-d H:i:s');

        M_mapel::where('mapel_id', $id)->update($mapel);
        Session::flash('sukses', 'Mata Pelajaran Berhasil Diupdate');
        return redirect()->route('mapel.index');
    }

    public function delete_mapel($id){
        try {
            M_mapel::where('mapel_id',$id)->delete();
            Session::flash('sukses', 'data berhasil terhapus');
            
        } catch (Exception $e) {
            Session::flash('gagal', $e->getMessage());
        }

        return redirect()->back();
    }
}
