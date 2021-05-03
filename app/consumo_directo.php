<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;

class consumo_directo extends Model implements Auditable
{
    use AuditingAuditable;
    
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

    public function user(){
        return $this->belongsTo(\App\User::class,'COD_USUARIO');
    }

    public function proveedor(){
        return $this->belongsTo(\App\proveedor::class,'COD_PROVEEDOR','COD_PROVEEDOR');
    }
}
