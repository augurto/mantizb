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
$usuario=$_POST["usuario"];
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 
echo "Connected successfully";
 
$sql = "INSERT INTO materiales_obra /* (id_material, id_unidad, cantidad, id_obra, fecha, fecha_hoy, usuario)  */
VALUES ('1', '2', '3', '3','0000-00-00','0000-00-00','ego')";
/* VALUES ('$id_material', '$unidad', '$cantidad', '$id_obra','$fecha','$fecha2','$usuario')"; */
if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>