<?php

include_once '../../src/db/conn.php';
include_once '../../src/models/propiedades.php';

if ($_POST['alta'] == 1) {

  $conexion = Conexion::conectar();

  $propiedadesModel = new Propiedades($conexion);

  if ($_POST['idPropiedad'] && !empty($_POST['idPropiedad'])) {
    editarPropiedad($conexion, $propiedadesModel, $_POST['idPropiedad']);
    echo 1;
    die;
  }

  $params = [
    'titulo' => $_POST['titulo'],
    'id_tipo_propiedad' => $_POST['tipoPropiedad'],
    'descripcion' => $_POST['descripcion'],
    'superficie_cubierta' => !empty($_POST['superficieCubierta']) ? $_POST['superficieCubierta'] : 0,
    'superficie' => !empty($_POST['superficie']) ? $_POST['superficie'] : 0,
    'pisos' => !empty($_POST['pisos']) ? $_POST['pisos'] : 0,
    'dormitorios' => !empty($_POST['dormitorios']) ? $_POST['dormitorios'] : 0,
    'baños' => !empty($_POST['baños']) ? $_POST['baños'] : 0,
    'id_localidad' => $_POST['localidad'],
    'id_zona' => $_POST['zona'],
    'maps_url' => $_POST['mapsUrl'],
    'video' => $_POST['video'],
    'es_destacada' => $_POST['destacada'] ?? 0,
  ];

  $idPropiedad = $propiedadesModel->crear($params);


  if ($idPropiedad) {

    if ($_FILES['imgPortada']['name'] && !empty($_FILES['imgPortada']['name'])) {
      $hora = date("YmdHis");
      $filename = $hora . $_FILES['imgPortada']['name'];
      $currentDir = __DIR__;
      $targetDir = dirname(dirname($currentDir)) . "/assets/img/propiedades/" . $idPropiedad;
      mkdir($targetDir, 0777, true);
      $location = $targetDir . "/" . $filename;
      if (!move_uploaded_file($_FILES['imgPortada']['tmp_name'], $location)) {
        return false;
      }
      $link = $filename;
      $propiedadesModel->asignarPortada($idPropiedad, $link);
    }

    $ambientes = json_decode($_POST['ambientes']);
    $servicios = json_decode($_POST['servicios']);
    $comodidades = json_decode($_POST['comodidades']);
    $tipoPublicacion = json_decode($_POST['tipoPublicacion']);

    if ($ambientes) {
      $propiedadesModel->crearAmbientesByPropiedadId($idPropiedad, $ambientes);
    }
    if ($servicios) {
      $propiedadesModel->crearServiciosByPropiedadId($idPropiedad, $servicios);
    }
    if ($comodidades) {
      $propiedadesModel->crearComodidadesByPropiedadId($idPropiedad, $comodidades);
    }

    foreach ($tipoPublicacion as $tipo) {
      if ($tipo == 'venta') {
        $propiedadesModel->crearVentaPropiedad($idPropiedad, $_POST['precioVenta']);
      }

      if ($tipo == 'alquiler') {
        echo $_POST['precioAlquiler'];
        $propiedadesModel->crearAlquilerPropiedad($idPropiedad, $_POST['precioAlquiler']);
      }
    }

    if ($_FILES['imagenes']) {
      $imagenes = [];
      $currentDir = __DIR__;
      $targetDir = dirname(dirname($currentDir)) . "/assets/img/propiedades/" . $idPropiedad;
      mkdir($targetDir, 0777, true);
      $c = 0;
      foreach ($_FILES['imagenes']['name'] as $file) {
        $imagenes[$c]['name'] = $file;
        $c++;
      }
      $c = 0;
      foreach ($_FILES['imagenes']['tmp_name'] as $file) {
        $imagenes[$c]['tmp_name'] = $file;
        $c++;
      }

      foreach ($imagenes as $imagen) {
        $filename = $hora . $imagen['name'];
        $location = $targetDir . "/" . $filename;
        if (!move_uploaded_file($imagen['tmp_name'], $location)) {
          return false;
        }
        $link = $filename;
        $propiedadesModel->asignarImagen($idPropiedad, $link);
      }
    }

    echo 1;
  }
  $conexion = null;
}

if ($_POST['loadDatatable'] == 1) {
  $conexion = Conexion::conectar();
  $propiedadesModel = new Propiedades($conexion);
  $propiedades = $propiedadesModel->getPropiedades(false);
  echo json_encode($propiedades);
  $conexion = null;
}


if ($_POST['eliminar'] && $_POST['eliminar'] != '') {

  $conexion = Conexion::conectar();

  $propiedadesModel = new Propiedades($conexion);
  $imagenes = $propiedadesModel->getImagenesByPropiedadId($_POST['eliminar']);
  if ($propiedadesModel->eliminarPorId($_POST['eliminar'])) {
    foreach ($imagenes as $imagen) {
      unlink(dirname(dirname(__DIR__)) . "/assets/img/propiedades/" . $_POST['eliminar'] . "/" . $imagen['imagen']);
    }
    rmdir(dirname(dirname(__DIR__)) . "/assets/img/propiedades/" . $_POST['eliminar']);
    echo 1;
  }

  $conexion = null;
}
if ($_POST['eliminarImagen'] && $_POST['eliminarImagen'] != '') {
  $conexion = Conexion::conectar();
  $propiedadModel = new Propiedades($conexion);
  $idPropiedad = $_POST['eliminarImagen'];
  $propiedadModel->eliminarImagen($idPropiedad, $_POST['imagenBorrar']);
  echo 1;
}
function editarPropiedad($conexion, $propiedadesModel, $idPropiedad)
{

  $params = [
    'titulo' => $_POST['titulo'],
    'id_tipo_propiedad' => $_POST['tipoPropiedad'],
    'descripcion' => $_POST['descripcion'],
    'superficie_cubierta' => !empty($_POST['superficieCubierta']) ? $_POST['superficieCubierta'] : 0,
    'superficie' => !empty($_POST['superficie']) ? $_POST['superficie'] : 0,
    'pisos' => !empty($_POST['pisos']) ? $_POST['pisos'] : 0,
    'dormitorios' => !empty($_POST['dormitorios']) ? $_POST['dormitorios'] : 0,
    'baños' => !empty($_POST['baños']) ? $_POST['baños'] : 0,
    'id_localidad' => $_POST['localidad'],
    'id_zona' => $_POST['zona'],
    'maps_url' => $_POST['mapsUrl'],
    'video' => $_POST['video'],
    'es_destacada' => $_POST['destacada'] ?? 0,
  ];

  $propiedadesModel->editar($idPropiedad, $params);


  if ($_FILES['imgPortada']['name'] && !empty($_FILES['imgPortada']['name'])) {
    if (!$propiedadesModel->esLaMismaImagenDePortada($idPropiedad, $_FILES['imgPortada']['name'])) {
      $hora = date("YmdHis");
      $filename = $hora . $_FILES['imgPortada']['name'];
      $currentDir = __DIR__;
      $targetDir = dirname(dirname($currentDir)) . "/assets/img/propiedades/" . $idPropiedad;
      mkdir($targetDir, 0777, true);
      $location = $targetDir . "/" . $filename;
      if (!move_uploaded_file($_FILES['imgPortada']['tmp_name'], $location)) {
        return false;
      }
      $link = $filename;
      $propiedadesModel->asignarPortada($idPropiedad, $link);
    }
  }

  $ambientes = json_decode($_POST['ambientes']);
  $servicios = json_decode($_POST['servicios']);
  $comodidades = json_decode($_POST['comodidades']);
  $tipoPublicacion = json_decode($_POST['tipoPublicacion']);

  if ($ambientes) {
    $propiedadesModel->crearAmbientesByPropiedadId($idPropiedad, $ambientes);
  }
  if ($servicios) {
    $propiedadesModel->crearServiciosByPropiedadId($idPropiedad, $servicios);
  }
  if ($comodidades) {
    $propiedadesModel->crearComodidadesByPropiedadId($idPropiedad, $comodidades);
  }

  foreach ($tipoPublicacion as $tipo) {
    if ($tipo == 'venta') {
      $propiedadesModel->crearVentaPropiedad($idPropiedad, $_POST['precioVenta']);
    }

    if ($tipo == 'alquiler') {
      $propiedadesModel->crearAlquilerPropiedad($idPropiedad, $_POST['precioAlquiler']);
    }
  }
  //editar esto
  if ($_FILES['imagenes']) {
    $imagenes = [];
    $currentDir = __DIR__;
    $targetDir = dirname(dirname($currentDir)) . "/assets/img/propiedades/" . $idPropiedad;
    mkdir($targetDir, 0777, true);
    $c = 0;
    foreach ($_FILES['imagenes']['name'] as $file) {
      $imagenes[$c]['name'] = $file;
      $c++;
    }
    $c = 0;
    foreach ($_FILES['imagenes']['tmp_name'] as $file) {
      $imagenes[$c]['tmp_name'] = $file;
      $c++;
    }

    foreach ($imagenes as $imagen) {
      $filename = $hora . $imagen['name'];
      $location = $targetDir . "/" . $filename;
      if (!move_uploaded_file($imagen['tmp_name'], $location)) {
        return false;
      }
      $link = $filename;
      $propiedadesModel->asignarImagen($idPropiedad, $link);
    }
  }
}
