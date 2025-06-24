<?php
include_once 'src/db/conn.php';
include_once 'src/models/propiedades.php';
include_once 'src/models/localidades.php';
include_once 'src/models/tiposPropiedad.php';
include_once 'src/models/servicios.php';
include_once 'src/models/comodidades.php';
$conexion = Conexion::conectar();
$propiedadesModel = new Propiedades($conexion);
$serviciosModel = new Servicios($conexion);
$comodidadesModel = new Comodidades($conexion);
$propiedad = $propiedadesModel->getFrontDataById($_GET['id']);
$precio = $propiedadesModel->getPrecioPropiedadById($_GET['id']);
$imagenes = $propiedadesModel->getImagenesByPropiedadId($_GET['id']);
$servicios = $serviciosModel->getServiciosByPropiedadId($_GET['id']);
$comodidades = $comodidadesModel->getComodidadesByPropiedadId($_GET['id']);
$index = 0;
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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body class="bg-light">

    <?php include_once 'modules/nav.php'; ?>

    <div class="container py-5 mt-5">
        <div class="row">
            <!-- Título, ubicación y precio -->
            <div class="col-lg-8">
                <h2 class="text-verde fw-bold"><?= $propiedad[0]['titulo'] ?></h2>
                <p><i class="bi bi-geo-alt-fill text-secondary"></i> <?= $propiedad[0]['zona'] . ', ' . $propiedad[0]['localidad'] ?></p>
            </div>
            <div class="col-lg-4 text-lg-center mt-3 mt-lg-0">
                <h4 class="text-verde-oscuro fw-bold bg-light d-inline-block px-3 py-2 rounded shadow-sm">
                    <?= $precio[0]['moneda'] == 1 ? '$' : 'u$s' ?> <?= number_format($precio[0]['precio'], 2, ',', '.') ?>
                </h4>
            </div>
        </div>

        <div class="row mt-4">
            <!-- Imagen principal y miniaturas -->
            <div class="col-lg-8">
                <!-- Carrusel principal -->
                <div id="carouselPropiedad" class="carousel slide mb-3 shadow rounded overflow-hidden" data-bs-ride="carousel" style="height: 450px;">
                    <div class="carousel-inner h-100">
                        <?php foreach ($imagenes as $imagen) : ?>
                            <div class="carousel-item h-100 <?= $imagen['es_principal'] == 1 ? 'active' : '' ?>">
                                <img src="assets/img/propiedades/<?= $imagen['imagen'] ?>" class="d-block w-100 h-100 object-fit-cover" alt="Foto propiedad">
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselPropiedad" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselPropiedad" data-bs-slide="next">
                        <span class="carousel-control-next-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>
                        <span class="visually-hidden">Siguiente</span>
                    </button>
                </div>

                <!-- Miniaturas -->
                <div class="d-flex justify-content-center gap-2">
                    <?php foreach ($imagenes as $imagen) : ?>
                        <img src="assets/img/propiedades/<?= $imagen['imagen'] ?>" class="img-thumbnail thumbnail-selector" data-bs-target="#carouselPropiedad" data-bs-slide-to="<?= $index ?>" style="width: 100px; height: 70px; object-fit: cover; cursor: pointer;">
                        <?php $index++; ?>
                    <?php endforeach; ?>

                </div>
            </div>



            <!-- Detalles del inmueble -->
            <div class="col-lg-4 mt-4 mt-lg-0 ">
                <div class="bg-verde-oscuro text-white rounded p-3 shadow-sm">
                    <h5 class="fw-bold mb-3">Detalles del Inmueble</h5>
                    <p class="mb-1">Superficie: <strong><?= $propiedad[0]['superficie'] ?> m²</strong></p>
                    <p class="mb-1">Metros Cubiertos: <strong><?= $propiedad[0]['superficie_cubierta'] ?? '0' ?> m²</strong></p>
                    <p class="mb-0">Código: <strong><?= $propiedad[0]['codigo'] ?></strong></p>
                </div>
            </div>
        </div>

        <!-- Descripción -->
        <div class="row mt-5">
            <div class="col-lg-8">
                <h5 class="text-verde-oscuro fw-bold mb-3">Descripción</h5>
                <p>
                    <?= $propiedad[0]['descripcion'] ?>
                </p>

                <!-- Servicios -->
                <h5 class="fw-bold mt-4 text-verde-oscuro">Servicios</h5>
                <div class="d-flex gap-4 mt-2">
                    <?php foreach ($servicios as $servicio) : ?>
                        <span><i class="<?= $servicio['fa_icon']; ?> text-verde-oscuro me-1"></i> <?= $servicio['descripcion'] ?></span>
                    <?php endforeach; ?>
                </div>
                <!-- Comodidades -->
                <h5 class="fw-bold mt-4 text-verde-oscuro">Comodidades</h5>
                <div class="d-flex gap-4 mt-2">
                    <?php foreach ($comodidades as $comodidad) : ?>
                        <span><i class="<?= $comodidad['fa_icon']; ?> text-verde-oscuro me-1"></i> <?= $comodidad['descripcion'] ?></span>
                    <?php endforeach; ?>
                </div>

                <!-- Mapa -->
                <div class="mt-5">
                    <h4 class="fw-bold mb-3 text-center text-verde-oscuro">Ubicación</h4>
                    <div class="ratio ratio-16x9">
                        <?= $propiedad[0]['maps_url'] ?>
                    </div>
                </div>
            </div>

            <!-- Formulario de contacto -->
            <div class="col-lg-4 mt-5 mt-lg-0">
                <div class="border border-2 rounded p-4 shadow-sm bg-verde-oscuro">
                    <h5 class="text-white fw-bold mb-3">Formulario de Contacto</h5>
                    <form>
                        <input type="text" class="form-control mb-3" placeholder="Nombre y Apellido">
                        <input type="tel" class="form-control mb-3" placeholder="Teléfono">
                        <input type="email" class="form-control mb-3" placeholder="Email">
                        <textarea class="form-control mb-3" rows="4" placeholder="Mensaje"></textarea>
                        <button type="submit" class="btn btn-marron fw-bold shadow w-100">Enviar Mensaje</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <section class="border-top border-dark-subtle">
        <?php include_once "modules/footer.html"; ?>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>

</body>

</html>