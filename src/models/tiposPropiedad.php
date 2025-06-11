<?php

class TiposPropiedad
{
  private $conexion;

  public function __construct($conexion)
  {
    $this->conexion = $conexion;
  }

  public function getTiposPropiedad($all = false)
  {
    $query = "SELECT * FROM tipos_propiedad";
    if (!$all) {
      $query .= ' WHERE deleted_at is null';
    }
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getTiposPropiedadById($id)
  {
    $query = "SELECT * FROM tipos_propiedad WHERE id = $id";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
  }

  public function eliminarPorId($idTiposPropiedad)
  {
    $query = "UPDATE tipos_propiedad SET deleted_at = now() WHERE id = $idTiposPropiedad";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return true;
  }
  public function restaurarPorId($idTiposPropiedad)
  {
    $query = "UPDATE tipos_propiedad SET deleted_at = null WHERE id = $idTiposPropiedad";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return true;
  }

  public function editar($idTiposPropiedad, $descripcion)
  {
    $query = "UPDATE tipos_propiedad SET descripcion = '{$descripcion}'";

    $query .= " WHERE id = $idTiposPropiedad";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return true;
  }

  public function crear($descripcion)
  {
    $query = "INSERT INTO tipos_propiedad (descripcion) VALUES ('{$descripcion}')";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return true;
  }

  public function obtenerTipos() {
    $query = "SELECT id, descripcion FROM tipos_propiedad";
    $stmt = $this->conexion->prepare($query);
    $stmt->execute();
    
    $tiposPropiedad = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $tiposPropiedad[$row['id']] = $row['descripcion'];
    }
    return $tiposPropiedad;
}


}


