<?php

    require_once "{{ asset('/Almacenes/app/Http/controllers/Admin/MedidaController.php')}}";
    require_once "/Almacenes/app/Medida.php";

    class ajaxUsuaios{
 /*=======| VERIFICA CORREO REPETIDO |=======*/
        public $correoUsuario;
        public function ajaxVerificaCorreo(){
            $item = "ESTADO_MEDIDA";
            $valor = $this -> correoUsuario;
            $respuesta = MedidaController::index2($item, $valor);
            echo json_encode($respuesta);
        }
  }



/*Objeto de verificar correo*/
    if( isset($_POST["estado"]) ) {
        $correoVerificar = new ajaxUsuaios();        
        $correoVerificar -> correoUsuario = $_POST["estado"];
        $correoVerificar -> ajaxVerificaCorreo();
    }