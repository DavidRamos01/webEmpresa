<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpMailer/Exception.php';
require 'phpMailer/PHPMailer.php';
require 'phpMailer/SMTP.php';




$mail = new PHPMailer(true);





$remitente = $_POST["remitente"];
$detalles = $_POST["detalles"];

try {

    $mail->SMTPDebug = 0;                     
    $mail->isSMTP ();                                           
    $mail->Host       = 'cp7014.webempresa.eu';                     
    $mail->SMTPAuth   = true;                                  
    $mail->Username   = $remitente;                    
    $mail->Password   = 'Alumno123@';                             
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
    $mail->Port       = 465;                                  

    //Recipients
    $receptor = "cliente@segundodedaw.es";
    $mail->setFrom('$remitente', 'Pringao');
    $mail->addAddress($receptor);     

 

    //Content
    $asunto = "Problema";
    $mail->isHTML(true);                         
    $mail->Subject = $asunto;
    $mail->Body    = $detalles;

    $mail->send();
    echo 'Message enviado a'.$receptor."! </br>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>