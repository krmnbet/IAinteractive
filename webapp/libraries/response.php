<?php

	class Response
	{

		public $status;
		public $message;
		public $data;

		public static function send($response) {
			header('Content-Type: application/json');
			header("HTTP/1.0 {$response->status} {$response->message}");
			echo self::json($response->data);
			exit();
		}

		private static function json($data) {
			return json_encode($data);
		}

	}

?>