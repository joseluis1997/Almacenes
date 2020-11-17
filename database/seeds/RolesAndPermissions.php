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
        // Grupo : Usuarios
        $permission = Permission::create(['name' => 'accesso_usuarios']);
        $permission = Permission::create(['name' => 'crear_usuarios']);
        $permission = Permission::create(['name' => 'modificar_usuarios']);
        $permission = Permission::create(['name' => 'eliminar_usuarios']);
        $permission = Permission::create(['name' => 'Mostrar_usuarios']);

        // Grupo: Roles
        $permission = Permission::create(['name' => 'accesso_roles']);
        $permission = Permission::create(['name' => 'crear_roles']);
        $permission = Permission::create(['name' => 'modificar_roles']);
        $permission = Permission::create(['name' => 'eliminar_roles']);
        $permission = Permission::create(['name' => 'Mostrar_role']);
        
        // Grupo: Partidas
        $permission = Permission::create(['name' => 'accesso_partidas']);
        $permission = Permission::create(['name' => 'crear_partidas']);
        $permission = Permission::create(['name' => 'modificar_partidas']);
        $permission = Permission::create(['name' => 'eliminar_partidas']);
        $permission = Permission::create(['name' => 'Mostrar_partidas']);

        // Grupo: Unidad de Medida
        $permission = Permission::create(['name' => 'accesso_medidas']);
        $permission = Permission::create(['name' => 'crear_medidas']);
        $permission = Permission::create(['name' => 'modificar_medidas']);
        $permission = Permission::create(['name' => 'eliminar_medidas']);
        $permission = Permission::create(['name' => 'Mostrar_Unidad_de_Medida']);

        // Grupo: Articulos
        $permission = Permission::create(['name' => 'accesso_articulos']);
        $permission = Permission::create(['name' => 'crear_articulos']);
        $permission = Permission::create(['name' => 'modificar_articulos']);
        $permission = Permission::create(['name' => 'eliminar_articulos']);
        $permission = Permission::create(['name' => 'Mostrar_articulos']);

        // Grupo: Areas
        $permission = Permission::create(['name' => 'accesso_areas']);
        $permission = Permission::create(['name' => 'crear_areas']);
        $permission = Permission::create(['name' => 'modificar_areas']);
        $permission = Permission::create(['name' => 'eliminar_areas']);
        $permission = Permission::create(['name' => 'Mostrar_areas']);

        // Grupo: Proveedores
        $permission = Permission::create(['name' => 'accesso_proveedores']);
        $permission = Permission::create(['name' => 'crear_proveedores']);
        $permission = Permission::create(['name' => 'modificar_proveedores']);
        $permission = Permission::create(['name' => 'eliminar_proveedores']);
        $permission = Permission::create(['name' => 'Mostrar_Proveedores']);

        // Grupo: Cierre Gestion
        $permission = Permission::create(['name' => 'accesso_cierregestion']);
        $permission = Permission::create(['name' => 'crear_cierregestion']);
        $permission = Permission::create(['name' => 'modificar_cierregestion']);
        $permission = Permission::create(['name' => 'eliminar_cierregestion']);

        // Grupo: Stock Almacen
        $permission = Permission::create(['name' => 'accesso_almacen']);
        $permission = Permission::create(['name' => 'crear_almacen']);
        $permission = Permission::create(['name' => 'modificar_almacen']);
        $permission = Permission::create(['name'  => 'eliminar_almacen']);

        // Grupo: Consumo Directo
        $permission = Permission::create(['name' => 'accesso_consumodirecto']);
        $permission = Permission::create(['name' => 'crear_consumodirecto']);
        $permission = Permission::create(['name' => 'modificar_consumodirecto']);
        $permission = Permission::create(['name'  => 'eliminar_consumodirecto']);

        // Grupo: Pedidos
        $permission = Permission::create(['name' => 'accesso_pedidos']);
        $permission = Permission::create(['name' => 'crear_pedidos']);
        $permission = Permission::create(['name' => 'modificar_pedidos']);
        $permission = Permission::create(['name'  => 'eliminar_pedidos']);

        // Grupo: Salidas
        $permission = Permission::create(['name' => 'accesso_salidas']);
        $permission = Permission::create(['name' => 'crear_salidas']);
        $permission = Permission::create(['name' => 'modificar_salidas']);
        $permission = Permission::create(['name'  => 'eliminar_salidas']);

        // Grupo: Reportes
        $permission = Permission::create(['name' => 'accesso_reportes']);
        $permission = Permission::create(['name' => 'crear_reportes']);
        $permission = Permission::create(['name' => 'modificar_reportes']);
        $permission = Permission::create(['name'  => 'eliminar_reportes']);

        // Grupo: Reporte Inventario Actual
        $permission = Permission::create(['name' => 'accesso_reporteInventarioActual']);
        
        // Grupo: Reporte Inventario Manual
        $permission = Permission::create(['name' => 'accesso_reporteInventarioManual']);

        // Grupo: Kardex Almacen
        $permission = Permission::create(['name' => 'accesso_Kardex']);

        // Grupo: Reporte Detallado Stock Almacen
        $permission = Permission::create(['name' => 'accesso_ReporteDetalladoStockAlmacen']);

        // Grupo: Reporte Fisico Valorado Consumo Directo
        $permission = Permission::create(['name' => 'accesso_FisicoValoradoConsumoDirecto']);

        // Grupo: Reporte Inventario Detallado Almacen
        $permission = Permission::create(['name' => 'accesso_InventarioDetalladoAlmacen']);

        // Grupo: Reporte Consolidado Fisico Valorado Total
        $permission = Permission::create(['name' => 'accesso_ConsolidadoFisicoValoradoTotal']);
        
        // Grupo: Reporte Detallado Ingresos Consumo Directo
        $permission = Permission::create(['name' => 'accesso_ReporteDetalladoIngresosConsumoDirecto']);
        
        // Grupo: Reporte Fisico Valorado Stock Almacen
        $permission = Permission::create(['name' => 'accesso_FisicoValoradoStockAlmacen']);

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
