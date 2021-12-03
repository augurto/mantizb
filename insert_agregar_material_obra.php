<?php
$servername = "localhost";
$database = "u415020159_mantizb";
$username = "u415020159_mantizb";
$password = "Mantizb*#17";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection

$id_material=$_POST["id_material"];
$unidad=$_POST["unidad"];
$cantidad=$_POST["cantidad"];
$id_obra=$_POST["id_obra"];
$fecha=$_POST["fecha"];
$fecha2=$_POST["fecha"];
$usuario="eguito";
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 
echo "Connected successfully";
 
$sql = "INSERT INTO materiales_obra (material, unidad, cantidad, id_obra, fecha, fecha_hoy, usuario) 
VALUES ('$id_material', '$unidad', '$cantidad', '$id_obra','$fecha','$fecha2','$usuario')";
if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>