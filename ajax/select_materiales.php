<?php
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	
 $cd=1;
 $habita=$_SESSION['usermane'];
  $p=mysqli_query($con,"select * from materiales");
$rws=mysqli_fetch_array($p);
                      $codigo=$rws["id"];
                      ?>
<option value="">--Seleccione Material--</option>
					 <?php
										$ent=mysqli_query($con,"select * from materiales ");
										while ($rw=mysqli_fetch_array($ent)){
											$id=$rw["nombre_material"];
											$nombre=$rw["unidad"];
											?>
											<option value="<?php echo $id?>"><?php echo $nombre?></option>
											<?php
										}
									?>
