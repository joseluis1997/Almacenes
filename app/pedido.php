<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pedido extends Model
{
    //

    protected $table = 'PEDIDOS';

    protected $primaryKey = 'COD_PEDIDO';

  	protected $fillable = [
    	'COD_AREA',
    	'DETALLE_PEDIDO',
    	'VALIDADO',
    	'FECHA',
    	'ESTADO_PEDIDO'
    ];

    public function Articulos(){

        return $this->belongsToMany(\App\Articulo::class,'DETALLE_PEDIDO','COD_PEDIDO','COD_ARTICULO')->withPivot('CANTIDAD', 'ESTADO_PEDIDO');
    }

    public function Area(){

        return $this->belongsTo(\App\Area::class,'COD_AREA','COD_AREA');
    }

    public function suprPedidos(){

        return $this->belongsToMany(\App\User::class,'SUPR_PEDIDO','COD_PEDIDO','COD_USUARIO');
    }

    public function salida(){
        return $this->hasOne(\App\salida::class,'COD_PEDIDO');
    }
}
