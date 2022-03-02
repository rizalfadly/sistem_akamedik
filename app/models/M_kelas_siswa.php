<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class M_kelas_siswa extends Model
{
    protected $table = 'kelas_siswa';

    public function siswas_r(){
        return $this->belongsTo('App\models\M_datasiswa','siswa', 'id');
    }
}
