<?php

	//Cargar la clase de conexión padre para el modelo
	require_once("models/model_father.php");
    //Cargar los archivos necesarios

    class UsuarioModel extends Model
    {
        //Definir los atributos de la clase
    	public $nombre = null;
        public $usuario = null;
        public $contrasena = null;

    	function __construct($id = null)
    	{
    		parent::__construct($id);
    	}

    	function __destruct()
    	{

    	}
        
        public static function grid()
        {
            $registros = array();
            foreach (UsuarioModel::buscar() as $registro) {
                $item = array();
                $item[0] = $registro->nombre;
                $item[1] = $registro->usuario;
                $item[2] = "<a href='javascript:mostrarPermisos(\"". $registro->obtenerId() ."\");'><i class='fa fa-lock'></i></a>";
                $item[3] = "<a href='javascript:editarRegistro(\"usuario\", \"". $registro->obtenerId() ."\");'><i class='fa fa-pencil'></i></a>";
                if($registro->activo == 1){
                    $item[4] = "<a href='javascript:eliminarRegistro(\"usuario\", \"". $registro->obtenerId() ."\");'><i class='fa fa-times'></i></a>";
                }else{
                    $item[4] = "<a href='javascript:eliminarRegistro(\"usuario\", \"". $registro->obtenerId() ."\");'><i class='fa fa-check'></i></a>";
                }
                $registros[] = $item;
            }
            return array("status" => true, "registros" => $registros);
        }

        public static function registro($id)
        {
            $json = array();
            @$registro = UsuarioModel::buscar("id = :id", array("id" => $id))[0];
            if(is_object($registro)){
                $registro = $registro->convertirArray(true);
                $registro["contrasena"] = "|:*default*-:/";
                $json["item"] = $registro;
                $json["status"] = true;
            }else{
                $json = array("status" => false, "mensaje" => "Registro no encontrado");
            }
            return $json;
        }

        public static function almacenar($datos)
        {
            $json = array();
            DB::conectar();
            DB::$conexion->beginTransaction();
            try{
                $editar = false;
                @$registro = UsuarioModel::buscar("id = :id", array("id" => $datos["id"]))[0];
                if(!is_object($registro)){
                    $registro = new UsuarioModel();
                    $registro->contrasena = SeguridadModel::encriptar($datos["contrasena"]);
                }else{
                    if($datos["contrasena"] != "|:*default*-:/") $registro->contrasena = $datos["contrasena"];
                    $editar = true;
                }
                $registro->nombre = $datos["nombre"];
                $registro->usuario = $datos["usuario"];
                $registro->guardar();
                if(!$editar){
                    foreach (PermisoModel::buscar() as $permiso) {
                        $permiso_administrador = new PermisoUsuarioModel();
                        $permiso_administrador->id_usuario = $registro->obtenerId();
                        $permiso_administrador->id_permiso = $permiso->obtenerId();
                        $permiso_administrador->guardar();
                    }
                }
                DB::$conexion->commit();
                $json = array("status" => true, "mensaje" => "Registro guardado correctamente");
            }catch(Exception $e){
                DB::$conexion->rollBack();
                $json = array("status" => false, "mensaje" => $e->getMessage());
            }
            return $json;
        }

        public static function estatus($id)
        {
            $json = array();
            try{
                @$registro = new UsuarioModel($id);
                if(!is_object($registro)){
                    throw new Exception("No se encontro el usuario", 1); 
                }
                $registro->cambiarEstatus();
                $json = array("status" => true, "mensaje" => "Registro editado correctamente");
            }catch(Exception $e){
                $json = array("status" => false, "mensaje" => $e->getMessage());
            }
            return $json;
        }

    }

?>
