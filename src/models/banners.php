<?php

class Banners
{
  private $conexion;

  public function __construct($conexion)
  {
    $this->conexion = $conexion;
  }

  public function getBanners($all = false)
  {
    $query = "SELECT * FROM banners";
    if (!$all) {
      $query .= ' WHERE deleted_at is null';
    }
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getBannerById($id)
  {
    $query = "SELECT * FROM banners WHERE id = $id";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
  }

  public function eliminarPorId($idBanner)
  {
    $query = "UPDATE banners SET deleted_at = now() WHERE id = $idBanner";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return true;
  }
  public function restaurarPorId($idBanner)
  {
    $query = "UPDATE banners SET deleted_at = null WHERE id = $idBanner";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return true;
  }

  public function editar($idBanner, $titulo, $descripcion)
  {
    $query = "UPDATE banners SET titulo = '{$titulo}', descripcion = '{$descripcion}'";

    $query .= " WHERE id = $idBanner";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return true;
  }

  public function crear($titulo, $descripcion, $imagen)
  {
    $query = "INSERT INTO banners (titulo, descripcion, img) VALUES ('{$titulo}','{$descripcion}', '{$imagen}')";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return true;
  }
}
