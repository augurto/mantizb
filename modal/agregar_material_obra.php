<?php
	/* Connect To Database*/
		require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code

        $mysqli = new mysqli('localhost', 'u415020159_mantizb', 'Mantizb*#17', 'u415020159_mantizb');
 ?>
	 <div class="modal fade" id="nuevoMaterial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-cm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class='fa fa-file'></i> Agregar Materiales a la OBra  <?php echo $_GET['nom']?></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div> 
        <div class="modal-body">
			<form class="form-horizontal" action="insert/insert_agregar_material_obra.php" method="post" id="guardar_programa" name="guardar_programa">
			<div id="resultados_ajax"></div>
			 	<label>Nombre del material</label>
			  <div class="input-group mb-3">

                  <div class="input-group-prepend">
                    <span class="input-group-text"><span class="icon-books"></span></span>
                  </div>
                  <select class='mi-selector' >
                        <option class="form-control" name="id_material" id="id_material" value="0">Seleccione:</option>
                        
                        <?php
                        
                        $query = $mysqli -> query ("SELECT * FROM materiales");
                        while ($valores = mysqli_fetch_array($query)) {
                            echo '<option value="'.$valores[id].'">'.$valores[nombre_material].'</option>';
                        }
                        ?>
                  </select>
                </div>

                <label>Unidad</label>
			  <div class="input-group mb-3">

                  <div class="input-group-prepend">
                    <span class="input-group-text"><span class="icon-books"></span></span>
                  </div>
                  
                  <select>
                        <option class="form-control" name="unidad" id="unidad" value="0">Seleccione:</option>
                        
                        <?php
                        
                        $query = $mysqli -> query ("SELECT * FROM undad");
                        while ($valores = mysqli_fetch_array($query)) {
                            echo '<option value="'.$valores[id].'">'.$valores[nombre_unidad].' - '.$valores[unidad].'</option>';
                        }
                        ?>
                  </select>
                  
                </div>

                <label>Cantidad</label>
			  <div class="input-group mb-3">

                  <div class="input-group-prepend">
                    <span class="input-group-text"><span class="icon-books"></span></span>
                  </div>
                  <input type="text" class="form-control" name="cantidad" placeholder="Nombre del programa">
                </div>


                <label>id_obra</label>
			  <div class="input-group mb-3">

                  <div class="input-group-prepend">
                    <span class="input-group-text"><span class="icon-books"></span></span>
                  </div>
                  <input type="text" class="form-control" name="id_obra" value="<?php echo $_GET['id']?>">
                </div>

                <label>Fecha</label>
			  <div class="input-group mb-3">

                  <div class="input-group-prepend">
                    <span class="input-group-text"><span class="icon-books"></span></span>
                  </div>
                  <input type="date" value="<?php echo date('Y-m-d'); ?>" class="form-control" name="fecha" >
                </div>
            </div>

            <label>Usuario</label>
			  <div class="input-group mb-3">

                  <div class="input-group-prepend">
                    <span class="input-group-text"><span class="icon-books"></span></span>
                  </div>
                  <input type="text" value="<?php echo $_POST['username'] ?>" class="form-control" name="usuario" >
                </div>
            </div>
           
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary" id="guardar_datos_mat_obra">Guardar datos</button>
		  </div>
		  </form>
		    </div>
    </div>
  </div>
</div>