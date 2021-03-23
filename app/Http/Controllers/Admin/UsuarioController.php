<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DB;
use \Spatie\Permission\Models\Role;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Collection;
class UsuarioController extends Controller
{

    public function index()
    {
        
        // $datas = User::all();//alexs dice que esta bien
        // listamos todos nuetros usuarios del sistema
        // $saludo ='hola luchin';
        // $datas = DB::table('users')->get();
        $datas=\App\User::with('roles')->get();
        // return $datas;
        return view('admin.usuarios.index',compact('datas'));
    }


    public function crear()
    {
        $roles = Role::all()->pluck('name','id');
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

        $rol = $request->input('rol');

        if($rol == 'Administrador'){
            return redirect()->route('create_users')->with('message', ['danger', 'Solo puede Existir un Administrador']);
        }else{
            $datas = $request->all();
            $user=User::create($datas);
            $user->imagen = $name;
            $user->save();
            $user->assignRole($rol);
        return redirect()->route('list_users')->with('message', ['success', 'Usuario Agregado Correctamente!']);
        }
        

    }

    public function editar($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all()->pluck('name','id');
        return view('admin.usuarios.editar',compact('user','roles'));
    }

    public function show($id)
    {
        $show_usuarios = User::find($id);
        // $role=$show_usuarios->Roles->pluck('name')->first();
        // dd($role);
        return view('admin.usuarios.show',['usuario' => $show_usuarios]);
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
            $request->merge(['imagen' => $name]);
            // $user->imagen = $name;
        }
        // $input = $request->all();
       
        // $user->save();
        $user->update(array_filter($request->input()));
        $user->syncRoles($request->input('rol'));
        return redirect()->route('list_users')->with('message', ['success', 'Usuario Modificado Correctamente!']);
        // dd($request->input('rol'));
        // if($request->input('rol') == 'Administrador'){
        //     return redirect()->route('edit_user', $id)->with('message', ['danger', 'Solo puede Existir un usuario con el Administrador!']);
        // }else{
        // }
    }

    // public function eliminar($id)
    // {
    //     //
    //     $user = User::findOrFail($id);
    //     $user->removeRole($user->roles->implode('name', ', '));//eliminadomos el rol
       
    //     if($user->delete()){
    //         return redirect()->route('list_users');
    //     }
    //     else{
    //         return response()->json([
    //             'mensaje'=> 'Error al Eliminar el Usuario'
    //         ]);
    //     }
    // }


    public function changeStatus(User $usuario)
    {
        $estado = true;

        if ($usuario->ESTADO_USUARIO) {
          $estado = false;
        }

        $usuario->ESTADO_USUARIO = $estado;
        $usuario->save();

        if ($estado) {
          return redirect()->route('list_users')->with('message', ['success', 'Usuario habilitado Correctamente!']);  
        }else{
          return redirect()->route('list_users')->with('message', ['success', 'Usuario Deshabilitado Correctamente!']);
        }
    }
}
