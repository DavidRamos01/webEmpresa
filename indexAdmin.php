<?php
include 'includes/sesion.php';
include_once 'Clases/usuario.php';
include 'includes/navAdmin.php';
echo "Bienvenido, " . htmlspecialchars($usuario->nombre);

?>

