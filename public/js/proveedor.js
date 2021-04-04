const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
	NIT: /^[0-9]{9,13}$/, 
	NOMBRE: /^([A-ZÄËÏÖÜÁÉÍÓÚÂÊÎÔÛÀÈÌÒÙ]{0,1}[a-zëïöüáéíóúáéíóúâêîôûàèìòù]{2,30}[ ]?){1,10}$/,
	TELEFONO:/^[+]*[(]?[0-9]{1,4}[)]?[0-9-\s\.]+$/, 
	DIRECCION: /^([a-zA-Z]{1,30}[ ]?([0-9]{0,5}[ ]?)){1,30}$/,
}

const campos ={
    NIT: false,
    NOMBRE: false,
    TELEFONO: false,
    // DIRECCION: false,
}

const validarFormulario = (e) =>{
    console.log(e.target.name);
   switch (e.target.name){
    case "NIT":
        validarCampo(expresiones.NIT,e.target,'nit');
    break;
    case "NOM_PROVEEDOR":
        validarCampo(expresiones.NOMBRE,e.target,'nombre');
    break;
    case "TELEF_PROVEEDOR":
        validarCampo(expresiones.TELEFONO,e.target,'telefono');
    break;
    case "DIR_PROVEEDOR":
        validarCampo(expresiones.DIRECCION,e.target,'direccion');
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
