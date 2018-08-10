

$(document).ready(function(){
     

	$("#loginadmin").on('click', function() { 
		var btnguardar = $(this);
      	btnguardar.button("loading");
      	
      	$.post("ajax.php?c=Peliculas&f=accesoAdmin",{
      		usuario:$("#usuario").val(),
      		clave:$("#clave").val()
      	},function(r){
      		if(r==0){
      			alert("Usuario o clave incorrectos!");
      		}else{
      			window.location ="http://localhost/IAinteractive3/index.php?c=Peliculas&f=principaladmin";
      		}
      		btnguardar.button('reset');
     	 });


     });
});