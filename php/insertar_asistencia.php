<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el contenido JSON enviado
    $input = json_decode(file_get_contents('php://input'), true);

    // Obtener los valores del JSON
    $codigo = mysqli_real_escape_string($conexion, $input['codigo']);
    $id_asistencia = mysqli_real_escape_string($conexion, $input['id_asistencia']);

    //Consulta de inserción
    $insertar = "INSERT INTO historial (Id_asistencia, Asistencia_estudiante_codigo, FECHA, HORA) 
                 VALUES ('$id_asistencia','$codigo', CURDATE(), CURTIME())";

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