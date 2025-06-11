<?php

class Localidades
{
  private $conexion;

  public function __construct($conexion)
  {
    $this->conexion = $conexion;
  }

  public function getLocalidades($all = false)
  {
    $query = "SELECT * FROM localidades";
    if (!$all) {
      $query .= ' WHERE deleted_at is null';
    }
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getLocalidadById($id)
  {
    $query = "SELECT * FROM localidades WHERE id = $id";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getLocalidadByPropiedadId($id) {
    $query = "SELECT p.*, l.descripcion AS localidad_descripcion
    FROM propiedades p
    JOIN localidades l ON p.id_localidad = l.id
    WHERE p.id = $id";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
  }

  public function eliminarPorId($idLocalidad)
  {
    $query = "UPDATE localidades SET deleted_at = now() WHERE id = $idLocalidad";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return true;
  }
  public function restaurarPorId($idLocalidad)
  {
    $query = "UPDATE localidades SET deleted_at = null WHERE id = $idLocalidad";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return true;
  }

  public function editar($idLocalidad, $descripcion)
  {
    $query = "UPDATE localidades SET descripcion = '{$descripcion}'";

    $query .= " WHERE id = $idLocalidad";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return true;
  }

  public function crear($descripcion)
  {
    $query = "INSERT INTO localidades (descripcion) VALUES ('{$descripcion}')";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return true;
  }
}
