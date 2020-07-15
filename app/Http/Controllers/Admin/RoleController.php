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
        //
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
        // dd( $role);
        //foreach ($request->permissions as $key => $permission) {
        $role->givePermissionTo($request->permissions);
        //}

        return redirect(route('list_roles'))->with([ 'message' => 'Role creado exitosamente!', 'alert-type' => 'success' ]);
    }

    public function show($id)
    {
        //
    }

    public function edit(Role $role)
    {
        //
        $permissions = DB::table('permissions')->get();
        // dd($permissions,$role);
        return view('admin.roles.edit', [ 'role' => $role, 'permissions' => $permissions ]);
    }

 
    public function update(RolRequest $request, Role $role)
    {
        $input = $request->all();

        // dd($input);
        $role->update([
            'name' => $input['name'],
        ]);

        // dd($role);

        $role->syncPermissions($request->permissions);
        return redirect()->route('list_roles')->with(['message' => 'Role actualizado exitosamente!', 'alert-type' => 'success']);

    }

    public function destroy($id)
    {
        //eliminando rol

        $rol = Role::findOrFail($id);
        
        $rol->delete();
        dd($rol);
    }
}
