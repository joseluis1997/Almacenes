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
        $permission = Permission::create(['name' => 'Listar_usuarios']);
        $permission = Permission::create(['name' => 'Crear_usuarios']);
        $permission = Permission::create(['name' => 'Modificar_usuarios']);
        $permission = Permission::create(['name' => 'Deshabilitar_usuarios']);
        $permission = Permission::create(['name' => 'Habilitar_usuarios']);
        $permission = Permission::create(['name' => 'Ver_usuarios']);

        // Grupo: Roles

        $permission = Permission::create(['name' => 'Listar_roles']);
        $permission = Permission::create(['name' => 'Crear_roles']);
        $permission = Permission::create(['name' => 'Modificar_roles']);
        $permission = Permission::create(['name' => 'Deshabilitar_roles']);
        $permission = Permission::create(['name' => 'Habilitar_roles']);
        $permission = Permission::create(['name' => 'Ver_roles']);
        
        // Grupo: Partidas

        $permission = Permission::create(['name' => 'Listar_partidas']);
        $permission = Permission::create(['name' => 'Crear_partidas']);
        $permission = Permission::create(['name' => 'Modificar_partidas']);
        $permission = Permission::create(['name' => 'Deshabilitar_partidas']);
        $permission = Permission::create(['name' => 'Habilitar_partidas']);
        $permission = Permission::create(['name' => 'Ver_partidas']);

        // Grupo: Unidad de Medida

        $permission = Permission::create(['name' => 'Listar_Unidades_de_Medidas']);
        $permission = Permission::create(['name' => 'Crear_Unidades_de_Medidas']);
        $permission = Permission::create(['name' => 'Modificar_Unidades_de_Medidas']);
        $permission = Permission::create(['name' => 'Deshabilitar_Unidades_de_Medidas']);
        $permission = Permission::create(['name' => 'Habilitar_Unidades_de_Medidas']);
        $permission = Permission::create(['name' => 'Ver_Unidades_de_Medidas']);

        // Grupo: Articulos

        $permission = Permission::create(['name' => 'Listar_articulos']);
        $permission = Permission::create(['name' => 'Crear_articulos']);
        $permission = Permission::create(['name' => 'Modificar_articulos']);
        $permission = Permission::create(['name' => 'Deshabilitar_articulos']);
        $permission = Permission::create(['name' => 'Habilitar_articulos']);
        $permission = Permission::create(['name' => 'Ver_articulos']);

        // Grupo: Areas

        $permission = Permission::create(['name' => 'Listar_areas']);
        $permission = Permission::create(['name' => 'Crear_areas']);
        $permission = Permission::create(['name' => 'Modificar_areas']);
        $permission = Permission::create(['name' => 'Deshabilitar_areas']);
        $permission = Permission::create(['name' => 'Habilitar_areas']);
        $permission = Permission::create(['name' => 'Ver_areas']);

        // Grupo: Proveedores

        $permission = Permission::create(['name' => 'Listar_proveedores']);
        $permission = Permission::create(['name' => 'Crear_proveedores']);
        $permission = Permission::create(['name' => 'Modificar_proveedores']);
        $permission = Permission::create(['name' => 'Deshabilitar_proveedores']);
        $permission = Permission::create(['name' => 'Habilitar_proveedores']);
        $permission = Permission::create(['name' => 'Ver_Proveedores']);

        // Grupo: Stock Almacen

        $permission = Permission::create(['name' => 'Listar_compras']);
        $permission = Permission::create(['name' => 'Crear_compras']);
        $permission = Permission::create(['name' => 'Modificar_compras']);
        $permission = Permission::create(['name' => 'Deshabilitar_compras']);
        $permission = Permission::create(['name' => 'Habilitar_compras']);
        $permission = Permission::create(['name' => 'Verdetalle_compras']);


        // Grupo: Consumo Directo

        $permission = Permission::create(['name' => 'Listar_consumos_directos']);
        $permission = Permission::create(['name' => 'Crear_consumos_directos']);
        $permission = Permission::create(['name' => 'Modificar_consumos_directos']);
        $permission = Permission::create(['name' => 'Deshabilitar_consumos_directos']);
        $permission = Permission::create(['name' => 'Habilitar_consumos_directos']);
        $permission = Permission::create(['name' => 'VerDetalles_consumos_directos']);

        // Grupo: Pedidos

        $permission = Permission::create(['name' => 'Listar_pedidos']);
        $permission = Permission::create(['name' => 'Crear_pedidos']);
        $permission = Permission::create(['name' => 'Modificar_pedidos']);
        $permission = Permission::create(['name' => 'Deshabilitar_pedidos']);
        $permission = Permission::create(['name' => 'Habilitar_pedidos']);
        $permission = Permission::create(['name' => 'VerDetalle_pedidos']);

        // Grupo: Salidas

        $permission = Permission::create(['name' => 'Listar_salidas']);
        $permission = Permission::create(['name' => 'Crear_salidas']);
        $permission = Permission::create(['name' => 'Modificar_salidas']);
        $permission = Permission::create(['name' => 'Deshabilitar_salidas']);
        $permission = Permission::create(['name' => 'Habilitar_salidas']);
        $permission = Permission::create(['name' => 'Validar_Salida_Pedido']);
        $permission = Permission::create(['name' => 'VerDetalle_salidas']);
        $permission = Permission::create(['name' => 'VerDetalle_pedidos_Pendientes']);

        // Grupo: Reportes

        $permission = Permission::create(['name' => 'accesso_reportes']);
        $permission = Permission::create(['name' => 'accesso_reporteInventarioActual']);
        $permission = Permission::create(['name' => 'accesso_reporteInventarioActualDetallado']);
        $permission = Permission::create(['name' => 'accesso_FisicoValoradoConsumoDirecto']);
        $permission = Permission::create(['name' => 'ccesso_ReporteDetalladoIngresosConsumoDirecto']);
        $permission = Permission::create(['name' => 'accesso_FisicoValoradoStockAlmacen']);
        $permission = Permission::create(['name' => 'accesso_ReporteDetalladoStockAlmacen']);
        $permission = Permission::create(['name' => 'accesso_InventarioDetalladoCompras']);
        $permission = Permission::create(['name' => 'accesso_ConsolidadoFisicoValoradoTotal']);
        $permission = Permission::create(['name' => 'accesso_Kardex']);

        $role = Role::create(['name' => 'Administrador']);
        $role->givePermissionTo(Permission::all());
        $role = Role::create(['name' => 'Tecnico']);
        $role = Role::create(['name' => 'Visitante']);
    }
}
