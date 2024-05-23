<?php
include("conexion.php");

$insertar="INSERT INTO historial(Id_asistencia, Asistencia_estudiante_codigo, FECHA, HORA) 
           VALUES (1,1, CURDATE(), CURTIME());";

$ejecutar=mysqli_query($conn,$insertar);

?>