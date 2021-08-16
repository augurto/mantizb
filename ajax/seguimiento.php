<?php
session_start();
if (empty($_FILES["exampleInputFile"]["name"])) {
           $errors[] = "Documento vacío";
        } else if (!empty($_FILES["exampleInputFile"]["name"])){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		$codigo=mysqli_real_escape_string($con,(strip_tags($_GET["cd"],ENT_QUOTES)));
		$cdd=mysqli_real_escape_string($con,(strip_tags($_GET["cdd"],ENT_QUOTES)));
		$nomb=mysqli_real_escape_string($con,(strip_tags($_GET["nom"],ENT_QUOTES)));
		$username=$_SESSION["username"];
		 $g=mysqli_query($con,"SELECT * FROM miembros WHERE email='".$username."'");
                   $rw=mysqli_fetch_array($g);
                    $id_miem=$rw["id"];





			$descripcion=mysqli_real_escape_string($con,(strip_tags($_GET["descripcion"],ENT_QUOTES)));
			$target_dir="../entregables/$cdd";
				$image_name = basename($_FILES["exampleInputFile"]["name"]);
				$target_file = $target_dir . $image_name;
				$imageFileZise=$_FILES["exampleInputFile"]["size"];

		$sql2 = "SELECT * FROM seguimientos WHERE id_seg = '" . $nomb . "' &&  id_miembros = '" . $id_miem . "';";
                $query_check_user_name = mysqli_query($con,$sql2);
				$query_check_user=mysqli_num_rows($query_check_user_name);
                if ($query_check_user == 20) {
                    $errors[] = "Lo sentimos , ya se a entregado esta actividad 19 veces.";
                } else {
		$sql="INSERT INTO seguimientos (codigo_proyecto, documento, id_seg, descripcion, id_miembros) VALUES ('$cdd', '$image_name', '$nomb','$descripcion','$id_miem')";
		$query_new_insert = mysqli_query($con,$sql);
		

		if (mysqli_query($conn, $sql)) {

			if(!file_exists($target_dir)){
				mkdir($target_dir,0777,true);
				if(file_exists($target_dir)){
					if(move_uploaded_file($guardado, $target_dir.'/'.$cdd)){
						echo "Archivo guardado con exito";
					}else{
						echo "Archivo no se pudo guardar";
					}
			
				}
			}else{
				if(move_uploaded_file($guardado, $target_dir.'/'.$cdd)){
				
					echo "Archivo guardado con exito";
				}else{
					echo "Archivo no se pudo guardar o no seleciono ningun archivo";
				}
			}
			/* header("Location: ver_entregables.php?var1=$direccion"); */
			header("Location: ver_entregables.php?id_p=$target_dir&id_est=$codigo");
			exit;
			
			}

		/* 	
			if ($query_new_insert){
					move_uploaded_file($_FILES["exampleInputFile"]["tmp_name"], $target_file);
				$messages[] = "Ingresado satisfactoriamente.";
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
			} */
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
				<div class="alert alert-info" role="alert">
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