<?php 
    //Cargar la clase padre para este servicio
    require_once('service.php');
	//Cargar el modelo para este servicio
    require_once("models/pelicula.php");
    //Cargar los archivos necesarios

	class PeliculaService extends ModelService {
        public function findAll() {
            $peliculas = PeliculaModel::findAll();
            $this->response->status = 200;
            $this->response->message = "OK";
            $this->response->data = $peliculas;
            return $this->response;
		}

        public function findByOne($id) {
            $pelicula = new PeliculaModel($id);
            $this->response->status = 200;
            $this->response->message = "OK";
            $this->response->data = $pelicula;
            return $this->response;
        }

        public function create($data) {
            print_r($data); exit();
        }

        public function update($id, $data) {

        }

        public function delete($id) {
            $pelicula = new PeliculaModel($id);
            $pelicula->cambiarEstatus();
            $pelicula->guardar();
            $this->response->status = 200;
            $this->response->message = "OK";
            $this->response->data = $pelicula;
            return $this->response;
        }
	}