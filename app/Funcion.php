<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcion extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User', 'permisos');
    }
}
