<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sesion extends Model
{
    //
    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
}
