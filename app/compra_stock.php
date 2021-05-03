<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;

class compra_stock extends Model implements Auditable
{
    //
    use AuditingAuditable;
    protected $table = 'COMPRA_STOCKS';

    protected $primaryKey = 'COD_COMPRA_STOCK';

    protected $fillable = [
    	'COD_AREA',
    	'NRO_ORD_COMPRA',
    	'NRO_PREVENTIVO',
    	'COMPROBANTE',
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

    public function user(){
        return $this->belongsTo(\App\User::class,'COD_USUARIO');
    }

    public function proveedor(){
        return $this->belongsTo(\App\proveedor::class,'COD_PROVEEDOR','COD_PROVEEDOR');
    }
}
