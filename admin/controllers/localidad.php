<?php

include_once '../../src/db/conn.php';
include_once '../../src/models/localidades.php';

if ($_POST['eliminar'] && $_POST['eliminar'] != '') {

  $conexion = Conexion::conectar();

  $localidadesModel = new Localidades($conexion);

  if ($localidadesModel->eliminarPorId($_POST['eliminar'])) {
    echo 1;
  }
  $conexion = null;
}

if ($_POST['restaurar'] && $_POST['restaurar'] != '') {
  $conexion = Conexion::conectar();

  $localidadesModel = new Localidades($conexion);

  if ($localidadesModel->restaurarPorId($_POST['restaurar'])) {
    echo 1;
  }

  $conexion = null;
}

if ($_POST['descripcion']) {
  $conexion = Conexion::conectar();
  $localidadesModel = new Localidades($conexion);
  if ($_POST['localidadId']) {
    $localidadesModel->editar($_POST['localidadId'], $_POST['descripcion']);
    echo 1;
    return;
  }

  $localidadesModel->crear($_POST['descripcion']);
  echo 1;
  return;
}
