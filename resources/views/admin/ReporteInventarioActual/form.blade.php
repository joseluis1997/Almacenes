<!-- Grupo: fecha Inicio -->
            <div class="formulario__grupo" id="grupo__fechaInicio">
                <label for="fechaInicio" class="formulario__label">Fecha Inicio</label>
                <div class="formulario__grupo-input">
                    <input type="date" class="formulario__input" name="#" id="fechaInicio">
                    <i class="formulario__validacion-estado far fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">
                    El ci tiene que ser de 4 a 16 digitos y solo puede contener numeros, letras y guion bajo.
                </p>
            </div>
<!-- Grupo: fecha Final -->
            <div class="formulario__grupo" id="grupo__fechafinal">
                <label for="fechafinal" class="formulario__label">Fecha Inicio</label>
                <div class="formulario__grupo-input">
                    <input type="date" class="formulario__input" name="#" id="fechafinal">
                    <i class="formulario__validacion-estado far fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">
                    El ci tiene que ser de 4 a 16 digitos y solo puede contener numeros, letras y guion bajo.
                </p>
            </div>
<!-- Grupo: Guardar y Cancelar -->
            <div class="formulario__grupo formulario__btn-guardar text-center">
                <a href="{{route('ReporteInventarioActualPDF')}}" class="btn formulario__btn2">Cancelar</a>
                <button href type="submit" class="formulario__btn1">Imprimir</button>
            </div>