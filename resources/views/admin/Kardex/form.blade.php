 <!-- Grupo: Articulo -->
            <div class="formulario__grupo" id="grupo__partidaPresupuestaria">
                <label for="Partida" class="formulario__label">Seleccione Articulo</label>
                <div class="formulario__grupo-input">
                    <select name="articulo" class="form-control" required>
                        <option value="0">Seleccione un Articulo</option>

                    </select>
                  <i class="formulario__validacion-estado far fa-times-circle"></i>
                </div>
            </div>

<!-- Grupo: Imprimir y Cancelar -->
            <div class="formulario__grupo formulario__btn-guardar text-center">
                <a href="{{route('list_reportes')}}" class="btn formulario__btn2">Cancelar</a>
                <button type="submit" class="formulario__btn1">Imprimir</button>
            </div>
