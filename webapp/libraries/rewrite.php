<?php
	
	$_REQUEST['data'] = (array) json_decode(file_get_contents('php://input'));
	
	if(isset($_REQUEST['ruta'])) {
		@$parametros = explode("/", "/{$_REQUEST['ruta']}");
		$parametros = array_diff($parametros, array(""));
		@$_REQUEST['recurso'] = $parametros[1];
		for($i = 1; $i <= count($parametros); $i++) {
			$pre = $i;
			++$i;
			if($i > count($parametros)) break;
			$_REQUEST[$parametros[$pre]] = $parametros[$i]; 
		}
	}