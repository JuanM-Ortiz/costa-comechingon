<?php

include_once '../../src/db/conn.php';
include_once '../../src/models/comodidades.php';

if ($_POST['eliminar'] && $_POST['eliminar'] != '') {

  $conexion = Conexion::conectar();

  $comodidadesModel = new Comodidades($conexion);

  if ($comodidadesModel->eliminarPorId($_POST['eliminar'])) {
    echo 1;
  }
  $conexion = null;
}

if ($_POST['restaurar'] && $_POST['restaurar'] != '') {
  $conexion = Conexion::conectar();

  $comodidadesModel = new Comodidades($conexion);

  if ($comodidadesModel->restaurarPorId($_POST['restaurar'])) {
    echo 1;
  }

  $conexion = null;
}

if ($_POST['descripcion']) {
  $conexion = Conexion::conectar();
  $comodidadesModel = new Comodidades($conexion);
  if ($_POST['faIcon']) {
    $faIcon = str_replace('selected', '', $_POST['faIcon']);
    $faIcon = str_replace('icon-option', '', $faIcon);
  }
  if ($_POST['comodidadId']) {
    $comodidadesModel->editar($_POST['comodidadId'], $_POST['descripcion'], $faIcon);
    echo 1;
    return;
  }

  $comodidadesModel->crear($_POST['descripcion'], $facIcon);
  echo 1;
  return;
}
