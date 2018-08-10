<?php

	require_once('routes/router.php');
	require_once('middleware/seguridad_administrador.php');
	require_once('middleware/seguridad_usuario.php');

	$app_router = new Router();

	$app_router->bindGet('pelicula', 'Pelicula::findAll', function(){
		$seguridad = new SeguridadAdministrador();
		$seguridad->logueado();
	});

	$app_router->bindPost('pelicula', 'Pelicula::create', function(){
		$seguridad = new SeguridadAdministrador();
		$seguridad->logueado();
	});

	$app_router->bindGet('pelicula\/[1-9]\d*', 'Pelicula::findByOne', function(){
		$seguridad = new SeguridadAdministrador();
		$seguridad->logueado();
	});

	$app_router->bindDelete('pelicula\/[1-9]\d*', 'Pelicula::delete', function(){
		$seguridad = new SeguridadAdministrador();
		$seguridad->logueado();
	});

	$app_router->bindPut('pelicula\/[1-9]\d*', 'Pelicula::update', function(){
		$seguridad = new SeguridadAdministrador();
		$seguridad->logueado();
	});