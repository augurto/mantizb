<?php
	/* Connect To Database*/
		require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
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
			<form class="form-horizontal" method="post" id="guardar_programa" name="guardar_programa">
			<div id="resultados_ajax"></div>
			 	<label>Nombre del material</label>
			  <div class="input-group mb-3">

                  <div class="input-group-prepend">
                    <span class="input-group-text"><span class="icon-books"></span></span>
                  </div>
                  <input type="text" class="form-control" name="obra" placeholder="Nombre del programa">
                </div>

                <label>Unidad</label>
			  <div class="input-group mb-3">

                  <div class="input-group-prepend">
                    <span class="input-group-text"><span class="icon-books"></span></span>
                  </div>
                  
                  <select>
                        <option class="form-control" name="obra" value="0">Seleccione:</option>
                        
                        <?php
                        $mysqli = new mysqli('localhost', 'u415020159_mantizb', '', '');
                        $query = $mysqli -> query ("SELECT * FROM undad");
                        while ($valores = mysqli_fetch_array($query)) {
                            echo '<option value="'.$valores[id].'">'.$valores[unidad].'</option>';
                        }
                        ?>
                  </select>
                  <label>SELECT 1 (Continentes)</label>
                    <select id="lista1" name="lista1">
                        <option value="0">Selecciona una opcion</option>
                        <option value="1">America</option>
                        <option value="2">Asia</option>
                        <option value="3">Europa</option>
                        <option value="4">Africa</option>
                    </select>
                    <br>
                    <div id="select2lista"></div>
                  <input type="text" value="<?php echo $valores[nombre_unidad]?>" >
                </div>

                <label>Nombre de la unidad</label>
			  <div class="input-group mb-3">

                  <div class="input-group-prepend">
                    <span class="input-group-text"><span class="icon-books"></span></span>
                  </div>
                  <input type="text" class="form-control" name="obra" placeholder="Nombre del programa">
                </div>

                <label>Fecha</label>
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
<script type="text/javascript">
	$(document).ready(function(){
		$('#lista1').val(1);
		recargarLista();

		$('#lista1').change(function(){
			recargarLista();
		});
	})
</script>
<script type="text/javascript">
	function recargarLista(){
		$.ajax({
			type:"POST",
			url:"datos.php",
			data:"continente=" + $('#lista1').val(),
			success:function(r){
				$('#select2lista').html(r);
			}
		});
	}
</script>