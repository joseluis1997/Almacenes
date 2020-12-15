<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'ESTRUCTURA_G';

    protected $primaryKey = 'COD_ESTRUCTURA_G';

    protected $fillable = ['NOM_ESTRUCTURA_G','DESC_ESTRUCTURA_G','UBICACION','ESTADO_ESTRUCTURA_G'];
}
