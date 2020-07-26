<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partida extends Model
{
     protected $table = "PARTIDA";

     protected $primaryKey = 'COD_PARTIDA';

     protected $fillable = ['NOM_PARTIDA','PADRE','NRO_PARTIDA','VALOR'];

    public function Articulos()
    {
        return $this->hasMany(\App\Articulo::class);
    }
}
