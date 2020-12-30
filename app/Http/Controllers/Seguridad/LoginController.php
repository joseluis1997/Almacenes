<?php

namespace App\Http\Controllers\Seguridad;
use Illuminate\Support\Facades\Auth;

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

    protected function authenticated(Request $request, $user)
    {
        // dd($user);
        if ($user->ESTADO_USUARIO == 0 ) {
            Auth::logout();
            abort(403, 'Cuenta suspendida por el administrador.');
        }
    }

    public function username()
    {

        return 'NOM_USUARIO';
    }
}
