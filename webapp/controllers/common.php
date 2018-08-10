<?php
    require_once('libraries/response.php');

	/*
		Clase padre de los modelos, se encarga de validar cuestiones de seguridad y responder la información generada por el modelo
	*/

	abstract class Common
	{
        protected $service;

        public function __construct() {
            $this->setService();
        }

        abstract protected function setService();

        public function findAll() {
            self::responder($this->service->findAll());
        }

        public function findByOne($id) {
            self::responder($this->service->findByOne($id));
        }

        public function create($data) {
            self::responder($this->service->create($data));
        }

        public function update($id, $data) {
            self::responder($this->service->update($id, $data));
        }

        public function delete($id) {
            self::responder($this->service->delete($id));
        }

        public function execute($f) {  
            $params = new ReflectionMethod(self::class, $f);
            $bind = array();
            foreach ($params->getParameters() as $key => $param) {
                $param = $param->getName();
                $bind[$param] = ($param == 'id') ? $_REQUEST[$_REQUEST['recurso']] : $_REQUEST[$param];
            }
            call_user_func_array(array($this, $f), $bind);
        }

        //Responder al cliente la información generada por el modelo
        function responder($respuesta) {
            Response::send($respuesta);
        }
	}
?>