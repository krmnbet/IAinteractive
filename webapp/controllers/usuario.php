<?php

    //Cargar la clase padre para este controlador
    require_once('common.php');
    //Cargar el modelo para este controlador
    require_once("models/usuario.php");
    //Cargar los archivos necesarios

    class Usuario extends Common
    {
        //Definir los filtros sobre los parámetros que ingresen a la petición, en caso de no necesitar parámetros, dejar un array vació
        public static   $INDEX = array();
        public static   $GRID = array();
        public static   $REGISTRO = array("id" => array("nulo" => false, "vacio" => false, "tipo" => "entero"));
        public static   $ALMACENAR = array(
                            "id" => array("nulo" => false, "vacio" => false, "tipo" => "entero"),
                            "contrasena" => array("nulo" => false, "vacio" => false, "tipo" => "string"),
                            "nombre" => array("nulo" => false, "vacio" => false, "tipo" => "string"),
                            "usuario" => array("nulo" => false, "vacio" => false, "tipo" => "string")
                        );
        public static   $ESTATUS = array("id" => array("nulo" => false, "vacio" => false, "tipo" => "entero"));

        function __construct(){
            //Llamar al constructor del padre para verificar datos de seguridad
            parent::__construct();
        }

        function __destruct(){
            //Llamar al destructor del padre para terminar la conexión
            parent::__destruct();
        }

        public function index()
        {
            //Definir el contenido que se deberá de cargar para mostrar en web
            $_REQUEST['contenido'] = "usuario";
            require("views/base.php");
        }

        public function grid()
        {
            parent::responder(UsuarioModel::grid());
        }

        public function registro()
        {
            parent::responder(UsuarioModel::registro($_REQUEST["id"]));
        }

        public function almacenar()
        {
            parent::responder(UsuarioModel::almacenar($_REQUEST));
        }

        public function estatus()
        {
            parent::responder(UsuarioModel::estatus($_REQUEST["id"]));
        }

    }

?>
