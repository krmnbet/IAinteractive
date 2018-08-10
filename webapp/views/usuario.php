<div class="x_title">
  <div class="page-title">
    <div class="title_left">
      <h3>Administradores <small>| Listado de administradores del Dashboard</small></h3>
    </div>
    <ul class="nav navbar-right panel_toolbox">
      <li><a id="agregar_registro"><i class="fa fa-plus"></i></a></li>
    </ul>
  </div>
  <div class="clearfix"></div>
</div>
<div class="x_content x_contenido">

  <!-- Principal -->
  <table id="data_table" class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Usuario</th>
        <th>Permisos</th>
        <th>Editar</th>
        <th>Eliminar</th>
      </tr>
    </thead>
    <tbody id="data_table_body">
    </tbody>
  </table>

  <!-- Modal para agregar/editar -->
  <div id="modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Administradores</h4>
        </div>
        <div class="modal-body">
          <form id="frm">
            <div class="row">
              <div class="col-md-6">
                <label>Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control requerido" placeholder="Nombre">
              </div>
              <div class="col-md-6">
                <label>Usuario:</label>
                <input type="text" id="usuario" name="usuario" class="form-control requerido" placeholder="Usuario">
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label>Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" class="form-control requerido" placeholder="Contraseña">
              </div>
            </div>
            <input type="hidden" id="id" name="id" value="0" class="requerido">
          </form>
        </div>
        <div class="modal-footer">
          <button id="btn_guardar" type="button" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal para ver listado de permisos -->
  <div id="modal_complemento" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Permisos</h4>
        </div>
        <div class="modal-body">
          <table id="data_table_permisos" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Permiso</th>
                <th>Activo</th>
              </tr>
            </thead>
            <tbody id="data_table_body_permisos">
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>


