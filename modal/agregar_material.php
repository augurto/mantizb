<?php
	/* Connect To Database*/
		require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
 ?>
	 <div class="modal fade" id="nuevoMat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-cm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class='fa fa-file'></i> Nuevo Material</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div> 
        <div class="modal-body">
			<form class="form-horizontal" action="insert_agregar_material_obra.php" method="post" >
			<div id="resultados_ajax"></div>
			 	<label>Nombre del Material</label>
			  <div class="input-group mb-3">

                  <div class="input-group-prepend">
                    <span class="input-group-text"><span class="icon-books"></span></span>
                  </div>
                  <select class='mi-selector' >
                        <option class="form-control" name="id_material" id="id_material" value="0">Seleccione:</option>
                        
                        <?php
                        
                        $query = $mysqli -> query ("SELECT * FROM materiales");
                        while ($valores = mysqli_fetch_array($query)) {
                            echo '<option value="'.$valores['id'].'">'.$valores['nombre_material'].'</option>';
                        }
                        ?>
                  </select>
                </div>
            </div>

		  <div class="modal-footer">
      <div id="resultados_ajax"></div>
			 	<label>Unidad del Material</label>
			  <div class="input-group mb-3">

                  <div class="input-group-prepend">
                    <span class="input-group-text"><span class="icon-books"></span></span>
                  </div>
                  <select>
                        <option class="form-control" name="unidad" id="unidad" value="0">Seleccione:</option>
                        
                        <?php
                        
                        $query = $mysqli -> query ("SELECT * FROM undad");
                        while ($valores = mysqli_fetch_array($query)) {
                            echo '<option value="'.$valores['id'].'">'.$valores['nombre_unidad'].' - '.$valores['unidad'].'</option>';
                        }
                        ?>
                  </select>
                </div>
            </div>

		  <div class="modal-footer">
      <div id="resultados_ajax"></div>
			 	<label>Cantidad de Material</label>
			  <div class="input-group mb-3">

                  <div class="input-group-prepend">
                    <span class="input-group-text"><span class="icon-books"></span></span>
                  </div>
                  <input type="text" class="form-control" name="cantidad" placeholder="Cantidad del material">
                </div>
            </div>

		  <div class="modal-footer">

      <div id="resultados_ajax"></div>
			 <!-- 	<label>id_obra del Material</label> -->
         <br>
			  <div class="input-group mb-3">

                  <div class="input-group-prepend">
                    <span class="input-group-text"><span class="icon-books"></span></span>
                  </div>
                  <input type="text" class="form-control" name="id_obra" value="<?php echo $_GET['id']?>">
                </div>
            </div>

		  <div class="modal-footer">

      <div id="resultados_ajax"></div>
			 	<label>Fecha de ingreso del Material</label>
			  <div class="input-group mb-3">

                  <div class="input-group-prepend">
                    <span class="input-group-text"><span class="icon-books"></span></span>
                  </div>
                  <input type="date" value="<?php echo date('Y-m-d'); ?>" class="form-control" name="fecha" >
                </div>
            </div>

		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary" id="guardar_datos">Guardar datos</button>
		  </div>
		  </form>
		    </div>
    </div>
  </div>
</div>