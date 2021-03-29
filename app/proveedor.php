<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proveedor extends Model
{
    protected $table = 'PROVEEDORES';

    protected $primaryKey = 'COD_PROVEEDOR';

    protected $fillable = ['NIT','NOM_PROVEEDOR','DIR_PROVEEDOR','TELEF_PROVEEDOR','ESTADO_PROVEEDOR'];


    public function ConsumosDirectos(){

    	return $this->hasMany(\App\consumo_directo::class,'COD_PROVEEDOR','COD_CONSUMO_DIRECTO');
    }

    public function Compras(){

    	return $this->hasMany(\App\compra_stock::class,'COD_PROVEEDOR','COD_CONSUMO_DIRECTO');
    }
}
