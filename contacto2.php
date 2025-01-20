<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envío del formulario</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #fab3ad;
            color: whitesmoke;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #102226;
            padding: 30px;
            border: 5px solid whitesmoke;
            border-radius: 10px;
            text-align: center;
        }

        h1 {
            color: black;
            margin-bottom: 20px;
        }

        h2 {
            color: whitesmoke;
            margin-bottom: 15px;
        }

        p {
            font-size: 16px;
            margin-bottom: 10px;
            color: #fefefe;
        }

        .success {
            color: rgb(39, 173, 117);
        }

        .error {
            color: #ff6961;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #9c3445;
            color: whitesmoke;
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #6a1f2a;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        $nombre = $_POST["nombre"];
        $telefono = $_POST["telefono"];
        $detalles = $_POST["detalles"];

        $destinatario = "cliente@segundodedaw.es";

        $asunto = "Nuevo mensaje de contacto del formulario";

        $cuerpo = '
            <html>
                <head>
                    <title>Nuevo mensaje de contacto</title>
                </head>
                <body>
                    <h2>Detalles del mensaje:</h2>
                    <p><strong>Nombre:</strong> ' . utf8_decode($nombre) . '</p>
                    <p><strong>Teléfono:</strong> ' . utf8_decode($telefono) . '</p>
                    <p><strong>Problema seleccionado:</strong> ' . utf8_decode($tipoProblema) . '</p>
                    <p><strong>Detalles del problema:</strong><br/>' . utf8_decode($detalles) . '</p>
                </body>
            </html>';

        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
        $headers .= "From: Nuevo cliente <ayuda@sabemoscomer.com>\r\n";
        $headers .= "Reply-To: ayuda@sabemoscomer.com\r\n";
        $headers .= "Return-path: ayuda@sabemoscomer.com\r\n";

        if (mail($destinatario, $asunto, $cuerpo, $headers)) {
            echo "<h1 class='success'>¡Petición enviada con éxito!</h1>";
            echo "<p>Gracias por contactarnos, <strong>" . htmlspecialchars($nombre) . "</strong>. Nos pondremos en contacto contigo pronto.</p>";
        } else {
            echo "<h1 class='error'>Error al enviar el correo.</h1>";
            echo "<p>Hubo un problema al intentar enviar tu mensaje. Por favor, inténtalo de nuevo más tarde.</p>";
        }
        ?>
        <a href="contacto.php">Volver al formulario</a>
    </div>
</body>

</html>