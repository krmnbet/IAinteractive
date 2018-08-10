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

<body>
	<br>
	<div class="panel panel-default col-md-10 col-md-offset-1"><br>
	<button id="" onclick="javascript:window.location='index.php?c=Peliculas&f=inicio'" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
Volver</button>
	<br><br>
	<script>
		
		    $.ajax({
            url:"http://localhost/IAinteractive/webapp/pelicula/<?php echo $_REQUEST['p'];?>",
            type: 'GET',
            dataType:'JSON',                                
            
            success: function(r){
            	
				
        
				
            		$("#titulo").html("<b style='color:#4E93BE'>"+r.titulo+"</b><br>");
            		$("#fecha").html(r.fecha_estreno);
            		$("#sinopsis").html("<b style='color:#4E93BE'>Sinopsis:</b><br>"+r.sinopsis);
            		$("#resena").html(r.resena);
            		
            		$("#image").attr("src","http://localhost/IAinteractive/webapp/public/poster/"+r.poster);
	        		
	        	}
            });
	</script>
	<div style="overflow: scroll;">
		<table style="color:#686464" >
			<tr>
				<th rowspan="3"> 
					<div class="col-md-3" style="">
						<img src="" id="image" width="200px" height="270px" style="display:block;" scale="0">
					</div>
				</th>
				<th id="titulo"></th>
				
			</tr>
			<tr>
				<th id="fecha"></th>
			</tr>
			<tr>
				<th>
					<div class="col-md-3" style="text-align:justify;" id="sinopsis">
					
					</div>
					</th>
			</tr>
			
			
		</table>
	</div>
	<br>
	<div class="col-md-10" style="color: #686464;text-align:justify;" id="resena">
	
	</div>
	<br><br>
	<h3 style=""><b>COMENTARIOS</b></h3>
	<hr>
	
	<table style="color:#686464" >
		<tr>
			<th rowspan="2"> 
				<div class="col-md-3" style="" >
					<img src="http://localhost/IAinteractive/webapp/public/poster/user.png"  style="display:block;" scale="0">
				</div>
			</th>
			<th>usuario 1</th>
			
		</tr>
		<tr bordercolor="">
			<th>comentario cla bla cbalaa</th>
		</tr>
	</table>
	<hr>
	<button id="" onclick="agregarComentario(<?php echo $_REQUEST['p'];?>)" class="btn btn-primary btn-sm" data-loading-text="<i class='fa fa-refresh fa-spin '></i>" type="button">
	 Agregar Comentario </button>
		<br><br>
	
</body>
<div id="modelcomentario" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content panel-success">
            <div class="modal-header panel-heading">
                <h4 id="modal-label" id="">Agregar Comentario</h4>
            </div>
            <div class="modal-body" id="comentario">
               <textarea id="addcome" class="form-control" placeholder="Escribe aquí el comentario..." maxlength="500"></textarea>
               <label style="font-size: 10px;color: red">Max. 500 caracteres</label>
            </div>
             <div class="modal-footer">
             	 <button type="button" class="btn btn-primary" data-dismiss="modal">
			        <span class="glyphicon"></span>
			        <span class="hidden-xs">Enviar</span>
			    </button>
			    <button type="button" class="btn btn-default" data-dismiss="modal">
			        <span class="glyphicon glyphicon-remove"></span>
			        <span class="hidden-xs">Cerrar</span>
			    </button>
			
			</div>
        </div>
    </div> 
</div> 
</div>
<script>
	function agregarComentario(idpeli){
		
		<?php if(isset($_SESSION['usuario'])){ ?>
				$("#modelcomentario").modal('show');
		<?php }else{?>
				alert("Debes iniciar sesion para comentar");
				window.location = 'http://localhost/IAinteractive/webapp/public/views/usuarios/usuarioinicio.php?id='+idpeli;
		<?php } ?>
	
       

 }
</script>
</html>