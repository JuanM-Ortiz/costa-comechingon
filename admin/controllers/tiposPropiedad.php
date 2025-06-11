<?php

include_once '../../src/db/conn.php';
include_once '../../src/models/tiposPropiedad.php';

if ($_POST['eliminar'] && $_POST['eliminar'] != '') {

  $conexion = Conexion::conectar();

  $tiposPropiedadModel = new TiposPropiedad($conexion);

  if ($tiposPropiedadModel->eliminarPorId($_POST['eliminar'])) {
    echo 1;
  }
  $conexion = null;
}

if ($_POST['restaurar'] && $_POST['restaurar'] != '') {
  $conexion = Conexion::conectar();

  $tiposPropiedadModel = new TiposPropiedad($conexion);

  if ($tiposPropiedadModel->restaurarPorId($_POST['restaurar'])) {
    echo 1;
  }

  $conexion = null;
}

if ($_POST['descripcion']) {
  $conexion = Conexion::conectar();
  $tiposPropiedadModel = new TiposPropiedad($conexion);
  if ($_POST['tiposPropiedadId']) {
    $tiposPropiedadModel->editar($_POST['tiposPropiedadId'], $_POST['descripcion']);
    echo 1;
    return;
  }

  $tiposPropiedadModel->crear($_POST['descripcion']);
  echo 1;
  return;
}
