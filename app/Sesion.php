<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sesion extends Model
{
    //

	// protected $table = 'sesions';
 //    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
}
