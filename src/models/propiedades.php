<?php

class Propiedades
{
  private $conexion;

  public function __construct($conexion)
  {
    $this->conexion = $conexion;
  }

  public function getPropiedades($all = false)
  {
    $query = "SELECT * FROM propiedades";
    if (!$all) {
      $query .= ' WHERE deleted_at is null';
    }
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getPropiedadById($id)
  {
    $query = "SELECT * FROM propiedades WHERE id = $id";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getFrontDataById($id)
  {
    $query = "SELECT p.*, z.descripcion as zona, l.descripcion as localidad
    FROM propiedades p
    JOIN localidades l ON p.id_localidad = l.id
    JOIN zonas z ON p.id_zona = z.id 
    WHERE p.id = {$id}";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
  }

  public function eliminarPorId($idPropiedad)
  {
    $query = "UPDATE propiedades SET deleted_at = now() WHERE id = $idPropiedad";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    $query = "DELETE FROM propiedades_ambientes WHERE id_propiedad = $idPropiedad";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    $query = "DELETE FROM propiedades_servicios WHERE id_propiedad = $idPropiedad";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    $query = "DELETE FROM propiedades_comodidades WHERE id_propiedad = $idPropiedad";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    $query = "DELETE FROM propiedades_tipo_publicaciones WHERE id_propiedad = $idPropiedad";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    $query = "DELETE FROM propiedades_imagenes WHERE id_propiedad = $idPropiedad";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();

    return true;
  }
  public function restaurarPorId($idPropiedad)
  {
    $query = "UPDATE propiedades SET deleted_at = null WHERE id = $idPropiedad";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return true;
  }

  public function editar($idPropiedad, $params)
  {
    $query = "UPDATE propiedades SET 
    titulo = '{$params['titulo']}',
    descripcion = '{$params['descripcion']}',
    superficie_cubierta = '{$params['superficie_cubierta']}',
    superficie = '{$params['superficie']}',
    pisos = '{$params['pisos']}',
    dormitorios = '{$params['dormitorios']}',
    baños = '{$params['baños']}',
    id_localidad = '{$params['id_localidad']}',
    id_zona = '{$params['id_zona']}',
    maps_url = '{$params['maps_url']}',
    video = '{$params['video']}',
    es_destacada = '{$params['es_destacada']}'";

    $query .= " WHERE id = $idPropiedad";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return true;
  }

  public function asignarPortada($idPropiedad, $img)
  {
    $query = "UPDATE propiedades SET imagen_portada = '{$img}' WHERE id = $idPropiedad";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return true;
  }

  public function crear($params)
  {
    try {
      $codigo = 'CCH' . random_int(1, 99999);
      $query = "INSERT INTO propiedades (titulo, id_tipo_propiedad, 
      descripcion, superficie_cubierta, superficie,
      pisos, dormitorios, 
      baños, id_localidad, id_zona, maps_url, video,
      codigo,es_destacada)
       VALUES ('{$params['titulo']}', '{$params['id_tipo_propiedad']}', '{$params['descripcion']}',
       {$params['superficie_cubierta']}, {$params['superficie']},
       {$params['pisos']}, {$params['dormitorios']}, 
       {$params['baños']}, {$params['id_localidad']},
       {$params['id_zona']},'{$params['maps_url']}', '{$params['video']}', '{$codigo}', '{$params['es_destacada']}')";
      $resultado = $this->conexion->prepare($query);
      $resultado->execute();
      return $this->conexion->lastInsertId();
    } catch (\Throwable $th) {
      echo $th->getMessage();
    }
  }

  public function crearAmbientesByPropiedadId($idPropiedad, $ambientes)
  {
    $query = "DELETE FROM propiedades_ambientes WHERE id_propiedad = $idPropiedad";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    foreach ($ambientes as $ambiente) {
      $query = "INSERT INTO propiedades_ambientes (id_propiedad, id_ambiente) VALUES ($idPropiedad, $ambiente)";
      $resultado = $this->conexion->prepare($query);
      $resultado->execute();
    }
    return true;
  }
  public function crearServiciosByPropiedadId($idPropiedad, $servicios)
  {
    $query = "DELETE FROM propiedades_servicios WHERE id_propiedad = $idPropiedad";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    foreach ($servicios as $servicio) {
      $query = "INSERT INTO propiedades_servicios (id_propiedad, id_servicio) VALUES ($idPropiedad, $servicio)";
      $resultado = $this->conexion->prepare($query);
      $resultado->execute();
    }
    return true;
  }
  public function crearComodidadesByPropiedadId($idPropiedad, $comodidades)
  {
    $query = "DELETE FROM propiedades_comodidades WHERE id_propiedad = $idPropiedad";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    foreach ($comodidades as $comodidad) {
      $query = "INSERT INTO propiedades_comodidades (id_propiedad, id_comodidad) VALUES ($idPropiedad, $comodidad)";
      $resultado = $this->conexion->prepare($query);
      $resultado->execute();
    }
    return true;
  }
  public function crearVentaPropiedad($idPropiedad, $precio)
  {
    $query = "DELETE FROM propiedades_tipo_publicaciones WHERE id_propiedad = $idPropiedad AND id_tipo_publicacion = 2";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    $query = "INSERT INTO propiedades_tipo_publicaciones (id_propiedad, id_tipo_publicacion, precio, moneda)
    VALUES ($idPropiedad, 2, $precio, 2)";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();

    return true;
  }

  public function crearAlquilerPropiedad($idPropiedad, $precio)
  {
    $query = "DELETE FROM propiedades_tipo_publicaciones WHERE id_propiedad = $idPropiedad AND id_tipo_publicacion = 1";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    $query = "INSERT INTO propiedades_tipo_publicaciones (id_propiedad, id_tipo_publicacion, precio, moneda)
    VALUES ($idPropiedad, 1, $precio, 1)";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();

    return true;
  }

  public function getPropiedadesConPrecio($inicio = null, $resultadosPorPagina = null, $destacadas = false)
  {
    $query = "SELECT p.*, pt.precio, pt.moneda, tp.descripcion AS 'tipo_publicacion',
              l.descripcion AS 'localidad', z.descripcion AS 'zona', tpr.descripcion AS 'tipo_propiedad'
              FROM propiedades p
              JOIN propiedades_tipo_publicaciones pt ON p.id = pt.id_propiedad
              JOIN tipo_publicaciones tp ON pt.id_tipo_publicacion = tp.id
              JOIN localidades l ON p.id_localidad = l.id
              JOIN zonas z ON p.id_zona = z.id
              JOIN tipos_propiedad tpr ON p.id_tipo_propiedad = tpr.id
              WHERE p.deleted_at IS NULL";

    if ($destacadas) {
      $query .= " AND p.es_destacada = 1";
    }

    if ($inicio || $resultadosPorPagina) {
      $query .= " LIMIT $inicio, $resultadosPorPagina";
    }
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
  }

  public function asignarImagen($idPropiedad, $imagen)
  {
    $query = "INSERT INTO propiedades_imagenes(id_propiedad, imagen)
    VALUES ($idPropiedad, '$imagen')";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
  }

  public function getImagenesByPropiedadId($idPropiedad)
  {
    $query = "SELECT imagen
    FROM propiedades_imagenes
    WHERE id_propiedad = $idPropiedad";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getPropiedadesFiltered($zona = null, $localidad = null, $tipoPublicacion = null, $tipoPropiedad = null, $inicio, $resultadosPorPagina)
  {
    $and = '';
    if ($zona) {
      $getZona = "SELECT id FROM zonas WHERE descripcion LIKE '%$zona%'";
      $resultado = $this->conexion->prepare($getZona);
      $resultado->execute();
      $zonas = $resultado->fetchAll(PDO::FETCH_COLUMN);
      if (!empty($zonas))
        $and .= ' AND id_zona IN (' . implode(',', $zonas) . ')';
    }

    if ($localidad) {
      $getZona = "SELECT id FROM localidades WHERE descripcion LIKE '%$localidad%'";
      $resultado = $this->conexion->prepare($getZona);
      $resultado->execute();
      $localidades = $resultado->fetchAll(PDO::FETCH_COLUMN);
      if (!empty($localidades))
        $and .= ' AND id_localidad IN (' . implode(',', $localidades) . ')';
    }

    if ($tipoPublicacion) {
      $and .= " AND pt.id_tipo_publicacion = {$tipoPublicacion}";
    }

    if ($tipoPropiedad) {
      $and .= " AND p.id_tipo_propiedad = {$tipoPropiedad}";
    }

    $query = "SELECT p.*, pt.precio, pt.moneda, tp.descripcion AS 'tipo_publicacion'
    FROM propiedades p
    JOIN propiedades_tipo_publicaciones pt ON p.id = pt.id_propiedad
    JOIN tipo_publicaciones tp ON pt.id_tipo_publicacion = tp.id
    WHERE p.deleted_at IS NULL";
    $query .= $and;

    $query .= " LIMIT $inicio, $resultadosPorPagina";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getCantidadPropiedades($tipo = null, $destacada = false)
  {
    $query = "SELECT COUNT(p.id) AS total 
              FROM propiedades p
              JOIN propiedades_tipo_publicaciones pt ON p.id = pt.id_propiedad
              WHERE p.deleted_at IS NULL";
    if ($tipo) {
      $query .= " AND pt.id_tipo_publicacion = $tipo GROUP BY pt.id_tipo_publicacion";
    }
    if ($destacada) {
      $query .= " AND p.es_destacada = 1";
    }
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    $count = $resultado->fetchAll(PDO::FETCH_ASSOC);
    return $count[0]['total'];
  }

  public function esLaMismaImagenDePortada($idPropiedad, $imagen)
  {
    $query = "SELECT imagen_portada
              FROM propiedades 
              WHERE imagen_portada = '{$imagen}'
              AND id = $idPropiedad";

    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    $res = $resultado->fetchAll(PDO::FETCH_ASSOC);
    return count($res) > 0;
  }

  public function getPrecioVentaById($idPropiedad)
  {
    $query = "SELECT precio
              FROM propiedades_tipo_publicaciones
              WHERE id_propiedad = $idPropiedad
              AND id_tipo_publicacion = 2";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
  }
  public function getPrecioAlquilerById($idPropiedad)
  {
    $query = "SELECT precio
              FROM propiedades_tipo_publicaciones
              WHERE id_propiedad = $idPropiedad
              AND id_tipo_publicacion = 1";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
  }

  public function eliminarImagen($idPropiedad, $imagen)
  {
    if (unlink(dirname(dirname(__DIR__)) . "/assets/img/propiedades/" . $idPropiedad . "/" . $imagen)) {
      $query = "DELETE FROM propiedades_imagenes WHERE id_propiedad = $idPropiedad AND imagen = '$imagen'";
      $resultado = $this->conexion->prepare($query);
      $resultado->execute();
    }
  }

  public function getPropiedadByCodigo($codigo)
  {
    $query = "SELECT id FROM propiedades WHERE codigo = '$codigo'";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getPrecioPropiedadById($idPropiedad)
  {
    $query = "SELECT precio, moneda FROM propiedades_tipo_publicaciones WHERE id_propiedad = {$idPropiedad}";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
  }
}
