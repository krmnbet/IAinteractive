<?php

    /*
        Clase que proporciona los métodos de verificación de seguridad
    */

    //Cargar la clase padre para este controlador
    require_once('controllers/common.php');
    //Cargar el modelo para este controlador
    require_once("models/seguridad.php");
    //Cargar los archivos necesarios
    global $modelo_login;
    require_once("models/". $modelo_login .".php");

    class Seguridad extends Common
    {

        //Definir los filtros sobre los parámetros que ingresen a la petición, en caso de no necesitar parámetros, dejar un array vació
        public static   $LOGIN = array(
                            "usuario" => array("nulo" => false, "vacio" => false, "tipo" => "string"),
                            "contrasena" => array("nulo" => false, "vacio" => false, "tipo" => "string")
                        );
        public static   $LOGOUT = array();

        function __construct(){
            //Llamar al constructor del padre para verificar datos de seguridad
            parent::__construct();
        }

        function __destruct(){
            //Llamar al destructor del padre para terminar las conexión
            parent::__destruct();
        }

        public function login()
        {
            global $modelo_login_clase;
            $login = SeguridadModel::login($_REQUEST['usuario'], $_REQUEST['contrasena']);
            if($login instanceof $modelo_login_clase){
                session_start();
                $_SESSION['usuario'] = $login;
                $login = array("status" => true);
            }
            parent::responder($login);
        }

        public function logout()
        {
            parent::responder(SeguridadModel::logout());
        }

    }

?>
