<?php 
$codigo_proyecto=$_GET["codigo_proyecto"];
$nombre_documento=$_FILES['documento']['name'];
$guardado=$_FILES['documento']['tmp_name'];
$id_entregable=$_GET["id_entregable"];
$descripcion=$_GET["descripcion"];
$id_miembro=$_GET["id_miembro"];

$est=$_GET["id_miembro"];


$direccion=$_GET["id_p2"]; /* codigo de proyecto */
$carpeta='../entregables/'.$codigo_proyecto.'/'.$id_entregable;
/* $carpeta='archivos/proyectos/'.$direccion; */

$nombre_usuario=$_SESSION["username"];
/* $id_miembro=$_GET["id_miembro"]; */



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
 
echo "Connected successfully";
/* $sql2 = "SELECT * FROM seguimientos WHERE id_seg = '" . $nomb . "' &&  id_miembros = '" . $id_miem . "';"; */

				
$sql = "INSERT INTO seguimientos (codigo_proyecto, documento,id_seg,descripcion,id_miembros) VALUES ('$codigo_proyecto', '$nombre_documento','$id_entregable','$descripcion','$id_miembro')";

if (mysqli_query($conn, $sql)) {

if(!file_exists($carpeta)){
	mkdir($carpeta,0777,true);
	if(file_exists($carpeta)){
		if(move_uploaded_file($guardado, $carpeta.'/'.$nombre_documento)){
			echo "Archivo guardado con exito";
		}else{
			echo "Archivo no se pudo guardar";
		}

	}
}else{
	if(move_uploaded_file($guardado, $carpeta.'/'.$nombre_documento)){
	
        echo "Archivo guardado con exito";
	}else{
		echo "Archivo no se pudo guardar o no seleciono ningun archivo";
	}
}
/* header("Location: ver_entregables.php?var1=$direccion"); */
header("Location: ver_entregables.php?id_p=$nombre_documento&id_est=$id_miembro");
exit;

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>