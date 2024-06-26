<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escaner QR</title>
    <link rel="stylesheet" href="css/escaner.css">
    <link rel="icon" href="img/escudo_unipamplona.jpg">

</head>
<body>
    <div class="container">
    <?php include("php/mostrar_datos.php");?>

        <h1>ESCANER</h1>
        <h6>ID DE ASISTENCIA: <span id="id_asistencia"><?php echo $mostrar['id'];?></span></h6>
        <h6>ID DE MATERIA: <span id="materiaid"><?php echo $mostrar['Materia_id'];?> </span></h6>
        <h6>ID DEL DOCENTE: <?php echo $mostrar['Asistencia_docente_codigo'];?></h6>
        <h6>FECHA: <?php echo $mostrar['FECHA'];?></h6>
        <h6>HORA: <?php echo $mostrar['HORA'];?></h6>
        
        <div id="reader" width="600px"></div>
        <div id="result">Esperando escaneo...</div>
        
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.2.1/html5-qrcode.min.js"></script>
    <script>
        function onScanSuccess(qrCodeMessage) {
            document.getElementById('result').innerText = 'Ultimo estudiante ingresado: ' + qrCodeMessage;
            let idAsistencia = document.getElementById('id_asistencia').innerText;
            let data = {
                    codigo: qrCodeMessage,
                    id_asistencia: idAsistencia
                    };
            fetch('php/insertar_asistencia.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                    /*body: 'codigo=' + encodeURIComponent(qrCodeMessage)*/
                    body: JSON.stringify(data)
            })
                .then(response => response.text())
                .then(data => {
                    console.log('Respuesta del servidor:', data);
                })
                    .catch(error => {
                    console.error('Error:', error);
                });
        }

        function onScanError(errorMessage) {
            // Puedes manejar errores aquí si es necesario
            console.error('Error de escaneo: ', errorMessage);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", { fps: 10, qrbox: 250 });

        html5QrcodeScanner.render(onScanSuccess, onScanError);
    </script>
</body>
</html>