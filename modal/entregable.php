<?php
	/* Connect To Database*/
		require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
 ?>
	 <div class="modal fade" id="AgregarEntregable" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-cm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class='fa fa-file'></i> Nuevo Entregable</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div> 
        <div class="modal-body">
			<form action="../ajax/agregar_entregable.php" class="form-horizontal" method="post" id="guardar_programa" name="guardar_programa">
			<div id="resultados_ajax"></div>
			 	<label>Nombre del ENtregable</label>
			  <div class="input-group mb-3">

                  <div class="input-group-prepend">
                    <span class="input-group-text"><span class="icon-books"></span></span>
                  </div>
                  <input type="text" value="<?php echo $id_p;?>" id="codigo_proyecto" name="codigo_proyecto">
                  <input type="text" class="form-control" id="nombre_entregable" name="nombre_entregable" placeholder="Nombre del entregable" required>
                  <input type="date" name="fecha" id="fecha">
                  <input type="text" value="<?php echo $username;?>" id="usuario_seguimiento" name="usuario_seguimiento" class="form-control">
                </div>
            </div>

		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary" id="guardar_datos">Agregar entregable</button>
		  </div>
		  </form>
		    </div>
    </div>
  </div>
</div>