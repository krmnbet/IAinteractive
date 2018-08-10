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
<div class="panel panel-default col-md-10 col-md-offset-1"><br>
	<h2>Catalogo de Peliculas</h2>
		<br>
		<div style="overflow: scroll;text-align: center;" >
			<script>
				$.post("ajax.php?c=Peliculas&f=validauser",{
		      		usuario:$("#usuario").val(),
		      		clave:$("#clave").val()
		      	},function(r){ 
		      		if(r==0){
		      			alert("Usuario o clave incorrectos!");
		      		}else{
		      			window.location ="http://localhost/IAinteractive3/index.php?c=Peliculas&f=verpeli";
		      		}
		      		btnguardar.button('reset');
		     	 });
			</script>
			<div class="col-md-2">
		        <table>
		        	
		        		<tr>
		        			<th title="Sinopsis" rowspan="2">
		        				<div class="col-md-3" style="">
									<img src="poster/aqua.jpeg" width="200px" height="270px" onclick="javascript:window.location='index.php?c=Peliculas&f=verpeli&p=1'" style="display:block;cursor: pointer" scale="0">
								</div>
		        			</th>
		        			
		        			
		        		</tr>
		        	
		        </table>
	        </div>
	        <div class="col-md-2">
		        <table >
		        	<tbody>
		        		<tr>
		        			<td>
		        				<div class="col-md-3" style="">
									<img src="poster/jurassic.jpeg" width="200px" height="270px"  style="display:block;" scale="0">
								</div>
		        			</td>
		        			
		        		</tr>
		        	</tbody>
		        </table>
	        </div>
	        <div class="col-md-2">
		        <table>
		        	<tbody>
		        		<tr>
		        			<td>
		        				<div class="col-md-3" style="">
									<img src="poster/panter.jpg" width="200px" height="270px"  style="display:block;" scale="0">
								</div>
		        			</td>
		        			
		        		</tr>
		        	</tbody>
		        </table>
	        </div>
	        <div class="col-md-2">
		        <table >
		        	<tbody>
		        		<tr>
		        			<td>
		        				<div class="col-md-3" style="">
									<img src="poster/venom.jpg" width="200px" height="270px"  style="display:block;" scale="0">
								</div>
		        			</td>
		        			
		        		</tr>
		        	</tbody>
		        </table>
	        </div>
	        
	        
        </div>
        <br><br>
       </div>
	</body>

</html>