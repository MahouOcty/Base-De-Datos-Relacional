<?php 
	include "Datos/conexion.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="es">



<head>
	<title>Agregar</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<link rel="stylesheet"  href="styles.css">
	

	<!-- media="only screen and (max-width: 768px)" -->
	<meta name="viewport" content="width=device-width, user -scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<style type="text/css">
	
	</style>
	<meta name="generator" content="Geany 1.22" />
</head>


<body>

	<style> 
        body{
            background-image: url(Imagenes/background.jpg);
            background-repeat: no-repeat;   
        }
    </style>

	<div class="contenedor">


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



<form id="f_blob" action="Acciones/guardar_blob.php" method="POST" enctype="multipart/form-data">

<!-- Campo para subir datos del Experimento-->

	<div class="datosExperimento">	
		<table>
			<h1>Datos del Experimento</h1>
			<TR>
				<label >Nombre Experimentador:</label>
				<select name="Experimentador">
					<?php
						$experimentadores = $mysqli -> query("select * from experimentador");
						while ($experimentador = mysqli_fetch_array($experimentadores)){
							echo "<option value=",$experimentador['IdExperimentador'],">",$experimentador["NExperimentador"],"</option>";
						}
					?>
				</select>
			</TR>
			<TR>
				<label >Resultados:</label>
				<select name="Resultados">
					<?php
						$resultados = $mysqli -> query("select * from resultado");
						while ($resultado = mysqli_fetch_array($resultados)){
							echo "<option value=",$resultado['IdResultado'],">",$resultado["Resultado"],"</option>";
						}
					?>
				</select>
			</TR>
			<TR>	
				<label for="fname">Lugar:</label>
				<select name="LugarExperimento">
					<?php
						$lugares = $mysqli -> query("select * from lugar");
						while ($lugar = mysqli_fetch_array($lugares)){
							echo "<option value=",$lugar['idLugar'],">",$lugar["NombreLugar"],"</option>";
						}
					?>
			</TR>
			<TR>
				<label for="fname">Genero del Participante:</label>
				<select name="GeneroParticipante">
					<?php
							$generos = $mysqli -> query("select * from genero");
							while ($genero = mysqli_fetch_array($generos)){
								echo "<option value=",$genero['IdGenero'],">",$genero["Genero"],"</option>";
							}
						?>
				</select>
				<!-- <input type="text" name="GeneroParticipante" placeholder="Genero del participante" /> -->
			</TR>
			<TR>
				<label>Fecha del Experimento: </label>
				<label><input type="date" name="Fecha" /></label>
			</TR>
			<TR>
				<label>Video del Experimento: </label>
				<div id="div_file">
					
					<p id="texto">Seleccionar Video</p>
					<input type="file" id="btn_enviar" accept="video/*" name="Video" />
				</div>
			</TR>
			<TR>
				<label>Observacion en Audio: </label>
				<div id="div_file">
					
					<p id="texto">Seleccionar Audio</p>
					<input type="file" id="btn_enviar" accept="audio/*" name="ObsAudio" />
				</div>
			</TR>
		</table>
		<input type="submit" value="SUBIR"/>
	</br>

	</div>
	



		
		
	</div>
</body>
</html>