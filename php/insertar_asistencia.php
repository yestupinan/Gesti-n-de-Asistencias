<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el código QR enviado mediante POST
    $codigo = mysqli_real_escape_string($conexion, $_POST['codigo']);

    //Consulta de inserción
    $insertar = "INSERT INTO historial (Id_asistencia, Asistencia_estudiante_codigo, FECHA, HORA) 
                 VALUES (49,'$codigo', CURDATE(), CURTIME())";

    // Ejecutar la consulta
    if (mysqli_query($conexion, $insertar)) {
        echo "Registro insertado exitosamente.";
    } else {
        echo "Error al insertar el registro: " . mysqli_error($conexion);
    }

    // Cerrar la conexión
    mysqli_close($conexion);
} else {
    echo "Método de solicitud no válido.";
}
?>