<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'AREAS';

    protected $primaryKey = 'COD_AREA';

    protected $fillable = [
    	'AREA_PADRE','NOM_AREA',
    	'DESC_AREA',
    	'UBICACION_AREA',
    	'ESTADO_AREA'
    ];

    public function Compras()
    {
        return $this->hasMany(\App\compra_stock::class,'COD_AREA','COD_AREA');
    }
    
    public function AreaPadre() {

    	return $this->belongsTo(\App\Area::class, 'AREA_PADRE', 'COD_AREA');
 	}
}
