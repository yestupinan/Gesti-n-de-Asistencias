<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$materia = $_POST["materia"];
$codigo_docente = $_POST["codigo_docente"];

$sql1="INSERT INTO asistencia (id, Materia_id, Asistencia_docente_codigo, FECHA, HORA) 
        VALUES (NULL, $materia, $codigo_docente, CURDATE(), CURTIME());";

$ejecutar_insert_sql1=mysqli_query($conexion, $sql1);

    header("Location: ../escaner.php"); // Asegúrate de que la ruta sea correcta
    exit(); // Termina el script actual
}
?>
?>
