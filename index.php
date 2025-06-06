<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Costa Comechingón</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-light">

  <!-- Header -->
  <?php include_once 'modules/nav.php'; ?>

  <!-- Hero -->
  <section class="hero d-flex align-items-center justify-content-center text-center text-white">
    <div class="container">
      <h1 class="display-4 fw-bold text-bordo">Lorem Imsup</h1>
      <p class="lead">Desarrollos inmobiliarios en el corazón de la Villa de Merlo</p>
      <a href="#" class="btn btn-light px-4 py-2 mt-3 shadow fw-bold rounded-pill">
        Ver Lotes Disponibles
      </a>

    </div>
  </section>

  <h2 class="text-center pt-5 mb-4">Propiedades Destacadas</h2>
  <?php include_once 'modules/propiedadesMuestrario.html'; ?>

  <?php include_once 'modules/nuestraHistoria.html'; ?>

  <?php include_once 'modules/footer.html'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="script.js"></script>
</body>

</html>