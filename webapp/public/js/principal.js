function nueva(){
	
	
	// $('#contenido').empty();
	// $('#contenido').load('ajax.php?c=Peliculas&f=vistaRegistro');
       

 }
 function eliminar(){
	$("#elimina").modal('show');
	
	// $('#contenido').empty();
	// $('#contenido').load('ajax.php?c=Peliculas&f=vistaRegistro');
       

 }
 
 function editar(){
 	$("#editar").modal('show');
 	$('#contenido').load('ajax.php?c=Peliculas&f=listarPelis');
 }
 
 
$(function() {

  
  jQuery('#seleccionarImagen').on('change', function(e) {
    var Lector,
    oFileInput = this;
    
    if (oFileInput.files.length === 0) {
      return;
    };
    
    Lector = new FileReader();
    Lector.onloadend = function(e) {
      jQuery('#vistaPrevia').attr('src', e.target.result);          
    };
    Lector.readAsDataURL(oFileInput.files[0]);
    
  });
  
   $('#crearpeli').on('click', function() { 
    
		    var btnguardar = $(this);
		    btnguardar.button("loading");
		     if(!$("#titulo").val() || !$("#sinopsis").val() || !$("#resena").val() )
		      {
		        
		        alert("Faltan campos.");
		        btnguardar.button('reset');
		        return false;
		      } else{
		      	var datosfrm = new FormData(document.getElementById('formagregar'));
				  $.ajax({
				    type: "POST",
				    url: "ajax.php?c=Peliculas&f=agregarPeli",
				    data: datosfrm,
				    processData: false,
				    contentType: false,
				    success: function(respuesta){
				      alert(respuesta);
				      window.location = 'index.php?c=Peliculas&f=nueva';
				
				    },
				    error: function(error){
				    }
				  });
		      }
  	});
  
  
});


 
