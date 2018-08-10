<?php 
    //Cargar la clase padre para este servicio
    require_once('service.php');
	//Cargar el modelo para este servicio
    require_once("models/usuario.php");
    //Cargar los archivos necesarios

	class UsuarioService extends ModelService {
        public function findAll() {
            $usuario = UsuarioModel::findAll();
            $this->response->status = 200;
            $this->response->message = "OK";
            $this->response->data = $usuario;
            return $this->response;
		}

        public function findByOne($id) {
            $usuario = new UsuarioModel($id);
            $this->response->status = 200;
            $this->response->message = "OK";
            $this->response->data = $usuario;
            return $this->response;
        }

        public function create($data) {
            print_r($data); exit();
        }

        public function update($id, $data) {

        }

        public function delete($id) {
            $usuario = new UsuarioModel($id);
            $usuario->cambiarEstatus();
            $usuario->guardar();
            $this->response->status = 200;
            $this->response->message = "OK";
            $this->response->data = $usuario;
            return $this->response;
        }
	}
?>