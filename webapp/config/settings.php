<?php
	
	/*
		Configuración general del proyecto.
	*/

	//Definir si el proyecto esta en fase de desarrollo o en producción
	$activar_modo_debug = false;
	($activar_modo_debug) ? ini_set('display_errors', 1) : error_reporting(0); //¡No modificar esta linea de código!

	//Obtener la ruta del proyecto para el re-direccionamiento
	$url = (empty($_SERVER['HTTPS']) ? "http://" : "https://") . ($_SERVER['SERVER_NAME']) . (((empty($_SERVER['HTTPS']) ? 'http' : 'https') == "http" && $_SERVER['SERVER_PORT'] == 80 || (empty($_SERVER['HTTPS']) ? 'http' : 'https') == "https" && $_SERVER['SERVER_PORT'] == 443) ? "" : ":" . $_SERVER['SERVER_PORT']) . (preg_replace("!^". preg_replace("!". $_SERVER['SCRIPT_NAME'] ."$!", "", $_SERVER['SCRIPT_FILENAME']) ."!", "", __DIR__));
	$ultimo = explode("/", $url);
	$ultimo = end($ultimo);
	$servidor_path = str_replace($ultimo, "", $url);

	//Definir el salt, considerarlo como el ID del proyecto, se usara para cuestión de tokens y contraseñas
	//Se recomienda una cadena de caracteres random de entre 20 y 30 dígitos.
	$salt = "O8MGmImBdPjM6/h/a7TZ.O/YDrANpuYUE";

	//Definir la zona horaria con que se manejaran las fechas
	date_default_timezone_set("Mexico/General");

	//Definir si el sistema tendrá un inicio de sesión, si es así indicar el modelo que procesará al usuario
	$activar_login_administrador = false;
	$modelo_login_administrador = "administrador";
	//Definir los campos de la tabla que se usaran para obtener el usuario y contraseña
	$modelo_login_administrador_nickname = "usuario";
	$modelo_login_administrador_contrasena = "contrasena";
	### Definir usuarios adicionales que requeriran de inicio de sesión
	//Usuarios
	$activar_login_usuario = false;
	$modelo_login_usuario = "usuario";
	$modelo_login_usuario_nickname = "usuario";
	$modelo_login_usuario_contrasena = "contrasena";

	//Definir cual modelo será el principal para mostrarse como primer pantalla una vez logueado
	$pantalla_principal = "usuario";

	/*
		¡No modificar este código!
		Genera los nombres de los archivos en caso de ser necesarios para el funcionamiento del sistema.
	*/
	$modelo_login_clase = obtenerModelo($modelo_login_administrador);

	function obtenerModelo($modelo){
		$modelo = explode("_", $modelo);
	    foreach ($modelo as &$nombre) {
	        $nombre = ucfirst($nombre);
	    }
	    $modelo = implode("", $modelo) . "Model";
	    return $modelo;
	}

?>