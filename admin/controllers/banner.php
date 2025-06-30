<?php

include_once '../../src/db/conn.php';
include_once '../../src/models/banners.php';

if ($_POST['eliminar'] && $_POST['eliminar'] != '') {
  $conexion = Conexion::conectar();
  $bannersModel = new Banners($conexion);
  if ($bannersModel->eliminarPorId($_POST['eliminar'])) {
    echo 1;
  }
  $conexion = null;
}

if ($_POST['restaurar'] && $_POST['restaurar'] != '') {
  $conexion = Conexion::conectar();
  $bannersModel = new Banners($conexion);
  if ($bannersModel->restaurarPorId($_POST['restaurar'])) {
    echo 1;
  }
  $conexion = null;
}

if ($_POST['getBanners']) {
  $conexion = Conexion::conectar();
  $bannersModel = new Banners($conexion);
  $banners = $bannersModel->getBanners(false);
  echo json_encode($banners);
  return;
}

if ($_POST['titulo'] != null && $_POST['titulo']) {
  $filename = null;

  if ($_FILES['img']['name'] && !empty($_FILES['img']['name'])) {
    $hora = date('his');
    $filename = $hora . $_FILES['img']['name'];
    $location = "../../assets/img/" . $filename;
    if (!move_uploaded_file($_FILES['img']['tmp_name'], $location)) {
      return false;
    }
  }

  $conexion = Conexion::conectar();
  $bannersModel = new Banners($conexion);
  if ($_POST['bannerId']) {
    $bannersModel->editar($_POST['bannerId'], $_POST['titulo'], $_POST['descripcion'], $filename);
    echo 1;
    return;
  }

  $bannersModel->crear($_POST['titulo'], $_POST['descripcion'], $filename);
  echo 1;
  return;
}
