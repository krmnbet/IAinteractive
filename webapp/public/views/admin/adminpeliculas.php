<!DOCTYPE >
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <link rel="stylesheet" type="text/css" href="http://localhost/IAinteractive/webapp/public/librerias/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://localhost/IAinteractive/webapp/public/librerias/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="http://localhost/IAinteractive/webapp/public/librerias/bootstrap-select-1.9.3/dist/css/bootstrap-select.min.css">
	<script src="http://localhost/IAinteractive/webapp/public/librerias/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="http://localhost/IAinteractive/webapp/public/librerias/bootstrap-select-1.9.3/dist/js/bootstrap-select.min.js"></script>
    <link href="http://localhost/IAinteractive/webapp/public/css/diseno.css" rel="stylesheet">
	<script src="http://localhost/IAinteractive/webapp/public/librerias/jquery-1.10.2.min.js"></script>
		

	 <script src="http://localhost/IAinteractive/webapp/public/js/principal.js"></script>
</head>
	<body><br>
		<div class="row">
			<div class="col-xs-12 ">
				<div class="panel panel-default col-md-10 col-md-offset-1">
					<div class="panel-heading">
						<div class="row">
							<input type="hidden" name="valortomado" id="valortomado">
							<div class="col-xs-12" style="margin-top: 10px">

								
								<button
									id="btn_editar"
									onclick="editar()"
									data-toggle="modal"
									data-target="#modal_editar"
									data-loading-text="<i class='fa fa-refresh fa-spin'></i>"
									type="button"
									class="btn btn-primary btn-lg"
									style="width: 170px; margin-top: 0.5%">
									<i class="fa fa-pencil"></i> Modificar
								</button>
								<button
									id="btn_eliminar"
									onclick="eliminar()"
									data-toggle="modal"
									data-target="#modal_eliminar"
									data-loading-text="<i class='fa fa-refresh fa-spin'></i>"
									type="button"
									class="btn btn-danger btn-lg"
									style="width: 170px; margin-top: 0.5%">
									<i class="fa fa-trash"></i> Eliminar
								</button>
								
							</div>
						</div>
					</div>
				<form id="formagregar">
				    <div class="panel-body " style="" ><br>
				    	<h4 style="color: red">Nueva Pelicula</h4><br>
							<div class="col-md-3">
								
								<img id="imgSalida" width="50%" height="50%" src="" />	 <br />
								<label for="imagenUsuario" class="marcoVistaPrevia" id="imagen">Poster:</label>
	      						<input name="poster" id="poster" type="file" />
									  
									   
							</div>
								<div class="row">
									<div class="col-md-4">
										<b>Titulo</b>
										<input type="text" class="form-control" id="titulo" />
									</div>
									<div class="col-md-4">
										<b>Fecha de estreno</b>
										<input type="date" class="form-control" id="fecha" />
									</div>
									<div class="col-md-4">
										<b>Sinopsis</b>
										<textarea class="form-control" id="sinopsis" ></textarea>
									</div>
								
								
									<div class="col-md-4">
										<b>Reseña</b>
										<textarea type="text" class="form-control" id="resena" ></textarea>
									</div>
								</div>
								<div class="row">
									
									<div class="col-md-2" style="float: right"><br>
											<button id="crearpeli" class="btn btn-warning btn-lg btn-block" data-loading-text="<i class='fa fa-refresh fa-spin '></i>" type="button">
	               							 Crear </button>
										</div>
								</div>
								
						
				  	</div>
				</form>
	
	<!-- Modal editar-->
<div id="editar" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content panel-success">
            <div class="modal-header panel-heading">
                <h4 id="modal-label" id="">Editar Pelicula</h4>
            </div>
            <div class="modal-body" id="contenidoe">
               
            </div>
             <div class="modal-footer">
			    <button type="button" class="btn btn-default" data-dismiss="modal">
			        <span class="glyphicon glyphicon-remove"></span>
			        <span class="hidden-xs">Cerrar</span>
			    </button>
			
			</div>
        </div>
    </div> 
</div> 
	<!-- FIN Modal editar -->
	<!-- Modal eliminar-->
<div id="elimina" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content panel-success">
            <div class="modal-header panel-heading">
                <h4 id="modal-label" id="">Eliminar Pelicula</h4>
            </div>
            <div class="modal-body" id="contenidoe">
               
            </div>
             <div class="modal-footer">
			    <button type="button" class="btn btn-default" data-dismiss="modal">
			        <span class="glyphicon glyphicon-remove"></span>
			        <span class="hidden-xs">Cerrar</span>
			    </button>
			
			</div>
        </div>
    </div> 
</div> 
	<!-- FIN Modal editar -->
	</body>
	<script type="text/javascript">
  
$(function() {
  $('#poster').change(function(e) {
      addImage(e); 
     });

     function addImage(e){
      var file = e.target.files[0],
      imageType = /image.*/;
    
      if (!file.type.match(imageType))
       return;
  
      var reader = new FileReader();
      reader.onload = fileOnload;
      reader.readAsDataURL(file);
     }
  
     function fileOnload(e) {
      var result=e.target.result;
      $('#imgSalida').attr("src",result);
     }
    });

 
</script>
</html>