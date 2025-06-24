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
                <h2 class="text-verde fw-bold">Terreno con vista a las Sierras</h2>
                <p><i class="bi bi-geo-alt-fill text-secondary"></i> Altos de Merlo, San Luis</p>
            </div>
            <div class="col-lg-4 text-lg-center mt-3 mt-lg-0">
                <h4 class="text-verde-oscuro fw-bold bg-light d-inline-block px-3 py-2 rounded shadow-sm">u$s 45.000</h4>
            </div>
        </div>

        <div class="row mt-4">
            <!-- Imagen principal y miniaturas -->
            <div class="col-lg-8">
                <!-- Carrusel principal -->
                <div id="carouselPropiedad" class="carousel slide mb-3 shadow rounded overflow-hidden" data-bs-ride="carousel" style="height: 450px;">
                    <div class="carousel-inner h-100">
                        <div class="carousel-item active h-100">
                            <img src="/assets/img/casa1.jpg" class="d-block w-100 h-100 object-fit-cover" alt="Foto 1">
                        </div>
                        <div class="carousel-item h-100">
                            <img src="/assets/img/casa2.jpg" class="d-block w-100 h-100 object-fit-cover" alt="Foto 2">
                        </div>
                        <div class="carousel-item h-100">
                            <img src="/assets/img/casa3.jpg" class="d-block w-100 h-100 object-fit-cover" alt="Foto 3">
                        </div>
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
                    <img src="/assets/img/casa1.jpg" class="img-thumbnail thumbnail-selector" data-bs-target="#carouselPropiedad" data-bs-slide-to="0" style="width: 100px; height: 70px; object-fit: cover; cursor: pointer;">
                    <img src="/assets/img/casa2.jpg" class="img-thumbnail thumbnail-selector" data-bs-target="#carouselPropiedad" data-bs-slide-to="1" style="width: 100px; height: 70px; object-fit: cover; cursor: pointer;">
                    <img src="/assets/img/casa3.jpg" class="img-thumbnail thumbnail-selector" data-bs-target="#carouselPropiedad" data-bs-slide-to="2" style="width: 100px; height: 70px; object-fit: cover; cursor: pointer;">
                </div>
            </div>



            <!-- Detalles del inmueble -->
            <div class="col-lg-4 mt-4 mt-lg-0 ">
                <div class="bg-verde-oscuro text-white rounded p-3 shadow-sm">
                    <h5 class="fw-bold mb-3">Detalles del Inmueble</h5>
                    <p class="mb-1">Superficie: <strong>1.200 mts</strong></p>
                    <p class="mb-1">Metros Cubiertos: <strong>-</strong></p>
                    <p class="mb-0">Código: <strong>CC208T</strong></p>
                </div>
            </div>
        </div>

        <!-- Descripción -->
        <div class="row mt-5">
            <div class="col-lg-8">
                <h5 class="text-verde-oscuro fw-bold mb-3">Descripción</h5>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipiscing elit vel eu montes, curae fusce est per tempor habitasse
                    sollicitudin convallis accumsan. Tempor blandit eget duis dapibus hendrerit suscipit eu magnis laoreet, hac
                    orci augue enim accumsan semper malesuada convallis ultricies et ante.
                </p>

                <!-- Servicios -->
                <h5 class="fw-bold mt-4 text-verde-oscuro">Servicios</h5>
                <div class="d-flex gap-4 mt-2">
                    <span><i class="bi bi-droplet-fill text-verde-oscuro me-1"></i> Agua</span>
                    <span><i class="bi bi-lightbulb-fill text-verde-oscuro me-1 "></i> Luz</span>
                    <span><i class="bi bi-fire text-verde-oscuro me-1"></i> Gas Natural</span>
                </div>

                <!-- Mapa -->
                <div class="mt-5">
                    <h4 class="fw-bold mb-3 text-center text-verde-oscuro">Ubicación</h4>
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d708.4270719360266!2d-65.01625867945259!3d-32.36913851087354!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95d2e3eefc633565%3A0xb1ecbc477aea83d2!2sCOSTA%20COMECHING%C3%93N!5e0!3m2!1ses-419!2sar!4v1749139440808!5m2!1ses-419!2sar" width="600" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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