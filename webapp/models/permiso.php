<?php

	//Cargar la clase de conexión padre para el modelo
	require_once("models/model_father.php");

    require_once("models/permiso_usuario.php");

    class PermisoModel extends Model
    {
    	public $nombre = null;
    	public $seccion = null;

    	function __construct($id = null)
    	{
    		parent::__construct($id);
    	}

    	function __destruct()
    	{

    	}

        public static function grid($administrador)
        {
            $registros = array();
            foreach (PermisoUsuarioModel::buscar("id_usuario = :id_usuario", array("id_usuario" => $administrador)) as $registro) {
                $item = array();
                $item[0] = PermisoModel::buscar("id = :id", array("id" => $registro->id_permiso))[0]->nombre;
                if($registro->activo == 1){
                    $item[1] = "<a href='javascript:eliminarRegistroConParametros(\"permiso\", \"". $registro->obtenerId() ."\", ". json_encode(array("usuario" => $administrador)) .", \"tabla_modulo_permisos\");'><i class='fa fa-times'></i></a>";
                }else{
                    $item[1] = "<a href='javascript:eliminarRegistroConParametros(\"permiso\", \"". $registro->obtenerId() ."\", ". json_encode(array("usuario" => $administrador)) .", \"tabla_modulo_permisos\");'><i class='fa fa-check'></i></a>";
                }
                $registros[] = $item;
            }
            return array("status" => true, "registros" => $registros);
        }

        public static function estatus($id)
        {
            $json = array();
            try{
                @$registro = new PermisoUsuarioModel($id);
                if(!is_object($registro)){
                    throw new Exception("No se encontro el permiso", 1); 
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
