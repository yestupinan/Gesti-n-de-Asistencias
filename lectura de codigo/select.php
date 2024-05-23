<?php
include("../php/conexion.php");
$query=mysqli_query($conexion,"SELECT Nombre_materia FROM materia");
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <form action="">
        <select name="materia">
            <?php   while($datos = mysqli_fetch_array($query))
                {             
            ?>
                <option value="1"><?php echo $datos['Nombre_materia']?></option>
            <?php
                }
            ?>
                                
        </select>
    </form>
</head>
<body>
    
</body>
</html>