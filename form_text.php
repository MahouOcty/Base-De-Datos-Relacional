<?php 
	include "Datos/conexion.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Base Multimedia</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<link rel="stylesheet" href="css/Estilos.css">
	<style type="text/css">
	body{background:dodgerblue;}
	</style>
	<meta name="generator" content="Geany 1.22" />
</head>
<body>
	<center><h1>Subir Imagenes (Almacenando en disco)</h1></center>
	<br/>
<form id="f_text" action="Acciones/guardar.php" method="post" enctype="multipart/form-data">
<table>
	<TR>
		<td><label>Nombre:</label></td>
		<td><label><input type="text" name="Nombre" /></label></td>
	</TR>
</table>
	<input type="file" name="foto" />
	<br/>
	<input type="submit" value="Subir"/>
	</form>
<table border="2px">
	<tr>
		<td>ID</td>
		<td>Nombre</td>
		<td>Imagen</td>
	</tr>
	<?php
		include 'Datos/conexion.php';
		$productos=$mysqli->query("select * from productos");
		while ($producto= mysqli_fetch_array($productos)) {
	?>
	
	<tr>
		<td><?php echo $producto['idProducto'];?></td>
		<td><?php echo $producto['Nombre'];?></td>
		<td><?php echo "<img class=\"imagen\" src=\""."Imagenes/".$producto['Imagen']."\"/>";?></td>
	</tr>
	<?php
	}
	?>
	</table>	
</body>
</html>