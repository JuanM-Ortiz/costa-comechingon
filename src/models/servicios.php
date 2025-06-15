<?php

class Servicios
{
  private $conexion;

  public function __construct($conexion)
  {
    $this->conexion = $conexion;
  }

  public function getServicios($all = false)
  {
    $query = "SELECT * FROM servicios";
    if (!$all) {
      $query .= ' WHERE deleted_at is null';
    }
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getServicioById($id)
  {
    $query = "SELECT * FROM servicios WHERE id = $id";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getServiciosByPropiedadId($id)
  {
    $query = "SELECT s.descripcion, s.fa_icon
    FROM servicios s
    JOIN propiedades_servicios ps ON s.id = ps.id_servicio
    WHERE ps.id_propiedad = $id";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getServiciosIdByPropiedadId($id)
  {
    $query = "SELECT s.id
    FROM servicios s
    JOIN propiedades_servicios ps ON s.id = ps.id_servicio
    WHERE ps.id_propiedad = $id";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_COLUMN);
  }
  public function eliminarPorId($idServicio)
  {
    $query = "UPDATE servicios SET deleted_at = now() WHERE id = $idServicio";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return true;
  }
  public function restaurarPorId($idServicio)
  {
    $query = "UPDATE servicios SET deleted_at = null WHERE id = $idServicio";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return true;
  }

  public function editar($idServicio, $descripcion, $faIcon = null)
  {
    $query = "UPDATE servicios SET descripcion = '{$descripcion}', fa_icon = '{$faIcon}'";

    $query .= " WHERE id = $idServicio";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return true;
  }

  public function crear($descripcion, $faIcon = null)
  {
    $query = "INSERT INTO servicios (descripcion, fa_icon) VALUES ('{$descripcion}', '{$faIcon}')";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return true;
  }
}
