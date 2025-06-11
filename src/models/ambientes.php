<?php

class Ambientes
{
  private $conexion;

  public function __construct($conexion)
  {
    $this->conexion = $conexion;
  }

  public function getAmbientes($all = false)
  {
    $query = "SELECT * FROM ambientes";
    if (!$all) {
      $query .= ' WHERE deleted_at is null';
    }
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getAmbienteById($id)
  {
    $query = "SELECT * FROM ambientes WHERE id = $id";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
  }
  public function getAmbientesByPropiedadId($id)
  {
    $query = "SELECT a.descripcion 
    FROM ambientes a
    JOIN propiedades_ambientes pa ON a.id = pa.id_ambiente
    WHERE pa.id_propiedad = $id";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
  }
  public function getAmbientesIdByPropiedadId($id)
  {
    $query = "SELECT a.id 
    FROM ambientes a
    JOIN propiedades_ambientes pa ON a.id = pa.id_ambiente
    WHERE pa.id_propiedad = $id";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_COLUMN);
  }

  public function eliminarPorId($idAmbiente)
  {
    $query = "UPDATE ambientes SET deleted_at = now() WHERE id = $idAmbiente";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return true;
  }
  public function restaurarPorId($idAmbiente)
  {
    $query = "UPDATE ambientes SET deleted_at = null WHERE id = $idAmbiente";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return true;
  }

  public function editar($idAmbiente, $descripcion)
  {
    $query = "UPDATE ambientes SET descripcion = '{$descripcion}'";

    $query .= " WHERE id = $idAmbiente";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return true;
  }

  public function crear($descripcion)
  {
    $query = "INSERT INTO ambientes (descripcion) VALUES ('{$descripcion}')";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return true;
  }
}
