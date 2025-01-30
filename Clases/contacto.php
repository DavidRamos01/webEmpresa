<?php
include_once 'clases/metodoscrud.php';

// Verificar si se enviaron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $remitente = $_POST['remitente'];
    $mensaje = $_POST['mensaje'];

    // Crear una instancia de metodoscrud
    $metodoscrud = new metodoscrud();

    // Insertar el contacto en la base de datos
    $metodoscrud->insertarContacto($remitente, $mensaje);

    // Redirigir con mensaje de éxito
    $_SESSION['message'] = "Mensaje enviado correctamente";
    header('Location: contacto.php');
    exit();
}
?>
