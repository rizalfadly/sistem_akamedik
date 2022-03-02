<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\M_mapel;
use App\models\M_hari;
use App\models\M_kelas;
use App\models\M_jadwal;
use Illuminate\Support\Facades\Session;

class C_jadwalpelajaran extends Controller
{
    public function index () {

        $title = 'Jadwal Pelajaran';
        $hari = M_hari::get();


        return view ('jadwal.index', compact('title', 'hari'));

    }
    
    public function add_jadwal()
    {
        $title = 'Atur jadwal Pelajaran';
        $mapel = M_mapel::get();
        $hari = M_hari::get();
        $kelas = M_kelas::get();


        return view ('jadwal.add', compact('title','mapel','hari','kelas'));
    }

    public function store_jadwal (Request $request) {
        $request->validate([
            'hari' => 'required',
            'kelas' => 'required',
            'mapel' => 'required',
            'jam_dari' => 'required',
            'jam_sampai' => 'required'
        ]);

        $jadwal['hari'] = $request->hari;
        $jadwal['kelas'] = $request->kelas;
        $jadwal['mapel'] = $request->mapel;
        $jadwal['jam_dari'] = date('Y-m-d H:i', strtotime($request->jam_dari));
        $jadwal['jam_sampai'] = date('Y-m-d H:i', strtotime($request->jam_sampai));
        $jadwal['created_at']     = date('Y-m-d H:i:s');
        $jadwal['updated_at']     = date('Y-m-d H:i:s');

        M_jadwal::insert($jadwal);
        Session::flash('sukses', 'data berhasil ditambah');

        return redirect()->back();
    }
}
