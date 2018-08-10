<?php

    //Cargar la clase padre para este controlador
    require_once('common.php');
    //Cargar el modelo para este controlador
    require_once("models/permiso.php");

    class Permiso extends Common
    {
        //Definir los filtros sobre los parámetros que ingresen a la petición, en caso de no necesitar parámetros, dejar un array vació
        public static   $GRID = array("usuario" => array("nulo" => false, "vacio" => false, "tipo" => "entero"));
        public static   $ESTATUS = array("id" => array("nulo" => false, "vacio" => false, "tipo" => "entero"));

        function __construct(){
            //Llamar al constructor del padre para verificar datos de seguridad
            parent::__construct();
        }

        function __destruct(){
            //Llamar al destructor del padre para terminar las conexión
            parent::__destruct();
        }

        public function grid()
        {
            parent::responder(PermisoModel::grid($_REQUEST["usuario"]));
        }

        public function estatus()
        {
            parent::responder(PermisoModel::estatus($_REQUEST["id"]));
        }

    }

?>
