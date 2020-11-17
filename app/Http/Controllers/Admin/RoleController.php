<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RolRequest;
use Spatie\Permission\Models\Role;
use DB;
class RoleController extends Controller
{
  
    
    public function index()
    {
      
       $role = Role::all();
        return view('admin.roles.index', [ 'roles' => $role]);
    
    }

  
    public function create()
    {
       $permissions = DB::table('permissions')->get();
       return view('admin.roles.create', [ 'permissions' => $permissions]);
    }

    public function store(RolRequest $request)
    {
        $input = $request->all();
        $role = new Role([
            'name' => $input['name'],
        ]);

        $role->save();
     
        $role->givePermissionTo($request->permissions);
    
        return redirect(route('list_roles'))->with('message', ['success', 'Rol Registrado Correctamente!']);
    }

    public function show($id)
    {
        $role = Role::find($id);
        return view('admin.roles.show',['role' => $role]);
    }


    public function edit(Role $role)
    {
        $permission_role = [];

        foreach ($role->permissions as $permission) {
            $permission_role[] = $permission->id;
        }

        // return $permission_role;
        $permissions = DB::table('permissions')->get();

        return view('admin.roles.edit', [ 'role' => $role, 'permissions' => $permissions,'permission_rol'=>$permission_role]);
    }

 
    public function update(RolRequest $request, Role $role)
    {
        $input = $Request->all();

        // dd($input);
        $role->update([
            'name' => $input['name'],
        ]);

        // dd($role);

        $role->syncPermissions($request->permissions);
        return redirect()->route('list_roles')->with(['message' => 'Role actualizado exitosamente!', 'alert-type' => 'success']);

    }

    // public function destroy($id)
    // {
    //     //eliminando rol

    //     $rol = Role::findOrFail($id);
        
    //     $rol->delete();

    //     return redirect()->route('list_roles');
    // }

    public function changeStatus(Role $rol)
    {
        $estado = true;

        if ($rol->estado) {
          $estado = false;
        }

        $rol->estado = $estado;
        $rol->save();

        if ($estado) {
          return redirect()->route('list_roles')->with('message', ['success', 'Rol habilitado Correctamente!']);  
        }else{
          return redirect()->route('list_roles')->with('message', ['success', 'Rol Desabilitado Correctamente!']);
        }
    }
}
