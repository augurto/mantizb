<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class='fa fa-user'></i><b> Editar Obra</b></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div> 
        <div class="modal-body">
        <form class="form-horizontal" method="post" id="editar_programa" name="editar_programa">
      <div id="resultados_ajax2"></div>
        <div class="form-group">
        <label for="mod_nombre" class="col-sm-6 control-label">Nombre de la Obra</label>
        <div class="col-sm-12">
          <input type="text" class="form-control" id="mod_programa" name="mod_programa"  required>
          <input type="hidden" name="mod_id" id="mod_id">
        </div>
        </div>

        <div class="form-group">
        <label for="mod_telefono" class="col-sm-3 control-label">Estado</label>
        <div class="col-sm-12">
          <select name="mod_estado"  id="mod_estado"  class="form-control">
          <option value="activo">Activo</option>
          <option value="inactivo">Inactivo</option>
          <option value="Terminado">Terminado</option>
          </select>
        </div>
        </div>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      <button type="submit" class="btn btn-primary" id="actualizar_datos">Actualizar datos</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>
