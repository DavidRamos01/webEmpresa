<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="css/index.css">
  <title>Inicio</title>
</head>

<body>
  <?php include 'includes/nav.php'; ?>
  <div class="titulo">
    <h1>TecnoGear</h1>
  </div>
  <div id="carouselExampleRide" class="carousel slide" data-bs-ride="true">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/slider1.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/slide2.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/slider3.jpeg" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <div class="container mt-5">
    <div class="row columnasServicio">
      <div class="col-12 subtituloServicios">
        <h2>Servicio que Ofrecemos</h2>
      </div>
    </div>
    <div class="row columnasServicio mt-5">
      <div class="col-3 servicio">
        <div class="img"><img class="imgServicio" src="img/ventas.jpg" alt=""></div>
        <div class="texto mt-4"> <h5>Venta de Equipos Informaticos a medida</h5><span>Ofrecemos una amplia variedad de ordenadores, desde modelos básicos hasta equipos de alto rendimiento.
Personaliza tu equipo con los componentes, software y periféricos que mejor se adapten a tus necesidades.
¡Consigue el ordenador perfecto para ti!</span></div>
       
      </div>
      <div class="col-3 servicio">
      <div class="img"><img class="imgServicio" src="img/asesoramiento.jpg" alt=""></div>
      <div class="texto mt-4"> <h5>Asesoramiento personalizado</h5><span>Nuestro equipo de expertos te ayudará a elegir los equipos y el software ideales para ti.
Te asesoraremos sobre las características técnicas de los productos y te daremos recomendaciones personalizadas.
¡Toma la mejor decisión con nuestra ayuda!</span></div>
      </div>
      <div class="col-3 servicio">
      <div class="img"><img class="imgServicio" src="img/soporte.jpg" alt=""></div>
      <div class="texto mt-4"> <h5>Soporte técnico</h5><span>Ofrecemos asistencia técnica en caso de problemas con tus equipos o software.
Puedes contactarnos por teléfono, correo electrónico o chat en línea.
¡Resolvemos tus dudas y problemas de forma rápida y eficiente!</span></div>
      </div>
    </div>
    <div class="row columnasServicio mt-5">
      <div class="col-3 servicio">
      <div class="img"><img class="imgServicio" src="img/mantenimiento.jpg" alt=""></div>
      <div class="texto mt-4"> <h5>Mantenimiento y reparación</h5><span>Realizamos mantenimiento preventivo y reparación de equipos averiados.
Contamos con técnicos cualificados que diagnosticarán y solucionarán cualquier problema.
¡Mantén tu equipo en perfectas condiciones!</span></div>
      </div>
      <div class="col-3 servicio">
      <div class="img"><img class="imgServicio" src="img/configuracion.png" alt=""></div>
      <div class="texto mt-4"> <h5>Configuración e instalación</h5><span>Recogemos tus equipos usados para su reciclaje o reutilización.
Contribuimos a reducir el impacto ambiental de los residuos electrónicos.
¡Deshazte de tus equipos antiguos de forma responsable!</span></div>
      </div>
      <div class="col-3 servicio">
      <div class="img"><img class="imgServicio" src="img/alquiler.jpg" alt=""></div>
      <div class="texto mt-4"> <h5>Alquiler de equipos</h5><span>Destrucción segura de datos de discos duros y otros dispositivos de almacenamiento.</span></div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <?php include 'includes/footer.php' ?>
</body>

</html>