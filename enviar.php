<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpMailer/Exception.php';
require 'phpMailer/PHPMailer.php';
require 'phpMailer/SMTP.php';
include_once 'clases/metodoscrud.php';

// Obtener datos del formulario
$remitente = $_POST["remitente"];
$mensaje = $_POST["mensaje"];

// Crear instancia de metodoscrud para insertar en la base de datos
$metodoscrud = new metodoscrud();

// Insertar los datos en la base de datos
$metodoscrud->insertarContacto($remitente, $mensaje);

// Crear instancia de PHPMailer para enviar el correo
$mail = new PHPMailer(true);

try {
    // Configuración de SMTP
    $mail->SMTPDebug = 0;                      // Desactivar la depuración
    $mail->isSMTP();                            // Usar SMTP
    $mail->Host       = 'cp7014.webempresa.eu'; // Servidor SMTP
    $mail->SMTPAuth   = true;                   // Activar autenticación SMTP
    $mail->Username   = 'tucorreo@dominio.com'; // Tu dirección de correo
    $mail->Password   = 'Alumno123@';           // Tu contraseña de correo
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Cifrado SMTP
    $mail->Port       = 465;                    // Puerto SMTP

    // Destinatarios
    $receptor = "cliente@segundodedaw.es";
    $mail->setFrom($remitente, 'Pringao');   // Remitente, toma el valor del formulario
    $mail->addAddress($receptor);            // Dirección de destino

    // Respuesta
    $mail->addReplyTo($remitente, 'Respuesta a'); // Agregar la dirección de respuesta

    // Contenido del correo
    $asunto = "Problema"; 
    $mail->isHTML(true);  
    $mail->Subject = $asunto;
    $mail->Body    = nl2br($mensaje); // Convertir saltos de línea a <br>

    // Enviar el correo
    $mail->send();
    echo '¡Mensaje enviado a '.$receptor.'! </br>';
    
    // Redirigir a la página de contacto con un mensaje de éxito
    session_start();
    $_SESSION['message'] = "¡Mensaje enviado correctamente!";
    header('Location: contacto.php');
    exit();

} catch (Exception $e) {
    echo "El mensaje no pudo ser enviado. Error del Mailer: {$mail->ErrorInfo}";
}
?>
