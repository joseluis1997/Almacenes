<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class salida extends Model
{


    public function suprSalidas(){

        return $this->belongsToMany(\App\User::class,'SUPR_SALIDA','COD_SALIDA','COD_USUARIO');
        
    }
}
