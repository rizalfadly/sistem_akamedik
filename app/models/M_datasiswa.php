<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class M_datasiswa extends Model
{
    protected $table = 'm_datasiswa';

    public function s_status()
    {
        return $this->belongsTo('App\models\M_status', 'status', 'status_id');
    }
}
