<?php

include_once '../../src/db/conn.php';
include_once '../../src/models/ambientes.php';

if ($_POST['eliminar'] && $_POST['eliminar'] != '') {

  $conexion = Conexion::conectar();

  $ambientesModel = new Ambientes($conexion);

  if ($ambientesModel->eliminarPorId($_POST['eliminar'])) {
    echo 1;
  }
  $conexion = null;
}

if ($_POST['restaurar'] && $_POST['restaurar'] != '') {
  $conexion = Conexion::conectar();

  $ambientesModel = new Ambientes($conexion);

  if ($ambientesModel->restaurarPorId($_POST['restaurar'])) {
    echo 1;
  }

  $conexion = null;
}

if ($_POST['descripcion']) {
  $conexion = Conexion::conectar();
  $ambientesModel = new Ambientes($conexion);
  if ($_POST['ambienteId']) {
    $ambientesModel->editar($_POST['ambienteId'], $_POST['descripcion']);
    echo 1;
    return;
  }

  $ambientesModel->crear($_POST['descripcion']);
  echo 1;
  return;
}
