<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partida extends Model
{
    protected $table = "PARTIDA";

    protected $primaryKey = 'COD_PARTIDA';

    protected $fillable = ['NOM_PARTIDA','NRO_PARTIDA','DESCRIPCION','ESTADO_PARTIDA','PARTIDA_PADRE'];
	public $timestamps = false;

	public function Articulos()
    {
        return $this->hasMany(\App\Articulo::class,'FK_COD_PARTIDA','COD_PARTIDA');
    }

    public function PartidaPadre() {

    	return $this->belongsTo(\App\Partida::class, 'PARTIDA_PADRE', 'COD_PARTIDA');
 	}
}
