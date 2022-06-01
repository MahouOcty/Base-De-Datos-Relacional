<?php 
	include "Datos/conexion.php";
	?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

	<head>
		<title>Visualizar</title>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<link rel="stylesheet"  href="styles.css">

		<!-- media="only screen and (max-width: 768px)" -->
		<meta name="viewport" content="width=device-width, user -scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<style type="text/css">
		
		</style>
		<meta name="generator" content="Geany 1.22" />
	</head>

	



<body>
	
<div class="contenedor">

		<style> 
        body{
            background-image: url(Imagenes/background.jpg);
            background-repeat: no-repeat;   
        }
   		</style>

		<div class="encabezado">

			<img src="Imagenes/logo.png" >
			</a>
			
			<a href="#default" class="logo">Club Penguin</a>
			
			<div class="header-right">
			
				<a href="index.php">INICIO</a>
				<a href="info.php">INFO</a>
				<a href="agregar.php">AGREGAR</a>
			
			</div>
		</div>
		
	</div>

	<div class= "tabla">
	<table>
	<tr>
		<thead>
			
			<td>Fecha</td>
			<td>Experimentador</td> 
			<td>Resultado</td>
			<td>Lugar</td>
			<td>Genero del Participante</td>
			<td>Video</td>
			<td>Observación de Audio</td>
		</thead>
	</tr>
	<?php
		include 'Datos/conexion.php';
		$experimentos=$mysqli->query(
			"SELECT
				experimento.IdExperimento,
				experimentador.NExperimentador,
				resultado.Resultado,
				lugar.NombreLugar,
				genero.Genero,
				experimento.Fecha,
				experimento.Video,
				experimento.ObsAudio
			FROM
				experimento,
				experimentador,
				resultado,
				lugar,
				genero
			WHERE
				experimento.IdExperimentador = experimentador.IdExperimentador AND experimento.IdResultado = resultado.IdResultado AND experimento.IdResultado = resultado.IdResultado AND experimento.idLugar = lugar.idLugar AND experimento.idLugar = lugar.idLugar AND experimento.IdGenero = genero.IdGenero");
		while ($experimento= mysqli_fetch_array($experimentos)) {
	?>
	
	<tr class= "tablaVisualizar">
		<td><?php echo $experimento['Fecha'];?></td>
		<td><?php echo $experimento['NExperimentador'];?></td> 
		<td><?php echo $experimento['Resultado'];?></td>
		<td><?php echo $experimento['NombreLugar'];?></td> 
		<td><?php echo $experimento['Genero'];?></td>
		<td><?php echo '<video height="144" width="auto" controls src="data:video/mp4;base64,'.base64_encode($experimento["Video"]).'"/>';?></td>
		<td><?php echo '<audio controls src="data:audio/mpeg;base64,'.base64_encode($experimento["ObsAudio"]).'"/>';?></td>
		
		<!-- <td>
			<?php
				if(strpos($producto['Tipo'],'image/')===0){
					echo '<img height="80" width="80" src="data:image/jpeg;base64,'.base64_encode($producto["Imagen"]).'"/>';	
				}elseif(strpos($producto['Tipo'],'audio/')===0){
					echo '<audio controls src="data:audio/mpeg;base64,'.base64_encode($producto["Imagen"]).'"/>';
				}elseif(strpos($producto['Tipo'],'video/')===0){
					echo '<video width="600" height="400" controls src="data:video/mp4;base64,'.base64_encode($producto["Imagen"]).'"/>';
				}
			?>
		</td> -->
	</tr>
	<?php
	}
	?>
	</table>
	</div>

	

</body>
</html>