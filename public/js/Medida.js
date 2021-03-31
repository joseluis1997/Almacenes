const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
	nombre: /^([A-ZÄËÏÖÜÁÉÍÓÚÂÊÎÔÛÀÈÌÒÙ]{0,2}[a-zëïöüáéíóúáéíóúâêîôûàèìòù]{3,30}[ ]?){1}$/,
}

const campos ={
    nombre: false,
}

const validarFormulario = (e) =>{
    console.log(e.target.name);
   switch (e.target.name){
    case "NOM_MEDIDA":
        validarCampo(expresiones.nombre,e.target,'nombre');
    break;
   }
}

const validarCampo = (expresion,input,campo) => {
    if(expresion.test(input.value)){
        console.log(campos[campo]);
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
        document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
        campos[campo] = true;
    }else{
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
        document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
        campos[campo] = false;  
    }
}


inputs.forEach((input)=>{
    input.addEventListener('keyup',validarFormulario);
    input.addEventListener('blur',validarFormulario);
});


// formulario.addEventListener('submit', (e) => {
//     // e.preventDefault();
//     if (campos.nombre){
//        document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
       
//        setTimeout(()=>{
//        document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');

//        }, 5000);
//     }
// });
