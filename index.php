<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" href="img/escudo_unipamplona.jpg">

</head>
<body>

    <form action="php/inicio_sesion.php" method="post" >

        <h2>INICIO DE SESION</h2>

        <input type="text" class="input" name="usuario" placeholder="Usuario">
        <input type="password" class="input" name="contrasena" placeholder="Contraseña">

        <div class="recordar">
            <a href="recordar_contrase.html">¿Olidaste la contraseña?</a>
        </div>
            
        <input name="btn_ingresar" type="submit" class="btn_1" value="INICIAR SESION">
        
            
    </form>


</body>
</html>