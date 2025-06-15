<?php

class Conexion
{

  static public function conectar()
  {
    try {
      #PDO("nombre del servidor;nombre de la base de datos","usuario", "contraseña")
      $conexion = new PDO("mysql:host=localhost;dbname=inmob", "root", "");
      $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $conexion->exec("set names utf8");
    } catch (Exception $e) {
      die('Error' . $e->getMessage());

      echo "Linea del error" . $e->getLine();
    }

    return $conexion;
  }
}
