<?php
require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
$usuario = $_POST["usuario"];
$pass = $_POST["pass"];
$sha1 = sha1($password);

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
 
echo "Se realizo la conexion  ";



$sql = "INSERT INTO usuarios (username , password, rol,codigo_proyecto, pass2) VALUES ('$usuario', '$sha1','Inv Principal','$usuario', '$pass')";

 
}
if (mysqli_query($conn, $sql)) {
      $insertar2 = "INSERT INTO miembros (nombre , grupo, rand, rol,rol2, estado) VALUES ('$usuario','51', '$pass','Investigador','$usuario', 'activo')";
      sleep(2);
      header("Location: ../login.php");
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        sleep(2);
      header("Location: ../login.php");
}
mysqli_close($conn);
?>


