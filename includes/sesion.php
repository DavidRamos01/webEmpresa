<?php
require_once "Clases/usuario.php";
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$usuario = unserialize($_SESSION['usuario']);
?>