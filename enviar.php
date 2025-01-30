<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpMailer/Exception.php';
require 'phpMailer/PHPMailer.php';
require 'phpMailer/SMTP.php';
include_once 'clases/metodoscrud.php';


$remitente = $_POST["remitente"];
$mensaje = $_POST["mensaje"];


$metodoscrud = new metodoscrud();


$metodoscrud->insertarContacto($remitente, $mensaje);


$mail = new PHPMailer(true);

try {

    $mail->SMTPDebug = 0;                      
    $mail->isSMTP();                            
    $mail->Host       = 'cp7014.webempresa.eu'; 
    $mail->SMTPAuth   = true;                  
    $mail->Username   = 'tucorreo@dominio.com'; 
    $mail->Password   = 'Alumno123@';           
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; 
    $mail->Port       = 465;                    

    $receptor = "cliente@segundodedaw.es";
    $mail->setFrom($remitente, 'Pringao');   
    $mail->addAddress($receptor);            

    $mail->addReplyTo($remitente, 'Respuesta a');

    $asunto = "Problema"; 
    $mail->isHTML(true);  
    $mail->Subject = $asunto;
    $mail->Body    = nl2br($mensaje); 
   
    $mail->send();
    echo '¡Mensaje enviado a '.$receptor.'! </br>';
    
    session_start();
    $_SESSION['message'] = "¡Mensaje enviado correctamente!";
    header('Location: contacto.php');
    exit();

} catch (Exception $e) {
    echo "El mensaje no pudo ser enviado. Error del Mailer: {$mail->ErrorInfo}";
}
?>
