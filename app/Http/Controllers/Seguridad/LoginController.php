<?php

namespace App\Http\Controllers\Seguridad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LoginController extends Controller
{
    //
    use AuthenticatesUsers;
    protected $redirectTo = '/index';

    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    public function index()
    {
         // dd("asd");
    	return view('seguridad.index');
    }

    public function username()
    {

        return 'NOM_USUARIO';
    }
}
