var catalogo = "usuario";
var formulario = "frm";
var columnas_centradas = [ 2, 3, 4 ];

var tabla_modulo_permisos;

$(document).ready(function() {

  	tabla_modulo_permisos = $('#data_table_permisos').DataTable({
      	language: {
        	url: 'http://cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json'
      	},
      	"columnDefs": [
		    { className: "dt-body-center", "targets": [ 1 ] }
		]
  	});

});

function mostrarPermisos(identificador)
{
	$('#modal_complemento').off().on('shown.bs.modal', function () {
		popularTablaConParametros("permiso", { 'usuario': identificador }, tabla_modulo_permisos);
	}).modal({backdrop: 'static', keyboard: false, show: true});
}


