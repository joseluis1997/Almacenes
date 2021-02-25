<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table = 'ARTICULO';

    protected $primaryKey = 'COD_ARTICULO';

    protected $fillable = [
        'FK_COD_PARTIDA',
        'FK_COD_MEDIDA',
        // 'ITEM',
        'NOM_ARTICULO',
        'DESC_ARTICULO',
        'CANT_ACTUAL',
        // 'CANT_MINIMA',
        // 'UBICACION',
        // 'TIPO',
        'ESTADO_ARTICULO'
    ];

    public function Partida()
    {
        return $this->belongsTo(\App\Partida::class,'FK_COD_PARTIDA','COD_PARTIDA');
    }
    
    public function Medida()
    {
        return $this->belongsTo(\App\Medida::class,'FK_COD_MEDIDA','COD_MEDIDA');
    }  

    public function ConsumosDirectos(){

        return $this->belongsToMany(\App\consumo_directo::class,'DETALLE_CONSUMO_DIRECTO','COD_ARTICULO','COD_CONSUMO_DIRECTO');
    }

    public function ComprasStocks(){

        return $this->belongsToMany(\App\compra_stock::class,'DETALLE_COMPRA_STOCK','COD_ARTICULO','COD_COMPRA_STOCK')->withPivot('CANTIDAD', 'PRECIO_UNITARIO', 'ESTADO_DETALLE');
    }

    public function Pedidos(){

        return $this->belongsToMany(\App\pedido::class,'DETALLE_PEDIDO','COD_ARTICULO','COD_PEDIDO');
    }
}
