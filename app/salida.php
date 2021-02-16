<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class salida extends Model
{

    protected $table = 'SALIDAS';

    protected $primaryKey = 'COD_SALIDA';

  	protected $fillable = [
    	'COD_PEDIDO',
    	'COD_AREA',
    	'FECHA',
    	'DETALLE_SALIDA',
    	'ESTADO_SALIDA'
    ];

    public function suprSalidas(){

        return $this->belongsToMany(\App\User::class,'SUPR_SALIDA','COD_SALIDA','COD_USUARIO');
        
    }

    public function pedido(){
        return $this->hasOne(\App\pedido::class,'COD_PEDIDO','COD_PEDIDO');
    }

    public function area(){
        return $this->hasOne(\App\Area::class,'AREA_PADRE','COD_AREA');
    }
}
