<?php

	//Cargar la clase de conexión padre para el modelo
	require_once("models/model.php");
    //Cargar los archivos necesarios

    class UsuarioModel extends Model
    {
        //Definir los atributos de la clase
    	public $usuario;
        public $contrasena;

    	function __construct($id = null) {
    		parent::__construct($id);
    	}
    }
?>