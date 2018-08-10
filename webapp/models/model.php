<?php

	//Cargar la clase de conexión padre para el modelo
    require_once("models/pdo_connection.php");
    //Cargar la estructura de la base de datos para el modelo
    require_once("config/data_base_definition.php");
    //Cargar la estructura de la base de datos para el modelo
    require_once("libraries/input.php");

     class Model
    {
        protected $id;
        protected $status;
    	protected $createdAt;
    	protected $updatedAt;

        private $clase;
        private $estructura_db;
        private $estructura_db_columnas;
        private $estructura_db_columnas_relacional;
        private $estructura_db_columnas_relacional_combinada;

    	function __construct($id)
    	{
            global $db;
            $this->id = $id;
            $this->clase = self::obtenerClase();
            $this->estructura_db = $db[$this->clase];
            $this->estructura_db_columnas = $this->obtenerColumnas();
            $this->estructura_db_columnas_relacional = $this->obtenerColumnas(true);
            $this->estructura_db_columnas_relacional_combinada = $this->obtenerColumnas(true, true);
            $this->popularColumnas();
    	}

        private static function obtenerClase()
        {
            $clase = str_replace("Model", "", get_called_class());
            preg_match_all('#([A-Z]+)#', $clase, $mayusculas);
            $mayusculas = $mayusculas[0];
            array_shift($mayusculas);
            if(count($mayusculas) > 0){
                foreach ($mayusculas as $mayuscula) {
                    $clase = str_replace($mayuscula, "_". strtolower($mayuscula), $clase);
                }
            }
            $clase = strtolower(trim($clase, "_"));
            return $clase;
        }

        private function obtenerColumnas($relacional = false, $combinar = false)
        {
            $columnas = "";
            if($relacional && !$combinar){
                foreach ($this->estructura_db as $columna => $parametro) {
                    $columnas.= ":$columna, ";
                }
                
            }else if($relacional && $combinar){
                foreach ($this->estructura_db as $columna => $parametro) {
                    $columnas.= "$columna = :$columna, ";
                }
            }else{
                foreach ($this->estructura_db as $columna => $parametro) {
                    $columnas.= "$columna, ";
                }
            }
            $columnas = trim($columnas, ", ");
            return $columnas;
        }

        private function obtenerValores()
        {
            $valores = array();
            foreach ($this->estructura_db as $columna => $parametros) {
               $valores[$columna] = $this->$columna;
               if(is_null($valores[$columna]) && isset($parametros["default"])){
                    $valores[$columna] = $parametros["default"];
               }
            }

            $valores["modificado"] = date("Y-m-d H:i:s");
            if(is_null($this->id)){
                $valores["creado"] = $valores["modificado"];
            }else{
                $valores["id"] = $this->id;
            }

            return $valores;
        }

    	public function obtenerId(){
    		return $this->id;
    	}

        public function obtenerCreado(){
            return $this->creado;
        }

        public function obtenerModificado(){
            return $this->modificado;
        }

        public static function buscar($filtros = "1=1", $args = array())
        {
            $clase = get_called_class();
            $clase_nombre = self::obtenerClase();
            $sql = "SELECT id FROM $clase_nombre WHERE $filtros;";
            $respuesta = DB::queryArray($sql, $args);
            if(!$respuesta["status"]) throw new Exception($respuesta["msg"], 3);
            $resultados = array();
            foreach ($respuesta["registros"] as $fila) {
                $resultados[] = new $clase($fila["id"]);
            }
            return $resultados;
        }

        public static function findAll() {
            return self::buscar("status = :status", ["status" => 1]);
        }

        public function convertirArray($id = false, $fechas = false, $activo = false)
        {
            $array = $this->obtenerValores();
            if(!$id) unset($array["id"]);
            if(!$fechas){
                unset($array["createdAt"]);
                unset($array["updatedAt"]);
            }
            if(!$activo) unset($array["status"]);
            return $array;
        }

    	public function guardar()
    	{
            if(is_null($this->id)){
                $sql = "INSERT INTO $this->clase ($this->estructura_db_columnas) VALUES($this->estructura_db_columnas_relacional);";
            }else{
                $sql = "UPDATE $this->clase SET $this->estructura_db_columnas_relacional_combinada WHERE id = :id;";
            }
            $respuesta = DB::queryArray($sql, $this->obtenerValores());
            if(!$respuesta["status"]){
                $mensaje = "No se ha podido guardar la informacion, intentalo nuevamente";
                if($respuesta["codigo"] == 1062){
                    $mensaje = "El campo <b>". explode("'", $respuesta["msg"])[3] ."</b> ya se encuentra registrado, favor de verificarlo";
                }
                throw new Exception($mensaje, $respuesta["codigo"]);
            }
            $this->id = (is_null($this->id)) ? $respuesta["id_insertado"] : $this->id;
            $this->popularColumnas();
    	}

        public function cambiarEstatus($status = 0) {
            if(is_null($this->id)) throw new Exception("No es posible eliminar un objeto que no existe", 2);
            $this->status = $status;
            $this->guardar();        
        }

        private function popularColumnas() {
            if(!is_null($this->id)){
                $sql = "SELECT * FROM $this->clase WHERE id = :id;";
                $parametros = array("id" => $this->id);
                $respuesta = DB::queryArray($sql, $parametros);
                if($respuesta["total"] != 1) throw new Exception("Registro no encontrado [". $this->id ."]", 3);
                $respuesta = $respuesta["registros"][0];
                foreach ($respuesta as $columna => $valor) {
                    $this->$columna = $valor;
                }
            }
        }
        
    }

?>
