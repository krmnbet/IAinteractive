<?php

	//Cargar la clase de conexión padre para el modelo
	require_once("models/model.php");
    //Cargar los archivos necesarios

    class PeliculaModel extends Model
    {
        //Definir los atributos de la clase
        public $id;
    	public $titulo;
        public $sinopsis;
        public $poster;
        public $fecha_estreno;
        public $resena;

    	function __construct($id = null) {
    		parent::__construct($id);
    	}
    }
