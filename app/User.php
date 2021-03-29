<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;


    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $fillable = [
        'CI',
        'NOMBRES',
        'APELLIDOS',
        'TELEFONO',
        'NOM_USUARIO', 
        'password',
        'imagen',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function sesions()
    {
        return $this->hasMany(\App\Sesion::class);
    }

    public function funciones()
    {
        return $this->belongsToMany('App\Funcion', 'permisos');
    }

    public function compras(){

        return $this->hasMany(\App\compra_stock::class,'COD_USUARIO','id');
    }

    public function consumo_directos(){

        return $this->hasMany(\App\consumo_directo::class,'COD_USUARIO','id');
    }

    public function pedidos(){

        return $this->hasMany(\App\pedido::class,'COD_USUARIO','id');
    }

    public function salidas(){

        return $this->hasMany(\App\salida::class,'COD_USUARIO','id');
    }




    // funcion que me permite actulizar el password y la encripta
    // public function setPasswordAttribute($value)
    // {
    //     if (!empty($value)) {
    //         $this->attributes['password'] = bcrypt($value);
    //     }
    // }


}
