<?php 



$servername = "localhost";
$database = "u415020159_mantizb";
$username = "u415020159_mantizb";
$password = "Mantizb*#17";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 
$codigo_proyecto=mysqli_real_escape_string($conn,(strip_tags($_POST["codigo_proyecto"],ENT_QUOTES)));
$estado="Activo";
$fecha_entregable=mysqli_real_escape_string($conn,(strip_tags($_POST["fecha"],ENT_QUOTES)));
$nombre_entregable=mysqli_real_escape_string($conn,(strip_tags($_POST["nombre_entregable"],ENT_QUOTES)));
$usuario_seguimiento=mysqli_real_escape_string($conn,(strip_tags($_POST["usuario_seguimiento"],ENT_QUOTES)));




echo "Connected successfully";
/* $sql2 = "SELECT * FROM seguimientos WHERE id_seg = '" . $nomb . "' &&  id_miembros = '" . $id_miem . "';"; */

				
$sql = "INSERT INTO entregables (codigo_proyecto, nombre,fecha_entrega,estado,usuario) VALUES ('$codigo_proyecto', '$nombre_entregable','$fecha_entregable','$estado','$usuario_seguimiento')";

if (mysqli_query($conn, $sql)) {

echo "entregable agregado con exito";

/* header("Location: ver_entregables.php?var1=$direccion"); */
header("Location: ../t_entregables.php?id_p=$codigo_proyecto");
exit;

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>