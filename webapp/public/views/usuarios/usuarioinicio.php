<html>
	<head>
		
	<script src="libraries/jquery-1.10.2.min.js"></script>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
     <link rel="stylesheet" type="text/css" href="http://localhost/IAinteractive/webapp/public/librerias/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://localhost/IAinteractive/webapp/public/librerias/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="http://localhost/IAinteractive/webapp/public/librerias/bootstrap-select-1.9.3/dist/css/bootstrap-select.min.css">
	<script src="http://localhost/IAinteractive/webapp/public/librerias/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="http://localhost/IAinteractive/webapp/public/librerias/bootstrap-select-1.9.3/dist/js/bootstrap-select.min.js"></script>
    <link href="http://localhost/IAinteractive/webapp/public/css/diseno.css" rel="stylesheet">
	
   <script src="http://localhost/IAinteractive/webapp/public/js/usuarios.js"></script><br />
	</head>
	<body>
		<style>
		
		</style>
<div class="container">
	
<div id="divlogin_container" align="center">
		<br>
<div id="divlogin">

		 <input
            	class="form-control"
            	placeholder="Correo"
            	type="text"
            	id="usuario"
            	name="usuario"
            	value="<?php echo $correo;?>">
         
            <br />
			<input
            	class="form-control"
            	placeholder="Contraseña"
         		type="password"
         		AUTOCOMPLETE="off"
         		id="clave"
         		name="clave"
         		value="<?php echo $clave;?>">
         	<br /><br />
              <button id="loginuser" class="btn btn-primary btn-lg btn-block" data-loading-text="<i class='fa fa-refresh fa-spin '></i>" type="button">
                Login </button>
                <br>
			<a href="javascript:nuevoUser();" class="footerlink" style="text-align: center">Registrar nuevo usuario</a>
            <br />
          </div>
	</div>
</div>
<div id="registro" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content panel-success">
            <div class="modal-header panel-heading">
                <h4 id="modal-label" id="">Registro de Usuario</h4>
            </div>
            <div class="modal-body" id="contenido">
                <input
            	class="form-control"
            	placeholder="Nombre"
            	type="text"
            	id="newuser"
            	name="newuser">
         
            <br />
            <input
            	class="form-control"
            	placeholder="Correo"
         		type="email"
         		AUTOCOMPLETE="off"
         		id="correo"
         		name="correo">
         		 <br />
			<input
            	class="form-control"
            	placeholder="Contraseña"
         		type="password"
         		AUTOCOMPLETE="off"
         		id="newclave"
         		name="newclave">
         		
         	<br /><br />
            </div>
             <div class="modal-footer">
			    <button id="crearuser" class="btn btn-primary" data-loading-text="<i class='fa fa-refresh fa-spin '></i>" data-dismiss="modal">
			        <span class="hidden-xs">Crear</span>
			    </button>
			    <button type="button" class="btn btn-default" data-dismiss="modal">
			        <span class="glyphicon glyphicon-remove"></span>
			        <span class="hidden-xs">Cerrar</span>
			    </button>
			
			</div>
        </div>
    </div> 
</div> 



	</body>
</html>