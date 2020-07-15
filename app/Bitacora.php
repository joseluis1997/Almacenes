<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
	// relacion con tabla usuario
    public function user()
    {
        return $this->belongsTo(\App\user::class);
    }
}
