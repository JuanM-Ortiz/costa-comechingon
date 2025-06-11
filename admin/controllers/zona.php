<?php

include_once '../../src/db/conn.php';
include_once '../../src/models/zonas.php';

if ($_POST['eliminar'] && $_POST['eliminar'] != '') {

  $conexion = Conexion::conectar();

  $zonasModel = new Zonas($conexion);

  if ($zonasModel->eliminarPorId($_POST['eliminar'])) {
    echo 1;
  }
  $conexion = null;
}

if ($_POST['restaurar'] && $_POST['restaurar'] != '') {
  $conexion = Conexion::conectar();

  $zonasModel = new Zonas($conexion);

  if ($zonasModel->restaurarPorId($_POST['restaurar'])) {
    echo 1;
  }

  $conexion = null;
}

if ($_POST['descripcion']) {
  $conexion = Conexion::conectar();
  $zonasModel = new Zonas($conexion);
  if ($_POST['zonaId']) {
    $zonasModel->editar($_POST['zonaId'], $_POST['descripcion']);
    echo 1;
    return;
  }

  $zonasModel->crear($_POST['descripcion']);
  echo 1;
  return;
}
