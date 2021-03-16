<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class consumo_directo extends Model
{
	protected $table = 'CONSUMO_DIRECTOS';
	protected $primaryKey = 'COD_CONSUMO_DIRECTO';

    protected $fillable = [
        'COD_AREA',
        'NRO_ORD_COMPRA',
        'NRO_PREVENTIVO',
        'NOTA_INGRESO',
        'FECHA',
        'COMPROBANTE',
        'DETALLE_CONSUMO',
    ];

    public function Articulos(){

        return $this->belongsToMany(\App\Articulo::class,'DETALLE_CONSUMO_DIRECTO','COD_CONSUMO_DIRECTO','COD_ARTICULO')->withPivot('PRECIO_UNITARIO','CANTIDAD');
    }

    public function proveedores(){

    	return $this->belongsToMany(\App\proveedor::class,'CONSUMO_PROVEEDOR','COD_CONSUMO_DIRECTO','COD_PROVEEDOR');
    }

    public function Area(){
    	return $this->belongsTo(\App\Area::class,'COD_AREA','COD_AREA');
    }
}
