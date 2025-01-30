<?php 
    include 'includes/sesion.php';
    ?>
<link rel="stylesheet" href="css/navAdmin.css">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Admin Panel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto parte1nav">
                <li class="nav-item"><a class="nav-link" href="administrarslider.php">Slider</a></li>
                <li class="nav-item"><a class="nav-link" href="productosadmin.php">Producto</a></li>
                <li class="nav-item"><a class="nav-link" href="anadirproducto.php">Añadir Productos</a></li>
                <li class="nav-item"><a class="nav-link" id="excel" href="excel.php">Descargar Excel</a></li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item text-light me-3">
                    <span class="nav-link disabled " id="textoUsuario">Bienvenido, <?= htmlspecialchars($usuario->getNombre()); ?></span>
                </li>
                <li class="nav-item partefinal">
                    <a class="btn btn-danger" href="cerrarSesion.php">Cerrar Sesión</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>