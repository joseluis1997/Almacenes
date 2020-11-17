<div class="form-row">

    <div class="col-md-6 mb-3">
        <label>Nombre</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">N</span>
            </div>
            <input type="text" class="form-control" placeholder="Nombre Articulo" name="NOM_ARTICULO" value="" required>
        </div>
    </div>
    
    <div class="col-md-6 mb-3">
        <label>Partida Presupuestaria:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">P</span>
            </div>

             <select 
                class="js-example-basic-multiple form-control" name="partidas[]">
                @foreach ($partidas as $partida)
                    @if($partida->VALOR)

                    <option value="{{ $partida->NRO_PARTIDA }}">{{ $partida->NRO_PARTIDA }}|{{ $partida->NOM_PARTIDA }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>

</div>

<div class="form-row">

    <div class="col-md-6 mb-3">
        <label>Unidad de Medidad:</label>unidadMedidas
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">U</span>
            </div>
              <select class="form-control" name="COD_MEDIDA"  placeholder="Digite Unidad de Medida" > 
                @foreach ($unidadMedidas as $medida)
                <option value="{{ $medida->NOM_MEDIDA }}">{{ $medida->NOM_MEDIDA }}</option>
                @endforeach
               
            </select>
        </div>
    </div>

     <div class="col-md-6 mb-3">
        <label>Cantidad Minima:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">C</span>
            </div>
            <input type="number" min="1" step="any" pattern="^[0-9]+" class="form-control" placeholder="Digite cantidad minima" name="CANT_MINIMA" value="" required>
        </div>
    </div>
    
</div>

<div class="form-row">

    <div class="col-md-6 mb-3">
        <label>Ubicacion:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">U</span>
            </div>
            <input type="text" class="form-control" placeholder="Ubicacion" name="UBICACION" value="" required>
        </div>
    </div>

    <div class="form-group">
        <label>Descripcion:</label>
        <div class="input-group">
            <div class="input-group-prepend">
            <span class="input-group-text">D</span>
            </div>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="DESC_ARTICULO"  rows="1" cols="49">
            </textarea>
        </div>
    </div>
</div>