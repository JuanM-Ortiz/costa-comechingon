<?php
include_once 'src/db/conn.php';
include_once 'src/models/banners.php';
include_once 'src/models/propiedades.php';
$conexion = Conexion::conectar();
$bannersModel = new Banners($conexion);
$propiedadesModel = new Propiedades($conexion);
$banners = $bannersModel->getBanners(true);
$propiedadesDestacadas = $propiedadesModel->getPropiedadesConPrecio(null, null, true);
$conexion = null;

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Costa Comechingón</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-light">

  <!-- Header -->
  <?php include_once 'modules/nav.php'; ?>

  <!-- Hero -->
  <section>
    <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <?php foreach ($banners as $index => $banner): ?>
          <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
            <div class="d-flex align-items-center justify-content-center text-center"
              style="min-height: 100vh; background: rgba(0,0,0,0.5); background-image: url('assets/img/<?= $banner['img'] ?>'); background-size: cover; background-position: center;">
              <!-- Overlay -->
              <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.5); z-index: 1;"></div>

              <!-- Contenido -->
              <div class="container position-relative text-white" style="z-index: 2;">
                <h1 class="display-4 fw-bold"><?= $banner['titulo'] ?></h1>
                <p class="lead"><?= $banner['descripcion'] ?></p>
                <a href="#" class="btn btn-marron px-4 py-2 mt-3 shadow fw-bold rounded-pill">
                  Ver Lotes Disponibles
                </a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- Controles -->
      <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
      </button>
    </div>

  </section>

  <h2 class="text-center pt-5 mb-4 text-verde-oscuro">Propiedades Destacadas</h2>
  <?php include_once 'modules/propiedadesMuestrario.php'; ?>

  <?php include_once 'modules/nuestraHistoria.html'; ?>

  <?php include_once 'modules/footer.html'; ?>
  <div class="whatsapp-floating hidden">
    <a href="https://wa.me/5492664757332" target="_blank" class="mx-3 text-verde">
      <i class="fab fa-whatsapp fa-6x footer-icon"></i>
    </a>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/script.js"></script>
</body>

</html>