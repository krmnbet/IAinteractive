<?php

	/*
		Definición del comportamiento del sistema a través de una llamada del navegador.
	*/

    //Cargar las configuraciones generales
	require_once('config/settings.php');

	//Cargar el gestor de sobreescritura
	require('libraries/rewrite.php');

	//Cargar las rutas
	require_once('config/routes.php');
	
	//Ejecutar la función solicitada
	$app_router->match($_SERVER['REQUEST_METHOD'], $_REQUEST['ruta']);

?>