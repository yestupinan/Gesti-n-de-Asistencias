<?php
include("conexion.php");

$consulta="SELECT * FROM asistencia ORDER BY id DESC LIMIT 1;";
$ejecutar=mysqli_query($conexion, $consulta);
$mostrar = mysqli_fetch_array($ejecutar);

?>