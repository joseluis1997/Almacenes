const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
	numero_compra:/^[0-9]{3,6}$/,
	numero_preventivo:/^[0-9]{3,6}$/,
    numero_odCompra:/^[0-9]{3,6}$/,
}

// const campos ={
//     numero_compra: false,
//     numero_preventivo:false,
//     numero_odCompra:false,
// }

const validarFormulario = (e) =>{
    console.log(e.target.name);
   switch (e.target.name){
    case "NRO_ORD_COMPRA":
        validarCampo(expresiones.numero_compra,e.target,'numeroOrdenCompra');
    break;
    case "NRO_PREVENTIVO":
        validarCampo(expresiones.numero_preventivo,e.target,'preventivo');
    break;
    case "NOTA_INGRESO":
        validarCampo(expresiones.numero_odCompra,e.target,'notaIngreso');
    break;
   }
}

const validarCampo = (expresion,input,campo) => {
    if(expresion.test(input.value)){
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
        document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
        // console.log(campos[campo]);
        // campos[campo] = true;
    }else{
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
        document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
        // campos[campo] = false;  
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
