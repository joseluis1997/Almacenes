<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table = 'ARTICULO';

    protected $primaryKey = 'COD_ARTICULO';

    protected $fillable = ['COD_PARTIDA','COD_MEDIDA','ITEM','NOM_ARTICULO','DESC_ARTICULO','CANT_ACTUAL','CANT_MINIMA','UBICACION','TIPO','ESTADO_ARTICULO'];

    public function Partida()
    {
        return $this->belongsTo(\App\Partida::class);
    }

    public function Medida()
    {
        return $this->belongsTo(\App\Medida::class);
    }  
}
