<?php
function articulos()
{
	$articulos = App\Articulo::all();
    return $articulos;
}
