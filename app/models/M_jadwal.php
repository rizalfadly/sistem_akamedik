<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class M_jadwal extends Model
{
    protected $table = 'm_jadwalpelajaran';
    // protected $primaryKey = 'jadwal_id';

    public function kelas_r(){
        return $this->belongsTo('App\models\M_kelas', 'kelas', 'kelas_id');
    }

    public function mapel_r(){
        return $this->belongsTo('App\models\M_mapel', 'mapel', 'mapel_id');
    }
}
