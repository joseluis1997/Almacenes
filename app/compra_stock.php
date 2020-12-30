<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class compra_stock extends Model
{
    //
    protected $table = 'COMPRA_STOCKS';

    protected $primaryKey = 'COD_COMPRA_STOCK';

    protected $fillable = [
    	'COD_AREA',
    	'NRO_ORD_COMPRA',
    	'NRO_PREVENTIVO',
    	'FACTURA',
    	'FECHA',
    	'DETALLE_COMPRA_STOCK',
    	'ESTADO_COMPRA'
    ];

    public function Articulos(){

        return $this->belongsToMany(\App\Articulo::class,'DETALLE_COMPRA_STOCK','COD_COMPRA_STOCK','COD_ARTICULO')->withPivot('CANTIDAD', 'PRECIO_UNITARIO', 'ESTADO_DETALLE');
    }

    public function Area()
    {
        return $this->belongsTo(\App\Area::class,'COD_AREA','COD_AREA');
    }  
}
