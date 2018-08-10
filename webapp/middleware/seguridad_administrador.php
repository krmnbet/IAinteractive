<?php
	
	//Cargar la clase padre para el modelo
    require_once("middleware/seguridad.php");

	class SeguridadAdministrador extends Seguridad {

		//Verificamos que exista la sesión
        public static function logueado()
        {
            global $servidor_path, $modelo_login_administrador;
            require_once("models/{$modelo_login_administrador}.php");
            session_start();
            if(!isset($_SESSION[$modelo_login_administrador])){
                unset($_SESSION);
                session_destroy();
                return false;
            }else{
                return true;
            }
        }

		public static function login($usuario, $contrasena)
		{
			global $modelo_login_administrador, $modelo_login_administrador_clase, $modelo_login_administrador_nickname, $modelo_login_administrador_contrasena;
			$contrasena = self::encriptar($contrasena);

			$query = 'SELECT * FROM '. $modelo_login_administrador .' WHERE '. $modelo_login_administrador_nickname .' = :usuario AND activo = 1 LIMIT 1;';
            $result = DB::queryArray($query, array("usuario" => $usuario));
            
            $incorrecto = array("status" => false, "mensaje" => "Usuario o contraseña incorrectos");
            if($result["total"] == 1){
            	if($result["registros"][0][$modelo_login_administrador_contrasena] != $contrasena){
            		$result = $incorrecto;
            	}else{
            		$result = new $modelo_login_administrador_clase($result["registros"][0]["id"]);
            	}
            }else{
            	$result = $incorrecto;
            }
            return $result;
		}

		//Cerrar sesion del usuario
		public static function logout()
		{
			global $servidor_path;
			unset($_SESSION);
			session_destroy();
			header("Location: ". $servidor_path);
		}

	}

?>