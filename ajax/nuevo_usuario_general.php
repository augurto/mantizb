<?php
require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
$usuario = $_POST["usuario"];
$password = $_POST["pass"];
$sha1 = sha1($password);

$sql=" INSERT INTO usuarios (username , password, pass2) VALUES ('$usuario', '$sha1', '$sha1')";

        if (mysqli_query($conn, $sql)) {
            echo "Usuario Registrado";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
?>