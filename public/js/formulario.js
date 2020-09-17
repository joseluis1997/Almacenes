const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');
// esto es un objeto con varias propiedas
const expresiones = {
	username: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
	name: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	password: /^.{4,12}$/, // 4 a 12 digitos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telefono: /^\d{7,14}$/ // 7 a 14 numeros.
}

const campos ={
    username: false,
    password: false,
    password2: false,
    name: false

}
const validarFormulario = (e) =>{
   switch (e.target.name){
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
    case "name":
        validarCampo(expresiones.name,e.target,'nombre');
    break;
   }
}

const validarCampo = (expresion,input,campo) => {
    if(expresion.test(input.value)){
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

formulario.addEventListener('submit',(e) => {
    e.preventDefault();

    if (campos.username && campos.name){
        
    }else{
        document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
    }
});


// 
// const validarFormulario =(e) =>{
//     switch (e.target.name){
//         case "usuario":
//              if(expresiones.usuario.test(e.target.value)){
//                  document.getElementById('grupo__usuario').classList.remove('formulario__grupo-incorrecto');
//                  document.getElementById('grupo__usuario').classList.add('formulario__grupo-correcto');
//                  document.querySelector('#grupo__usuario i').classList.add('fa-check-circle');
//                  document.querySelector('#grupo__usuario i').classList.remove('fa-times-circle');
//                  document.querySelector('#grupo__usuario .formulario__input-error').classList.remove('formulario__input-error-activo');
//              }else{
//                  document.getElementById('grupo__usuario').classList.add('formulario__grupo-incorrecto');
//                  document.getElementById('grupo__usuario').classList.remove('formulario__grupo-correcto');
//                  document.querySelector('#grupo__usuario i').classList.add('fa-times-circle');
//                  document.querySelector('#grupo__usuario i').classList.remove('fa-check-circle');
//                  document.querySelector('#grupo__usuario .formulario__input-error').classList.add('formulario__input-error-activo');
                 
//              }
//         break;
//     }
//  }