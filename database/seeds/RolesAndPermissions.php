<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // permisos usuarios para el sistema
        $permission = Permission::create(['name' => 'accesso_usuarios']);
        $permission = Permission::create(['name' => 'crear_usuarios']);
        $permission = Permission::create(['name' => 'modificar_usuarios']);
        $permission = Permission::create(['name' => 'eliminar_usuarios']);

        // permisos para Roles
        $permission = Permission::create(['name' => 'accesso_roles']);
        $permission = Permission::create(['name' => 'crear_roles']);
        $permission = Permission::create(['name' => 'modificar_roles']);
        $permission = Permission::create(['name' => 'eliminar_roles']);
        
        // Permisos para partidas
        $permission = Permission::create(['name' => 'accesso_partidas']);
        $permission = Permission::create(['name' => 'crear_partidas']);
        $permission = Permission::create(['name' => 'modificar_partidas']);
        $permission = Permission::create(['name' => 'eliminar_partidas']);
        //  permisos para unidades de medidas

        $permission = Permission::create(['name' => 'accesso_medidas']);
        $permission = Permission::create(['name' => 'crear_medidas']);
        $permission = Permission::create(['name' => 'modificar_medidas']);
        $permission = Permission::create(['name' => 'eliminar_medidas']);

        // permisos para articulos

        $permission = Permission::create(['name' => 'accesso_articulos']);
        $permission = Permission::create(['name' => 'crear_articulos']);
        $permission = Permission::create(['name' => 'modificar_articulos']);
        $permission = Permission::create(['name' => 'eliminar_articulos']);


        
        //creando roles del sistema y asignando permisos
        $role = Role::create(['name' => 'editor']);
        $role->givePermissionTo('crear_usuarios');
        $role->givePermissionTo('modificar_usuarios');
        // $role->givePermissionTo('');

        $role = Role::create(['name' => 'moderador']);
        $role->givePermissionTo('accesso_usuarios');


        // el rol admin tendra acceso a todo
        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());



    }
}
