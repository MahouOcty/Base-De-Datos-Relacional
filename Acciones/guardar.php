<?php
include '../Datos/conexion.php';
$ruta = "../Imagenes/";
opendir($ruta);
$destino = $ruta.$_FILES['foto']['name'];
copy($_FILES['foto']['tmp_name'],$destino);
$nombre=$_FILES['foto']['name'];
$productos=$mysqli->query("insert into productos(Nombre,Imagen)values('$_POST[Nombre]','$nombre')");
	header("location:../"); 
?>
