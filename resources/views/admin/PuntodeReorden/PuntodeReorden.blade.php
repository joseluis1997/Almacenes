<div id="punto">
    <ul>
    	@foreach(articulos() as $articulo)
			@if($articulo->CANT_ACTUAL>1 && $articulo->CANT_ACTUAL <= 10)
				@if($articulo->ESTADO_ARTICULO == 1)
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
						<strong>stock bajo, </strong>{{ $articulo->NOM_ARTICULO }} solo quedan {{ $articulo->CANT_ACTUAL }} {{ $articulo->Medida->NOM_MEDIDA}}.
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
				@endif
			@elseif($articulo->CANT_ACTUAL == 0 && $articulo->ESTADO_ARTICULO == 1)
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong>Agotado, </strong>{{ $articulo->NOM_ARTICULO }} disponible {{ $articulo->CANT_ACTUAL }} {{ $articulo->Medida->NOM_MEDIDA}}.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
			@endif
		@endforeach
    </ul>
</div>

