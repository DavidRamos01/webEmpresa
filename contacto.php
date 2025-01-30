<?php
  include_once 'clases/metodoscrud.php';
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $remitente = $_POST['remitente'];
    $mensaje = $_POST['mensaje'];

  $metodoscrud = new metodoscrud();
    $metodoscrud->insertarContacto($remitente, $mensaje);


    header('Location: contacto.php');
    exit();
}
?>
<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Contacto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/footer.css">
  <style>

    body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
      color: #333;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      flex-direction: column;
    }

    h1 {
      font-size: 2.5rem;
      color: rgb(114, 173, 229);
      text-align: center;
      margin-bottom: 40px;
    }


    #contenedor {
      background-color: white;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
      width: 80%;
      max-width: 900px;
      padding: 30px;
    }

    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .form-group {
      width: 100%;
      margin-bottom: 20px;
    }

    label {
      font-size: 1.1rem;
      margin-bottom: 10px;
      color: #333;
    }

    input[type="email"],
    textarea {
      width: 100%;
      padding: 12px;
      font-size: 1rem;
      border-radius: 5px;
      border: 1px solid #ddd;
      box-sizing: border-box;
    }

    textarea {
      resize: vertical;
      min-height: 150px;
    }

    .form-button {
      text-align: center;
    }

    button {
      background-color: rgb(114, 173, 229);
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 5px;
      font-size: 1.2rem;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: rgb(45, 98, 154);
    }

  
    .mapa {
      margin-top: 40px;
      display: flex;
      justify-content: center;
    }

    iframe {
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }


  </style>
</head>
<body>
  <?php include 'includes/nav.php'; ?>
  <div id="contenedor" class="mt-5">
    <div class="container">
      <h1>Contáctanos</h1>
      <form method="POST" action="enviar.php" class="w-100">
        <div class="form-group">
          <label for="remitente">Remitente</label>
          <input type="email" id="remitente" name="remitente" placeholder="Ejemplo: ejemplo@gmail.com" required>
        </div>
        <div class="form-group">
          <label for="mensaje">Cuentanos tu problema en detalle</label>
          <textarea id="mensaje" name="mensaje" placeholder="Por favor, escribe aquí más información sobre tu problema..." required></textarea>
        </div>
        <div class="form-button">
          <button type="submit">Enviar</button>
        </div>
      </form>
    </div>

    <div class="mapa">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d760.2158744479879!2d-3.8503067988421744!3d40.34537399519033!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd418e948c400001%3A0x65ea604ecde95f6c!2sCDM%20Park%20West!5e0!3m2!1sen!2ses!4v1737376576646!5m2!1sen!2ses" width="800" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>

  <?php include 'includes/footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>

</html>
