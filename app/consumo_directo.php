<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class consumo_directo extends Model
{
	protected $table = 'CONSUMO_DIRECTOS';
	protected $primaryKey = 'COD_CONSUMO_DIRECTO';

    public function Articulos(){

        return $this->belongsToMany(\App\Articulo::class,'DETALLE_CONSUMO_DIRECTO','COD_CONSUMO_DIRECTO','COD_ARTICULO');
    }

    public function proveedores(){

    	return $this->belongsToMany(\App\proveedor::class,'CONSUMO_PROVEEDOR','COD_CONSUMO_DIRECTO','COD_PROVEEDOR');
    }
}
