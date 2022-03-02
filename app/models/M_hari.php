<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class M_hari extends Model
{
    protected $table = 'm_hari';
    protected $primaryKey = 'hari_id'; 

    public function jadwals(){
        return $this->hasMany('App\models\M_jadwal', 'hari', 'hari_id');
    }
}
