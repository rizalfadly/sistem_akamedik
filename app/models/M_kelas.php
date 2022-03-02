<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class M_kelas extends Model
{
    protected $table = 'm_kelas';
    protected $primaryKey = 'kelas_id';

    public function siswas_r() {
        return $this->hasMany('App\Models\M_kelas_siswa','kelas', 'kelas_id');
    }
}
