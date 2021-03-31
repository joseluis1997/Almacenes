@extends("layouts.app")

@section('contenido')

    <div class="title">
        <h1 align="center"><b>Gestion Reportes</b></h1>
    </div>

    <div id="Reportes">
        @can('accesso_reporteInventarioActual')
            <a href="{{route ('list_reportesInventarioActual')}}" >
                <b>Reporte Inventario Actual</b>
            </a><br>
        @endcan
        @can('accesso_reporteInventarioActualDetallado')
            <a href="{{ route('list_InventarioDetalladoAlmacen') }}">
                <b>Reporte Detallado Inventario Actual</b>
            </a><br>
        @endcan
        @can('accesso_FisicoValoradoConsumoDirectos')
            <a href="{{ route('list_FisicoValoradoConsumoDirecto') }}">
                <b>Reporte Fisico Valorado Consumos Directos</b>
            </a><br>
        @endcan
        @can('acesso_ReporteDetalladoConsumoDirectos')
            <a href="{{ route('list_ReporteDetalladoIngresosConsumoDirecto') }}">
                <b>Reporte Detallado Consumos Directos</b>
            </a><br>
        @endcan
         @can('accesso_FisicoValoradoCompras')
            <a href="{{route('list_FisicoValoradoStockAlmacen')}}"><b>Reporte Fisico Valorado Compras</b>
            </a><br>
        @endcan
        @can('accesso_FisicoValoradoCompras')
            <a href="{{ route('list_ReporteDetalladoStockAlmacen') }}"><b>Reporte Detallado De Compras</b>
            </a><br>
        @endcan
        @can('accesso_Kardex')
            <a href="{{ route('list_kardexAlmacen') }}"><b>Kardex Articulos</b>
            </a><br>
        @endcan

        @can('accesso_ReporteAreas')
        <a href="{{ route('list_area_egresos_salidas') }}"><b>Reporte Por Areas</b></a><br>
        @endcan
        @can('accesso_ConsolidadoFisicoValoradoTotal')
            <a href="{{ route('list_ConsolidadoFisicoValoradoTotal') }}"><b>Reporte Consolidado Valorado Total</b>
            </a><br>
        @endcan
    </div>

@endsection
