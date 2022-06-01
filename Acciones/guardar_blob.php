<?php
include '../Datos/conexion.php';

$experimentador = $_POST[Experimentador];
$resultado = $_POST[Resultados];
$lugar = $_POST[LugarExperimento];
$genero = $_POST[GeneroParticipante];
$fecha = $_POST[Fecha];
$video = addslashes(file_get_contents($_FILES['Video']['tmp_name']));
$audio = addslashes(file_get_contents($_FILES['ObsAudio']['tmp_name']));

$experimento = $mysqli->query("INSERT INTO experimento(IdExperimentador, idResultado, idLugar, IdGenero, Fecha, Video, ObsAudio) VALUES ('$experimentador','$resultado','$lugar','$genero','$fecha','$video','$audio')");


if($experimento){
    echo "<script> alert ('Correcto, Datos Guardados');
    location.href = '../Agregar.php';
    </script>";
}
else{
    echo "<script> alert ('Incorrecto');
    location.href = '../Agregar.php';
    </script>";
}

?> 

<!-- /* $IdExperimentador = "2";
$NExperimentador = "AYUDA"; */
/* $image = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
$video = addslashes(file_get_contents($_FILES['video']['tmp_name']));
$audio = addslashes(file_get_contents($_FILES['audio']['tmp_name']));

$observacion =$_POST[Observacion];
$fecha = $_POST[Fecha]; */

/* $IdExperimentadors=$mysqli->query("insert into experimentadors (NExperimentador) VALUES ('$NExperimentador'");
header("location:../");  */

/* mysqli_query($conexion,"INSERT INTO experimentador (NExperimentador) VALUES ($NExperimentador)"); */ -->




<!-- ,Imagen,Video,Audio,Observacion,Fecha) -->

<!-- ,'$image','$video','$audio','$observacion','$fecha') --> 