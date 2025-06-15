<?php

include_once '../../src/db/conn.php';
include_once '../../src/models/servicios.php';

if ($_POST['eliminar'] && $_POST['eliminar'] != '') {

  $conexion = Conexion::conectar();

  $serviciosModel = new Servicios($conexion);

  if ($serviciosModel->eliminarPorId($_POST['eliminar'])) {
    echo 1;
  }
  $conexion = null;
}

if ($_POST['restaurar'] && $_POST['restaurar'] != '') {
  $conexion = Conexion::conectar();

  $serviciosModel = new Servicios($conexion);

  if ($serviciosModel->restaurarPorId($_POST['restaurar'])) {
    echo 1;
  }

  $conexion = null;
}

if ($_POST['descripcion']) {
  $conexion = Conexion::conectar();
  $serviciosModel = new Servicios($conexion);

  if ($_POST['faIcon']) {
    $faIcon = str_replace('selected', '', $_POST['faIcon']);
    $faIcon = str_replace('icon-option', '', $faIcon);
  }

  if ($_POST['servicioId']) {
    $serviciosModel->editar($_POST['servicioId'], $_POST['descripcion'], $faIcon);
    echo 1;
    return;
  }

  $serviciosModel->crear($_POST['descripcion'], $faIcon);
  echo 1;
  return;
}
