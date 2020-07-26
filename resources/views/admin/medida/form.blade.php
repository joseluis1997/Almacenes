

    <div class="form-group">
        <label>Nombre</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">N</span>
            </div>
            <input type="text" class="form-control" placeholder="Nombre" name="NOM_MEDIDA" value="{{old('NOM_MEDIDA')}}">
        </div>
    </div>
    
    <div class="form-group">
        <label>Descripcion</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">D</span>
            </div>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="DESC_MEDIDA"  rows="3">
                {{{old('DESC_MEDIDA')}}}
            </textarea>
        </div>
    </div>




