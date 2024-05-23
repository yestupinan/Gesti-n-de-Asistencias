<?php
    include('conexion.php');    

    $usuario=$_POST['usuario'];
    $contrasena=$_POST['contrasena'];

    $consulta = mysqli_query($conexion,"SELECT usuario, contrasena FROM usuarios WHERE usuario='$usuario' and contrasena='$contrasena'");

    if(mysqli_num_rows($consulta)>0){
        header("location:../pag_principal.php");
        exit;
    }else{
        echo'
            <script>
                alert("Usuario no exite, por favor verifique los datos introducidos");
                window.location = "../index.php";
            </script>
        ';
        exit;


    }

?>