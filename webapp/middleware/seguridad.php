<?php
	
	//Cargar la clase de conexión padre para el modelo
    require_once("models/pdo_connection.php");

	abstract class Seguridad {

		public static $ERROR_GLOBAL = array("status" => false, "mensaje" => "No se ha podido completar la accion, intentalo nuevamente");
		public static $TOKEN_INVALIDO = array("status" => false, "mensaje" => "La sesión ha expirado", "logout" => true);
		public static $SIN_PERMISO = array("status" => false, "mensaje" => "No cuentas con permisos para realizar esta accion", "logout" => true);

		public static $Usuario;
		public static $Sesion;

		abstract public static function logueado();

		abstract public static function login($usuario, $contrasena);

		abstract public static function logout();

		public static function encriptar($texto) {
			require_once('config/settings.php');
			global $salt;
			$resultado = crypt($texto, '$2y$10$'. $salt);
			return $resultado;
		}

		

		//Determinar si un string es un json valido
		private function validarJSON($json)
		{
            $json = json_decode($json, true);
            if(json_last_error() === JSON_ERROR_NONE) return true;
            return false;
        }

	}
?>