
$(document).ready(function(){
	$("#login").click(function(){
		if(validarFormulario("frm")){
			$.ajax({
				type: "POST",
			  	url: path_servidor + "/ajax.php?c=seguridad&f=login",
			  	dataType: "json",
			  	data: { usuario: $("#usuario").val(), contrasena: $("#contrasena").val() },
			  	success: function(respuesta){
			  		if(respuesta.status !== undefined && respuesta.status == true){
			  			window.location.reload(true);
			  		}else{
			  			mensajeIcono("error", "Un momento...", respuesta.mensaje, function(){});
			  		}
			  	},
			  	error: function(error){
			  		mensajeIcono("error", "Un momento...", "No se ha podido completar esta accion, por favor intentalo nuevamente", function(){});
			  	}
			});
		}
	});
});

$(document).keypress(function(e){
	if(e.which == 13){
		$("#login").click();
	}
});
