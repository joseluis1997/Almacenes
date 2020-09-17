<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DB;
use \Spatie\Permission\Models\Role;
use App\Http\Requests\UserRequest;
class UsuarioController extends Controller
{
    // controlando el acceso a mis controladores segun el rol que tenga el usuario
    // public function __construct()
    // {
    //      $this->middleware(['role:alex']);
    // }

    public function index()
    {
        // $datas = User::all();//alexs dice que esta bien
        // listamos todos nuetros usuarios del sistema
        // $saludo ='hola luchin';
        // $datas = DB::table('users')->get();
        $datas=\App\User::with('roles')->get();
        return view('admin.usuarios.index',compact('datas'));
    }


    public function crear()
    {
        //obtenemos los roles
        $roles = Role::all()->pluck('name','id');
        // dd($roles);
        $user=new User();
        return view('admin.usuarios.crear',compact('roles','user'));
    }

    public function guardar(UserRequest $request)
    {

        $password=bcrypt($request->input('password'));// RECUPERATORIA DD ELA VARIABLE PASSWORD Y ENCRITANDO
        $request->merge(['password' => $password]);

        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/users/',$name);
        }

        $datas = $request->all();
        $user=User::create($datas);
        $user->imagen = $name;
        $user->save();
        $user->assignRole($request->input('rol'));
        
        return redirect(route('list_users'));

    }

    

    public function editar($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all()->pluck('name','id');
        // dd($datas,$roles);
        return view('admin.usuarios.editar',compact('user','roles'));

    }

    public function actualizar(UserRequest $request, $id)
    {       
        
        $user = User::findorfail($id);

        if($request->password!=null){
            // $user->password = $request->password;
            $password=bcrypt($request->input('password'));// RECUPERATORIA DD ELA VARIABLE PASSWORD Y ENCRITANDO
            $request->merge(['password' => $password]); 
        }

        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/users/',$name);
        }
        
        $input = $request->all();
        $user->update($input);
        $user->imagen = $name;
        $user->save();
        $user->syncRoles($request->input('rol'));

        return redirect()->route('list_users')->with('status', 'Profile updated!');
    }

    public function eliminar($id)
    {
        //
        $user = User::findOrFail($id);
        $user->removeRole($user->roles->implode('name', ', '));//eliminadomos el rol
       
        if($user->delete()){
            return redirect()->route('list_users');
        }
        else{
            return response()->json([
                'mensaje'=> 'Error al Eliminar el Usuario'
            ]);
        }
    }
}
