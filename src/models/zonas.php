<?php

class Zonas
{
  private $conexion;

  public function __construct($conexion)
  {
    $this->conexion = $conexion;
  }

  public function getZonas($all = false)
  {
    $query = "SELECT * FROM zonas";
    if (!$all) {
      $query .= ' WHERE deleted_at is null';
    }
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getZonaById($id)
  {
    $query = "SELECT * FROM zonas WHERE id = $id";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
  }

  public function eliminarPorId($idZona)
  {
    $query = "UPDATE zonas SET deleted_at = now() WHERE id = $idZona";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return true;
  }
  public function restaurarPorId($idZona)
  {
    $query = "UPDATE zonas SET deleted_at = null WHERE id = $idZona";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return true;
  }

  public function editar($idZona, $descripcion)
  {
    $query = "UPDATE zonas SET descripcion = '{$descripcion}'";

    $query .= " WHERE id = $idZona";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return true;
  }

  public function crear($descripcion)
  {
    $query = "INSERT INTO zonas (descripcion) VALUES ('{$descripcion}')";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return true;
  }
}
