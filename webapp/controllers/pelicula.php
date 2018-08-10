<?php

    //Cargar la clase padre para este controlador
    require_once('common.php');
    //Cargar el servicio para este controlador
    require_once("services/pelicula.php");
    //Cargar los archivos necesarios

    class Pelicula extends Common
    {

        public function __construct() {
            parent::__construct();
        }

        protected function setService() {
            $this->service = new PeliculaService();
        }
    }
?>