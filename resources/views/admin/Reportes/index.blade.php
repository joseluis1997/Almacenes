@extends("layouts.app")

@section('contenido')

    <div class="title">
        <h1 align="center"><b>Gestion Reportes</b></h1>
    </div>

    <div id="Reportes">
        <a href="{{route ('list_reportesInventarioActual')}}" >
            <b>Reporte Inventario Actual</b>
        </a><br><br>
        <a href="{{ route('list_InventarioDetalladoAlmacen') }}">
            <b>Inventario Detallado de Almacen</b>
        </a><br><br>
        <a href="{{ route('list_FisicoValoradoConsumoDirecto') }}">
            <b>Reporte Fisico Valorado (Consumo Directo)</b>
        </a>
    </div>

@endsection

{{-- @extends('layouts.app')
@section('contenido')
	<div class="containerre">
        <div class="col-md-7" >
            <h3 class="card-title" >Gestion Reportes</h3> 
        </div>
        <div class="box1">
            <div class="icon1">
                <i class="fas fa-print"></i>
                <a href="{{route ('list_reportesInventarioActual')}}" class="textito">Reporte Inventario Actual</a>
            </div>
        </div>

        <div class="box3">
            <div class="icon3">
                <i class="fas fa-print"></i>
                <a href="{{ route('list_kardexAlmacen') }}" class="textito"><b>Kardex de <br/>Almacen</b></a>
            </div>
        </div>
        <div class="box4">
            <div class="icon4">
                <i class="fas fa-print"></i>
                <a href="{{ route('list_ReporteDetalladoStockAlmacen') }}" class="textito"><b>Reporte Detallado <br>Por stock de Almacen</b></a>
            </div>
        </div>
        <div class="box5">
            <div class="icon5">
                <i class="fas fa-print"></i>
                <a href="{{ route('list_FisicoValoradoConsumoDirecto') }}" class="textito"><b>Reporte Fisico Valorado (Consumo Directo)</b></a>
            </div>
        </div>
        <div class="box6">
            <div class="icon6">
                <i class="fas fa-print"></i>
                <a href="{{ route('list_InventarioDetalladoAlmacen') }}" class="textito"><b>Inventario Detallado de Almacen</b></a>
            </div>
        </div>
        <div class="box7">
            <div class="icon7">
                <i class="fas fa-print"></i>
                <a href="{{ route('list_ConsolidadoFisicoValoradoTotal') }}" class="textito"><b>Consolidado Fisico Valorado Total</b></a>
            </div>
        </div>
        <div class="box8">
            <div class="icon8">
                <i class="fas fa-print"></i>
                <a href="{{ route('list_ReporteDetalladoIngresosConsumoDirecto') }}" class="textito"><b>Reporte Detallado de Ingresos Por Consumo Directo</b></a>
            </div>
        </div>
        <div class="box9">
            <div class="icon9">
                <i class="fas fa-print"></i>
                <a href="{{ route('list_FisicoValoradoStockAlmacen') }}" class="textito"><b>Resumen Fisico Valorado(Stock Almacen)</b></a>
            </div>
        </div>
    </div>
@endsection
 --}}