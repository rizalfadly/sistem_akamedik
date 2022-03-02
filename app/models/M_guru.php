<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class M_guru extends Model
{
    protected $table = 'm_guru';
    protected $primaryKey = 'guru_id';

    public function s_status()
    {
        return $this->belongsTo('App\models\M_status', 'status', 'status_id');
    }
}
