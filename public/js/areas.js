const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
	nombre: /^([a-zA-ZÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙ]{1,20}[ ]?){1,10}$/,
	direccion:/^([a-zA-ZÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙ]{1,20}[ ]?){1,10}$/,
}

const campos ={
    nombre: false,
    direccion:false,
}

const validarFormulario = (e) =>{
    console.log(e.target.name);
   switch (e.target.name){
    case "NOM_AREA":
        validarCampo(expresiones.nombre,e.target,'nombre');
    break;
    case "UBICACION_AREA":
        validarCampo(expresiones.direccion,e.target,'ubicacion');
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
