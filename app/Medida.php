<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medida extends Model
{
    protected $table = 'MEDIDA';

    protected $primaryKey = 'COD_MEDIDA';

    protected $fillable = ['NOM_MEDIDA','DESC_MEDIDA','ESTADO_MEDIDA'];
    // protected $guarded = ['NOM_MEDIDA','DESC_MEDIDA','ESTADO_MEDIDA'];
    public $timestamps = false;
    
    protected $hidden =[
        'created_at','updated_at'
    ];

    public function Articulos()
    {
        return $this->hasMany(\App\Articulo::class);
    }
}
