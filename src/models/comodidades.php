<?php

class Comodidades
{
  private $conexion;

  public function __construct($conexion)
  {
    $this->conexion = $conexion;
  }

  public function getComodidades($all = false)
  {
    $query = "SELECT * FROM comodidades";
    if (!$all) {
      $query .= ' WHERE deleted_at is null';
    }
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getComodidadById($id)
  {
    $query = "SELECT * FROM comodidades WHERE id = $id";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getComodidadesByPropiedadId($id)
  {
    $query = "SELECT c.descripcion, c.fa_icon
    FROM comodidades c
    JOIN propiedades_comodidades pc ON c.id = pc.id_comodidad
    WHERE pc.id_propiedad = $id";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getComodidadesIdByPropiedadId($id)
  {
    $query = "SELECT c.id 
    FROM comodidades c
    JOIN propiedades_comodidades pc ON c.id = pc.id_comodidad
    WHERE pc.id_propiedad = $id";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_COLUMN);
  }

  public function eliminarPorId($idComodidad)
  {
    $query = "UPDATE comodidades SET deleted_at = now() WHERE id = $idComodidad";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return true;
  }
  public function restaurarPorId($idComodidad)
  {
    $query = "UPDATE comodidades SET deleted_at = null WHERE id = $idComodidad";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return true;
  }

  public function editar($idComodidad, $descripcion, $faIcon = null)
  {
    $query = "UPDATE comodidades SET descripcion = '{$descripcion}', fa_icon = '{$faIcon}'";

    $query .= " WHERE id = $idComodidad";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return true;
  }

  public function crear($descripcion, $faIcon = null)
  {
    $query = "INSERT INTO comodidades (descripcion, fa_icon) VALUES ('{$descripcion}', '{$faIcon}')";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return true;
  }
}
