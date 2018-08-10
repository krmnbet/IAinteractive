<?php

	/*
		Definición de la estructura de la base de datos que usara el proyecto;
		Por estándar del framework cada tabla siempre tendrá las columnas: ID, ACTIVO, CREADO, MODIFICADO.

		El array principal << $db >> es asociativo y cada elemento de el es una tabla existente en la base de datos, cada tabla estará definida por:
		- Llave (Asociación al array principal): 
			Será el nombre de la tabla en minúsculas.
		- Contenido: 
			Será un array asociativo el cual contendrá la definición de cada uno de las columnas de la tabla, esta definición será la siguiente:
			- Llave (Asociación al array de la tabla): 
				Será el nombre de la columna en minúsculas.
			- Contenido:
				Será un array asociativo el cual contendrá la definición de cada una de las características, las cuales deben ser:
				- Tipo:
					Indica el tipo de dato de la columna.
				- Nulo:
					Indica si el campo puede ser nulo, esto se indica mediante un true o false dependiendo el caso.
				- Tamano:
					Indica la longitud del campo, se puede dejar en null para no especificar la longitud.
				- Default (Opcional):
					Indica el valor default que contendrá el campo.
	*/

	global $db;
	
	$db = array(
		"administrador" => array(
			"usuario" => array(
				"tipo" => "string",
				"nulo" => false,
				"tamano" => 50
			),
			"contrasena" => array(
				"tipo" => "text",
				"nulo" => false,
				"tamano" => null
			)
		),
		"usuario" => array(
			"nombre" => array(
				"tipo" => "string",
				"nulo" => false,
				"tamano" => 150
			),
			"correo" => array(
				"tipo" => "string",
				"nulo" => false,
				"tamano" => 100
			),
			"contrasena" => array(
				"tipo" => "text",
				"nulo" => false,
				"tamano" => null
			)
		),
		"pelicula" => array(
			"titulo" => array(
				"tipo" => "string",
				"nulo" => false,
				"tamano" => 100
			),
			"sinopsis" => array(
				"tipo" => "text",
				"nulo" => false,
				"tamano" => null
			),
			"poster" => array(
				"tipo" => "string",
				"nulo" => true,
				"tamano" => 50
			),
			"fecha_estreno" => array(
				"tipo" => "datetime",
				"nulo" => false,
				"tamano" => null
			),
			"resena" => array(
				"tipo" => "string",
				"nulo" => false,
				"tamano" => 500
			)
		),
		"comentario" => array(
			"id_usuario" => array(
				"tipo" => "bigint",
				"nulo" => false,
				"tamano" => 20
			),
			"id_pelicula" => array(
				"tipo" => "bigint",
				"nulo" => false,
				"tamano" => 20
			),
			"comentario" => array(
				"tipo" => "text",
				"nulo" => false,
				"tamano" => null
			)
		),
		"permiso" => array(
			"nombre" => array(
				"tipo" => "string",
				"nulo" => false,
				"tamano" => 150
			),
			"seccion" => array(
				"tipo" => "string",
				"nulo" => false,
				"tamano" => 200
			)
		),
		"permiso_usuario" => array(
			"id_usuario" => array(
				"tipo" => "bigint",
				"nulo" => false,
				"tamano" => 20
			),
			"id_permiso" => array(
				"tipo" => "bigint",
				"nulo" => false,
				"tamano" => 20
			)
		),
	);
	

	foreach ($db as $columna => &$parametros) {
		$parametros["status"] = array(
				"tipo" => "int",
				"nulo" => false,
				"tamano" => 1,
				"default" => 1
			);
		$parametros["updatedAt"] = $parametros["createdAt"] = array(
				"tipo" => "datetime",
				"nulo" => false,
				"tamano" => null
			);
	}

?>