<?php
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	
 $cd=$_GET['cd'];
 $habita=$_SESSION['usermane'];
  $p=mysqli_query($con,"select * from proyecto where id='".$cd."'");
$rws=mysqli_fetch_array($p);
                      $codigo=$rws["codigo"];
                      ?>
<option value="">--Seleccione el entregable--</option>
					 <?php
										$ent=mysqli_query($con,"select * from entregables where codigo_proyecto='".$codigo."'");
										while ($rw=mysqli_fetch_array($ent)){
											$id=$rw["id"];
											$nombre=$rw["nombre"];
											?>
											<option value="<?php echo $id?>"><?php echo $nombre?></option>
											<?php
										}
									?>

<option value="">--Seleccione el entregable2--</option>
<?php
										$ent2=mysqli_query($con,"select * from miembros where nombre='".$habita."'");
										while ($rw=mysqli_fetch_array($ent2)){
											$id2=$rw["id"];
											$nombre2=$rw["nombre"];
											?>
											<option value="<?php echo $id2?>"><?php echo $nombre2?></option>
											<?php
										}
									?>