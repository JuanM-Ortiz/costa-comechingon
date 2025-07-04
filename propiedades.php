<?php
include_once 'src/db/conn.php';
include_once 'src/models/propiedades.php';
include_once 'src/models/localidades.php';
include_once 'src/models/tiposPropiedad.php';
$conexion = Conexion::conectar();
$propiedadesModel = new Propiedades($conexion);
$localidadesModel = new Localidades($conexion);
$tiposPropiedadModel = new TiposPropiedad($conexion);
$localidades = $localidadesModel->getLocalidades();
$tiposPropiedad = $tiposPropiedadModel->getTiposPropiedad();
$paginaActual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$resultadosPorPagina = 9;
$inicio = ($paginaActual - 1) * $resultadosPorPagina;
$destacadas = isset($_GET['destacadas']) ? $_GET['destacadas'] : false;
if ($_GET['tipo_propiedad'] || $_GET['localidad']) {
    $propiedades = $propiedadesModel->getPropiedadesFiltered($_GET['localidad'], null, $_GET['tipo_propiedad'], $inicio, $resultadosPorPagina, $destacadas);
} else {
    $propiedades = $propiedadesModel->getPropiedadesConPrecio($inicio, $resultadosPorPagina);
}
if ($_GET['codigo']) {
    $propiedad = $propiedadesModel->getPropiedadByCodigo($_GET['codigo']);
    header("Location: propiedadDetalle.php?id=" . $propiedad[0]['id']);
}

$totalRegistros =  $propiedadesModel->getCantidadPropiedades();
$totalPaginas = ceil($totalRegistros / $resultadosPorPagina);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Costa Comechingón</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <?php include_once "modules/nav.php"; ?>

    <section class="text-center bg-light section-bajo-navbar">
        <div class="container">
            <h2 class="display-5 fw-bold text-verde-oscuro">Nuestras Propiedades</h2>
            <p class="lead text-verde-oscuro">
                Explora nuestra selección de propiedades en Merlo, San Luis y encuentra la que mejor se adapte a tus necesidades.
            </p>
        </div>
    </section>

    <?php include_once 'modules/propiedadesMuestrario.php'; ?>

    <?php include_once 'modules/footer.html'; ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>