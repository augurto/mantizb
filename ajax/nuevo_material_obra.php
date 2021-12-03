<?php
	if (empty($_POST['material'])) {
           $errors[] = "Nombre vacío";
        } else if (!empty($_POST['material'])){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		$material=mysqli_real_escape_string($con,(strip_tags($_POST["material"],ENT_QUOTES)));
        $unidad=mysqli_real_escape_string($con,(strip_tags($_POST["unidad"],ENT_QUOTES)));
        $unidad2=mysqli_real_escape_string($con,(strip_tags($_POST["unidad"],ENT_QUOTES)));
        $cantidad=mysqli_real_escape_string($con,(strip_tags($_POST["cantidad"],ENT_QUOTES)));
        $id_obra=mysqli_real_escape_string($con,(strip_tags($_POST["id_obra"],ENT_QUOTES)));
        $fecha=mysqli_real_escape_string($con,(strip_tags($_POST["fecha"],ENT_QUOTES)));
        

		$sql2 = "SELECT * FROM materiales WHERE nombre_material = '" . $material . "';";
                $query_check_user_name = mysqli_query($con,$sql2);
				$query_check_user=mysqli_num_rows($query_check_user_name);

                if ($query_check_user == 1) {
                    $errors[] = "Lo sentimos , el material ya está agregado.";
                } else {
		$sql="INSERT INTO materiales (nombre_material,unidad,id_unidad, cantidad, id_obra,fecha,fecha_hoy, usuario) VALUES ('$material','$unidad','$unidad2','$cantidad', '$id_obra','$fecha', now(),'$username')";
		$query_new_insert = mysqli_query($con,$sql);
			if ($query_new_insert){
				$messages[] = "Ingresado satisfactoriamente.";
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
			}
		}
		} else {
			$errors []= "Error desconocido.";
		}
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>