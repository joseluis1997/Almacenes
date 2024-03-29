const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
    numeroP: /^[0-9]{4,6}$/,
	nombreP: /^([a-zA-Z]{1}[,]?|[ ]?){2,}$/g,
}

const campos ={
    numeroP: false,
    nombreP: false,
}

const validarFormulario = (e) =>{
    console.log(e.target.name);
   switch (e.target.name){
    case "NRO_PARTIDA":
        validarCampo(expresiones.numeroP,e.target,'numeroP');
    break;
    case "NOM_PARTIDA":
        validarCampo(expresiones.nombreP,e.target,'nombreP');
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
