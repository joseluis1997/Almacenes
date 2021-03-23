const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');
// esto es un objeto con varias propiedas
const expresiones = {
    CI: /^[0-9]{7,8}[T|R|W|A|G|M|Y|F|P|D|X|B|N|J|Z||S|Q|V|H|L|C|K|E]?$/, // 1 a 7 numeros.
	NOMBRE: /^([A-Z]{1}[a-z]{2,30}[ ]?){1,2}$/,
    APELLIDO: /^([A-Z]{1}[a-z]{2,30}[ ]?){1,3}$/,
	TELEFONO: /^[+]*[(]?[0-9]{1,4}[)]?[0-9-\s\.]+$/, // 7 a 14 numeros.
	NOM_USUARIO: /^[a-zA-Z0-9\_\-]{4,20}$/, // Letras, numeros, guion y guion_bajo
    password: /^.{4,20}$/, // 4 a 12 digitos.
    // FOTO: /^.jpg|.jpeg|.png|$/
}

const campos ={
    ci: false,
    nombre: false,
    apellidos: false,
    telefono: false,
    usuario: false,
    // foto: false,
    password: false
}

const validarFormulario = (e) =>{
    // console.log(e.target.name);
   switch (e.target.name){
    case "CI":
        validarCampo(expresiones.CI, e.target, 'ci');
    break;

    case "NOMBRE":
        validarCampo(expresiones.NOMBRE,e.target,'nombre');
    break;

    case "APELLIDO":
        validarCampo(expresiones.APELLIDO,e.target,'apellidos');
    break;

    case "TELEFONO":
        validarCampo(expresiones.TELEFONO,e.target,'telefono');
    break;

    case "NOM_USUARIO":
        validarCampo(expresiones.NOM_USUARIO,e.target,'usuario');
    break;

    // case "imagen":
    //     validarCampo(expresiones.FOTO,e.target,'foto');
    // break;

    case "password":    
        validarCampo(expresiones.password,e.target,'password');
        validarPassword2();
    break;

    case "re_password":
			validarPassword2();
	break;
   }
}

const validarCampo = (expresion,input,campo) => {

    if(expresion.test(input.value)){
        // console.log(campos[campo]);
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

const validarPassword2 = () => {
    const inputpassword1 = document.getElementById('password');
    const inputpassword2 = document.getElementById('re_password');

    if(inputpassword1.value !== inputpassword2.value){
        document.getElementById(`grupo__password2`).classList.add('formulario__grupo-incorrecto');
        document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-correcto');
        document.querySelector(`#grupo__password2 i`).classList.add('fa-times-circle');
        document.querySelector(`#grupo__password2 i`).classList.remove('fa-check-circle');
        document.querySelector(`#grupo__password2 .formulario__input-error`).classList.add('formulario__input-error-activo');
        campos['password'] = false;
    }else{
        document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-incorrecto');
        document.getElementById(`grupo__password2`).classList.add('formulario__grupo-correcto');
        document.querySelector(`#grupo__password2 i`).classList.remove('fa-times-circle');
        document.querySelector(`#grupo__password2 i`).classList.add('fa-check-circle');
        document.querySelector(`#grupo__password2 .formulario__input-error`).classList.remove('formulario__input-error-activo');
        campos['password'] = true;
    }
}

inputs.forEach((input)=>{
    input.addEventListener('keyup',validarFormulario);
    input.addEventListener('blur',validarFormulario);
});

// formulario.addEventListener('submit', (e) => {
//     // e.preventDefault();
//     if (campos.CI && campos.NOM_USUARIO && campos.NOMBRE && campos.APELLIDO && campos.TELEFONO && campos.password){
//         console.log("dq");
//         window.location.har
//     }
//     else{
//         document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
//         setTimeout(() => {
//             document.getElementById('formulario__mensaje').classList.remove('formulario__mensaje-activo');

//         },110000);
//     }
// });
