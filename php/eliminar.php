<?php

include("conexion.php");

$materia1 = $_POST["materia1"];
$fecha_eliminar = $_POST["fecha_eliminar"];

$eliminar="DELETE FROM asistencia WHERE Materia_id = $materia1 AND FECHA = '$fecha_eliminar'";
$ejecutar=mysqli_query($conexion, $eliminar);

if ($conexion->query($eliminar) === TRUE) {
            echo'
                <script>
                    alert("Asistencia Eliminada");
                    window.location = "../pag_principal.php";
                </script>
            ';
} else {
    echo "$fecha_eliminar";
    echo "Error al eliminar el registro: ";
}

?>