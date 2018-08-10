<?php
	require_once('libraries/response.php');

	abstract class ModelService {

		protected $response;

		public function __construct() {
			$this->response = new Response();
		}

		abstract public function findAll();
        abstract public function findByOne($id);
        abstract public function create($data);
        abstract public function update($id, $data);
        abstract public function delete($id);
	}