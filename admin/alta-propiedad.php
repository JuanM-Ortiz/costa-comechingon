<?php
session_start();

if (!$_SESSION['user']) {
  header("Location: index.php");
}

include_once '../src/db/conn.php';
include_once '../src/models/tiposPropiedad.php';
include_once '../src/models/localidades.php';
include_once '../src/models/zonas.php';
include_once '../src/models/ambientes.php';
include_once '../src/models/servicios.php';
include_once '../src/models/comodidades.php';

$conexion = Conexion::conectar();

$tiposPropiedadModel = new TiposPropiedad($conexion);
$localidadesModel = new Localidades($conexion);
$zonasModel = new Zonas($conexion);
$ambientesModel = new Ambientes($conexion);
$serviciosModel = new Servicios($conexion);
$comodidadesModel = new Comodidades($conexion);
$ambientesPropiedad = [];
$serviciosPropiedad = [];
$comodidadesPropiedad = [];

$tiposPropiedad = $tiposPropiedadModel->getTiposPropiedad(false);
$localidades = $localidadesModel->getLocalidades(false);
$zonas = $zonasModel->getZonas(false);
$ambientes = $ambientesModel->getAmbientes(false);
$servicios = $serviciosModel->getServicios(false);
$comodidades = $comodidadesModel->getComodidades(false);


if (!empty($_GET['id'])) {
  include_once '../src/models/propiedades.php';
  include_once 'src/models/tiposPropiedad.php';
  $propiedadModel = new Propiedades($conexion);
  $idPropiedad = $_GET['id'];
  $tipoPropiedadModel = new TiposPropiedad($conexion);
  $dataPropiedad = $propiedadModel->getPropiedadById($idPropiedad);
  $imagenes = $propiedadModel->getImagenesByPropiedadId($idPropiedad);
  $ambientesPropiedad = $ambientesModel->getAmbientesIdByPropiedadId($idPropiedad);
  $serviciosPropiedad = $serviciosModel->getServiciosIdByPropiedadId($idPropiedad);
  $comodidadesPropiedad = $comodidadesModel->getComodidadesIdByPropiedadId($idPropiedad);
  $precioVenta = $propiedadModel->getPrecioVentaById($idPropiedad);
  $precioAlquiler = $propiedadModel->getPrecioAlquilerById($idPropiedad);
  $mapsUrl = str_replace('"', "'", $dataPropiedad[0]['maps_url']);
  $video = str_replace('"', "'", $dataPropiedad[0]['video']);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Costa Comechingón - Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<?php include_once 'modules/navbar.html'; ?>
<style>
  input,
  textarea {
    color: black !important;
  }

  .form-control {
    border: var(--bs-border-width) solid var(--bs-border-color) !important;
  }
</style>

<body class="bg-grays-color">

  <div class="container vh-100 mt-5">
    <div class="d-flex mt-5 justify-content-between mb-3">
      <h5>Crear nueva propiedad</h5>
    </div>
    <div class="accordion" id="accordionExample">
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#datosProductoAccordion" aria-expanded="true" aria-controls="collapseOne">
            Datos de la propiedad
          </button>
        </h2>
        <div id="datosProductoAccordion" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <div class="row">
              <div class="mb-3 col-4">
                <input type="hidden" name="" id="idPropiedad" value="<?php echo $_GET['id']; ?>">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" value="<?= $dataPropiedad[0]['titulo']; ?>">
              </div>
              <div class="mb-3 col-4">
                <label for="imgPortada" class="form-label">Imagen de portada</label>
                <input class="form-control" accept="image/*" type="file" id="imgPortada">
              </div>
              <div class="mb-3 col-4 <?= $idPropiedad ? 'd-block' : 'd-none' ?>" id="previsualizacionPortadaDiv">
                <label for="imgPortada" class="form-label">Vista previa:</label>
                <img src="<?= '../assets/img/propiedades/' . $idPropiedad . '/' . $dataPropiedad[0]['imagen_portada'] ?>" id="previsualizacion" alt="" class="w-50 d-block mx-auto">
              </div>
              <div class="mb-3 col-12">
                <label for="descripcion" class="form-label">Información general</label>
                <textarea class="form-control" id="descripcion" rows="3" maxlength="3000"><?= $dataPropiedad[0]['descripcion']; ?></textarea>
              </div>
              <div class="mb-3 col-2">
                <label for="descripcion" class="form-label">Tipo de propiedad</label>
                <select class="form-select" id="tipoPropiedad" aria-label="Default select example">
                  <option selected disabled>Seleccione un tipo de propiedad...</option>
                  <?php foreach ($tiposPropiedad as $tipoPropiedad) : ?>
                    <option value="<?php echo $tipoPropiedad['id']; ?>" <?= $dataPropiedad[0]['id_tipo_propiedad'] == $tipoPropiedad['id'] ? 'selected' : '' ?>><?php echo $tipoPropiedad['descripcion']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="mb-3 col-2">
                <label for="superficie" class="form-label">Superficie</label>
                <input type="number" placeholder="en m2" class="form-control" id="superficie" min="0" step="1" value="<?= $dataPropiedad[0]['superficie']; ?>">
              </div>
              <div class="mb-3 col-2">
                <label for="superficieCubierta" class="form-label">Superficie cubierta</label>
                <input type="number" placeholder="en m2" class="form-control" id="superficieCubierta" min="0" step="1" value="<?= $dataPropiedad[0]['superficie_cubierta']; ?>">
              </div>
              <div class="mb-3 col-2">
                <label for="pisos" class="form-label">Pisos</label>
                <input type="number" placeholder="0" class="form-control" id="pisos" min="0" step="1" value="<?= $dataPropiedad[0]['pisos']; ?>">
              </div>
              <div class="mb-3 col-2">
                <label for="dormitorios" class="form-label">Dormitorios</label>
                <input type="number" placeholder="0" class="form-control" id="dormitorios" min="0" step="1" value="<?= $dataPropiedad[0]['dormitorios']; ?>">
              </div>
              <div class="mb-3 col-2">
                <label for="baños" class="form-label">Baños</label>
                <input type="number" placeholder="0" class="form-control" id="baños" min="0" step="1" value="<?= $dataPropiedad[0]['baños']; ?>">
              </div>
              <div class="mb-3 col-4">
                <label for="localidad" class="form-label">Localidad</label>
                <select class="form-select" id="localidad" aria-label="localidad">
                  <option selected disabled>Seleccione la localidad...</option>
                  <?php foreach ($localidades as $localidad) : ?>
                    <option value="<?php echo $localidad['id']; ?>" <?= $dataPropiedad[0]['id_localidad'] == $localidad['id'] ? 'selected' : '' ?>><?php echo $localidad['descripcion']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="mb-3 col-4">
                <label for="zona" class="form-label">Zona</label>
                <select class="form-select" id="zona" aria-label="zona">
                  <option selected disabled>Seleccione la zona...</option>
                  <?php foreach ($zonas as $zona) : ?>
                    <option value="<?php echo $zona['id']; ?>" <?= $dataPropiedad[0]['id_zona'] == $zona['id'] ? 'selected' : '' ?>><?php echo $zona['descripcion']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="mb-3 col-4">
                <label for="mapsUrl" class="form-label">URL Google Maps</label>
                <input type="text" class="form-control" id="mapsUrl" value='<?= $dataPropiedad[0]['maps_url']; ?>' />
              </div>
              <div class="mb-3 col-4">
                <label for="video" class="form-label">Video</label>
                <input type="text" class="form-control" id="video" value='<?= $dataPropiedad[0]['video'];; ?>' />
              </div>
              <div class="mb-3 col-4">
                <label for="tipoPublicacion" class="form-label d-block">Tipo de publicación</label>
                <div class="form-check form-check-inline mt-1">
                  <input class="form-check-input" type="checkbox" name="tipoPublicacion" value="venta" id="ventaCheck" <?= $precioVenta[0]['precio'] != null ? 'checked' : '' ?>>
                  <label class="form-check-label" for="flexCheckDefault">
                    Venta
                  </label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" name="tipoPublicacion" value="alquiler" id="alquilerCheck" <?= $precioAlquiler[0]['precio'] != null ? 'checked' : '' ?>>
                  <label class="form-check-label" for="flexCheckDefault">
                    Alquiler
                  </label>
                </div>
              </div>
              <div class="mb-3 col-2 <?= $precioVenta[0]['precio'] != null ? '' : 'd-none' ?>" id="precioVentaDiv">
                <label for="precioVenta" class="form-label">Precio de venta</label>
                <input type="number" min="0" class="form-control" id="precioVenta" value="<?= $precioVenta[0]['precio'] ?>">
              </div>
              <div class="mb-3 col-2 <?= $precioAlquiler[0]['precio'] != null ? '' : 'd-none' ?>" id="precioAlquilerDiv">
                <label for="precioAlquiler" class="form-label">Precio de alquiler</label>
                <input type="number" min="0" class="form-control" id="precioAlquiler" value="<?= $precioAlquiler[0]['precio'] ?>">
              </div>
              <div class="mb-3 col-4">
                <label for="tipoPublicacion" class="form-label d-block">Definir como destacada?</label>
                <select class="form-select" id="destacada" aria-label="destacada">
                  <option selected value="1">Si</option>
                  <option value="0">No</option>
                </select>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-4">
                <h5>Ambientes</h5>
                <?php

                foreach ($ambientes as $ambiente) : ?>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="ambientes" value="<?php echo $ambiente['id']; ?>" id="<?php echo 'ambiente' . $ambiente['id']; ?>" <?= in_array($ambiente['id'], $ambientesPropiedad) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="<?php echo 'ambiente' . $ambiente['id'] ?>">
                      <?php echo $ambiente['descripcion']; ?>
                    </label>
                  </div>
                <?php endforeach; ?>
              </div>
              <div class="col-4">
                <h5>Servicios</h5>
                <?php
                if (!is_array($serviciosPropiedad)) {
                  $serviciosPropiedad = [];
                }
                foreach ($servicios as $servicio) : ?>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="servicios" value="<?php echo $servicio['id']; ?>" id="<?php echo 'servicio' . $servicio['id']; ?>" <?= in_array($servicio['id'], $serviciosPropiedad) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="<?php echo 'servicio' . $servicio['id'] ?>">
                      <?php echo $servicio['descripcion']; ?>
                    </label>
                  </div>
                <?php endforeach; ?>
              </div>
              <div class="col-4">
                <h5>Comodidades</h5>
                <?php
                if (!is_array($comodidadesPropiedad)) {
                  $comodidadesPropiedad = [];
                }
                foreach ($comodidades as $comodidad) : ?>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="comodidades" value="<?php echo $comodidad['id']; ?>" id="<?php echo 'comodidad' . $comodidad['id']; ?>" <?= in_array($comodidad['id'], $comodidadesPropiedad) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="<?php echo 'comodidad' . $comodidad['id']; ?>">
                      <?php echo $comodidad['descripcion']; ?>
                    </label>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#imagenesAccordion" aria-expanded="false" aria-controls="collapseTwo">
            Imágenes
          </button>
        </h2>
        <div id="imagenesAccordion" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <div class="row">
              <div class="mb-3 col-6">
                <label for="imagenes" class="form-label">Seleccione las imagenes para agregar a la galeria...</label>
                <input class="form-control" accept="image/*" type="file" id="imagenes" multiple>
              </div>
              <div class="gallery mb-3"></div>
            </div>
            <?php if ($imagenes && !empty($imagenes)) { ?>
              <hr>
              <h5>Imagenes actuales</h5>
              <div class="row">
                <?php foreach ($imagenes as $imagen) : ?>
                  <div class="col-4 position-relative pe-0">
                    <img src="<?php echo "../assets/img/propiedades/" . $_GET['id'] . "/" . $imagen['imagen']; ?>" class="img-fluid mb-2 ">
                    <button class="btn btn-danger mb-2 position-absolute top-0 end-0" onclick="eliminarImagen('<?= $imagen['imagen'] ?>')"><i class="fa fa-trash"></i> Eliminar</button>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-4 pb-4">
      <div class="col-4 text-end offset-8">
        <button type="button" id="guardarPropiedad" class="btn btn-lg btn-success">Guardar</button>
      </div>
    </div>
  </div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="../assets/js/jquery.min.js"></script>

<script src="assets/js/alta-propiedad.js"></script>