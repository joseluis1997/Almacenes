<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_compra_stock extends Model
{
    protected $table = 'DETALLE_COMPRA_STOCK';

    protected $primaryKey = 'COD_DETALLE_COMPRA_STOCK';

    protected $fillable = ['COD_COMPRA_STOCK','COD_ARTICULO','PRECIO_UNITARIO','CANTIDAD','ESTADO_DETALLE'];
    
}
