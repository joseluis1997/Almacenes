<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class salida extends Model
{

    protected $table = 'SALIDAS';

    protected $primaryKey = 'COD_SALIDA';

  	protected $fillable = [
        'COD_SALIDA',
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
        return $this->hasOne(\App\Area::class,'COD_AREA','COD_AREA');
    }

    // MOSTRAR
    public function Articulos(){

        return $this->belongsToMany(\App\Articulo::class,'DETALLE_SALIDA','COD_SALIDA','COD_ARTICULO')->withPivot('CANTIDAD');
    }

    public function user(){
        return $this->belongsTo(\App\User::class,'COD_USUARIO');
    }
}
