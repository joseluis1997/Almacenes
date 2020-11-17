const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');
// esto es un objeto con varias propiedas
const expresiones = {
    ci: /^\d{1,7}$/, // 1 a 7 numeros.
	name: /^[a-zA-ZÀ-ÿ\s]{1,40}$/,
    lastname: /^[a-zA-ZÀ-ÿ\s]{1,40}$/,
	telephone: /^\d{7,14}$/, // 7 a 14 numeros.
	username: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
    password: /^.{4,12}$/ // 4 a 12 digitos.
}

const campos ={
    ci: false,
    nombre: false,
    apellidos: false,
    telefono: false,
    usuario: false,
    password: false
}

const validarFormulario = (e) =>{
   switch (e.target.name){
    case "ci":
        validarCampo(expresiones.ci, e.target, 'ci');
    break;

    case "name":
        validarCampo(expresiones.name,e.target,'nombre');
    break;

    case "lastname":
        validarCampo(expresiones.lastname,e.target,'apellidos');
    break;

    case "telephone":
        validarCampo(expresiones.telephone,e.target,'telefono');
    break;

    case "username":
        validarCampo(expresiones.username,e.target,'usuario');
    break;
    case "password":    
        validarCampo(expresiones.password,e.target,'password');
        validarPassword2();
    break;
    case "password2":
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
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-actio');
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
    const inputpassword2 = document.getElementById('password2');

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

formulario.addEventListener('submit', (e) => {
    // e.preventDefault();
    if (campos.ci && campos.username && campos.name && campos.lastname && campos.telephone && campos.password){
    }
    else{
        document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
        setTimeout(() => {
            document.getElementById('formulario__mensaje').classList.remove('formulario__mensaje-activo');

        }, 5000);
    }
});
