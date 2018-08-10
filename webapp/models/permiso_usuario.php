<?php

	//Cargar la clase de conexión padre para el modelo
	require_once("models/model_father.php");

    class PermisoUsuarioModel extends Model
    {
    	public $id_usuario = null;
    	public $id_permiso = null;

    	function __construct($id = null)
    	{
    		parent::__construct($id);
    	}

    	function __destruct()
    	{

    	}
        
    }

?>
