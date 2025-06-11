<?php

class Usuarios
{
  private $conexion;

  public function __construct($conexion)
  {
    $this->conexion = $conexion;
  }

  public function getUser($username, $password)
  {
    $query = "SELECT * FROM usuarios WHERE username = '{$username}' AND contraseña = '{$password}' AND deleted_at is null";

    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
  }
}
