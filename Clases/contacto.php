<?php
include_once 'clases/metodoscrud.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $remitente = $_POST['remitente'];
    $mensaje = $_POST['mensaje'];

    $metodoscrud = new metodoscrud();

    $metodoscrud->insertarContacto($remitente, $mensaje);

    $_SESSION['message'] = "Mensaje enviado correctamente";
    header('Location: contacto.php');
    exit();
}
?>
