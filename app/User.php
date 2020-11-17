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
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'CI','NOMBRE','APELLIDO','TELEFONO','NOM_USUARIO', 'password','ESTADO_USUARIO','imagen',
    ];

    // protected $fillable = [
    //     'ci','name','lastname','telephone','username', 'password','imagen','ESTADO_USUARIO',
    // ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // public function getAuthPassword()
    // {
    //     return $this->CONTRASENA;
    // }


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // ralacion con tabla bitacoras
    public function Bitacoras()
    {
        return $this->hasMany(\App\Bitacora::class);
    }


    public function sesions()
    {
        return $this->hasMany(\App\Sesion::class);
    }

    public function funciones()
    {
        return $this->belongsToMany('App\Funcion', 'permisos');
    }

    // funcion que me permite actulizar el password y la encripta
    // public function setPasswordAttribute($value)
    // {
    //     if (!empty($value)) {
    //         $this->attributes['password'] = bcrypt($value);
    //     }
    // }


}
