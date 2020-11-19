<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'AREA';

    protected $primaryKey = 'COD_AREA';

    protected $fillable = ['NUM_AREA','NOM_AREA','DESC_AREA','ESTADO_AREA'];
}
