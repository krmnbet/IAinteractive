<?php

	class Router
	{
		private $routes;

		function __construct() {
			$this->routes = [];
		}

		public function bindGet($path, $action, $preDispatch = null) {
			$this->bind('GET', $path, $action, $preDispatch);
		}

		public function bindPost($path, $action, $preDispatch = null) {
			$this->bind('POST', $path, $action, $preDispatch);
		}

		public function bindDelete($path, $action, $preDispatch = null) {
			$this->bind('DELETE', $path, $action, $preDispatch);
		}

		public function bindPut($path, $action, $preDispatch = null) {
			$this->bind('PUT', $path, $action, $preDispatch);
		}

		public function match($method, $route) {
			$route = "{$method} - {$route}";
			$match = $this->matchRegex($method, $route);
			if (count($match) == 1) {
				$route = $this->routes[array_shift($match)];
				if ($route['preDispatch'] !== null) call_user_func($route['preDispatch']);
				$controller = $this->getController($route['controller']);
				$controller->execute($route['action']);
			} else {
				throw new Exception("Route not found", 1);
			}
		}

		private function matchRegex($method, $route) {
			$filtro = array_filter(array_keys($this->routes), function ($ruta) use ($method, $route) {
				$ruta = "/^{$ruta}$/";
				return preg_match($ruta, $route);
			});
			return $filtro;
		}

		private function bind($method, $path, $action, $preDispatch) {
			$action = explode('::', $action);
			$route = [
				'controller' => $action[0],
				'action' => $action[1],
				'preDispatch' => $preDispatch
			];
			$this->routes["{$method} - {$path}"] = $route;
		}

		private function getController($controller) {
			@$controller = strtolower($controller);

			if (file_exists("controllers/{$controller}.php")) {
				require_once "controllers/{$controller}.php";
				$controller = ucfirst($controller);
				$controller = new $controller();
			} else {	
				throw new Exception("Controller not found", 1);
			}
			return $controller;
		}
	}
?>