<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$user = Auth::user();//resivimos el usuario que esta logueado

        $roles = $user->roles->implode('name', ' ,'); //obtenemos los usuarios con roles
        // dd($roles);
        
        if($roles!=null){
            return view('admin.admin.index');
        }
        else{
            dd("no tienes permiso de Administrador");
        }
        // switch ($roles) {
           
        //     // dd($roles);
        // 	case 'super-admin':
        // 		$saludo = 'Bienvenido Administrador';
        // 		return view('admin.admin.index', compact('saludo'));
        // 		break;
        // 	case 'moderador':
        // 		$saludo = 'Bienvenido Moderador';
        // 		return view('admin.admin.index', compact('saludo'));
        // 		break;
        // 	case 'editor':
        // 		$saludo = 'Bienvenido Editor';
        // 		return view('admin.admin.index', compact('saludo'));
        // 		break;
        //     case 'lucho':
        //         $saludo = 'Bienvenido lucho';
        //         return view('admin.admin.index', compact('saludo'));
        //         break;
        // 	default:
        // 		# code...
        // 		break;
        // }
    }
    
}
