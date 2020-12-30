<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pedido extends Model
{
    //

    protected $table = 'PEDIDOS';

    protected $primaryKey = 'COD_PEDIDO';

    public function Articulos(){

        return $this->belongsToMany(\App\Articulo::class,'DETALLE_PEDIDO','COD_PEDIDO','COD_ARTICULO');
    }

    public function suprPedidos(){

        return $this->belongsToMany(\App\User::class,'SUPR_PEDIDO','COD_PEDIDO','COD_USUARIO');
    }
}
