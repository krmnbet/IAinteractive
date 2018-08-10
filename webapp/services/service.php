<?php
	require_once('libraries/response.php');

	 class ModelService {

		protected $response;

		public function __construct() {
			$this->response = new Response();
		}

		 public function findAll();
         public function findByOne($id);
         public function create($data);
         public function update($id, $data);
         public function delete($id);
	}