<?php 
session_start();
include_once 'Clases/metodoscrud.php';
include_once 'Clases/usuario.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];

    $metodos = new metodoscrud();
    $usuario = $metodos->login($nombre, $password);

    if ($usuario) {
        $_SESSION['usuario'] = serialize($usuario);
    
        header("Location: administrarslider.php");
        exit();
    } else {
        echo "Error: Usuario o contraseña incorrectos.";
    }
}
?>