    <div class="form-group">
        <label>Nombre</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">N</span>
            </div>
            <input type="text" class="form-control" placeholder="Ingrese Nombre de la Nueva Partida" name="NOM_PARTIDA" value="{{old('NOM_PARTIDA')}}">
        </div>
    </div>
    
    <div class="form-group">
        <label>Numero Partida</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">N</span>
            </div>
            <input type="text" class="form-control" placeholder="Ingrese Numero de la Partida" name="NRO_PARTIDA" value="{{old('NRO_PARTIDA')}}">
        </div>
    </div>

    <div class="formulario__grupo formulario__btn-guardar text-center">
        <a href="{{route('list_partidas')}}" class="btn formulario__btn2">Cancelar</a>
        <button type="submit" class="formulario__btn1">Guardar</button>
    </div>
