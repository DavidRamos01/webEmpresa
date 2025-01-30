<?php
if (isset($_POST['eliminar'])) {
    $index = $_POST['index'];
    if (isset($_SESSION['carrito'][$index])) {
        unset($_SESSION['carrito'][$index]);
        $_SESSION['carrito'] = array_values($_SESSION['carrito']);
    }
}

$total = 0;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/nav.css">
    <title>Carrito de Compras</title>
    <style>
        .eliminar-item {
            background-color: transparent;
            border: none;
            color: #f44336; 
            font-size: 1.2rem;
            cursor: pointer;
        }

        .eliminar-item:hover {
            color: #d32f2f; 
        }
        .carrito-container {
            position: fixed;
            top: 0;
            right: -300px;
            width: 300px;
            height: 100%;
            background-color: #fff;
            box-shadow: -2px 0 10px rgba(0, 0, 0, 0.1);
            transition: right 0.3s ease-in-out;
            padding: 20px;
            overflow-y: auto;
            z-index: 1000;
            border-left: 2px solid rgb(114, 173, 229); 
            border-radius: 8px 0 0 8px; 
        }
        .total{
            margin-top: 10px;
        }
        .carrito-container.active {
            right: 0;
        }

        .carrito-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: rgb(114, 173, 229); 
            color: white;
            padding: 10px;
            border-radius: 8px 8px 0 0; 
        }

        .carrito-header h3 {
            margin: 0;
            font-size: 1.2rem;
        }

        #cerrar-carrito {
            background-color: transparent;
            border: none;
            font-size: 1.5rem;
            color: white;
            cursor: pointer;
            font-weight: bold;
        }

        #cerrar-carrito:hover {
            color: #f44336; 
        }

        .carrito-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #f9f9f9; 

            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
        }

        .carrito-item span {
            font-size: 1rem;
            color: #333;
        }

        .carrito-footer {
            text-align: center;
            margin-top: 20px;
        }

        .carrito-footer button {
            background-color: rgb(229, 114, 114);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .carrito-footer button:hover {
            background-color:rgb(197, 55, 55);
        }

        .carrito-count {
            position: absolute;
            top: 5px;
            right: 10px;
            background-color: red;
            color: white;
            padding: 3px 7px;
            border-radius: 50%;
            font-size: 0.9rem;
        }
        .carrito-container.active {
            background-color: rgb(250, 250, 250); 
        }
    </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" href="index.php"><img  class="logo" src="img/logo.png" alt=""></a>
          <a class="nav-link" aria-current="page" href="index.php">Inicio</a>
          <a class="nav-link" href="productos.php">Productos</a>
          <a class="nav-link" href="contacto.php">Contactos</a>
          <a class="nav-link carrito-icon" href="#" id="carrito-toggle">
            <img class="carrito" src="img/carrito.png" alt="">
            <span class="carrito-count"><?php echo isset($_SESSION['carrito']) ? count($_SESSION['carrito']) : 0; ?></span>
          </a>
        </div>
      </div>
    </div>
  </nav>

  <div id="carrito" class="carrito-container">
    <div class="carrito-header">
      <h3>Carrito</h3>
      <button id="cerrar-carrito">X</button>
    </div>
    <div id="carrito-contenido">
      <?php
      if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
          foreach ($_SESSION['carrito'] as $index => $item) {
              $total += $item['precio'] * $item['cantidad'];
              echo "<div class='carrito-item' data-index='{$index}'>
                      <span>{$item['nombre']}</span>
                      <span>{$item['cantidad']} unidades x {$item['precio']}€</span>
                      <form method='POST' style='display:inline;'>
                          <button class='eliminar-item' type='submit' name='eliminar' value='1' onclick='this.form.index.value={$index}'>X</button>
                          <input type='hidden' name='index' value=''>
                      </form>
                    </div>";
          }
          echo "<p class='total'>Total: " . number_format($total, 2, ',', '.') . "€</p>";
      } else {
          echo "<p>No hay productos en el carrito</p>";
      }
      ?>
      <div class="carrito-footer">
        <button class="btn btn-danger" onclick="window.location.href='#'">Ir a Pagar</button>
      </div>
    </div>
  </div>

  <script>
    document.getElementById('carrito-toggle').addEventListener('click', function () {
      document.getElementById('carrito').classList.toggle('active');
    });

    document.getElementById('cerrar-carrito').addEventListener('click', function () {
      document.getElementById('carrito').classList.remove('active');
    });
  </script>
</body>
</html>
