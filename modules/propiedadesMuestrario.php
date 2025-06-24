<div class="container py-5">
  <div class="row g-4">
    <?php foreach ($propiedadesDestacadas as $propiedad): ?>

      <div class="col-lg-4 col-md-6 col-12">
        <a href="/propiedadDetalle.php?id=<?= $propiedad['id'] ?>" class="property-card text-decoration-none text-dark d-block">
          <span class="badge bg-danger badge-custom"><?= strtoupper($propiedad['tipo_publicacion']) ?></span>
          <img src="assets/img/propiedades/<?= $propiedad['imagen_portada'] ?>" class="property-image" alt="Imagen propiedad">
          <div class="p-3">
            <h5><?= $propiedad['titulo'] ?></h5>
            <p class="mb-1"><?= $propiedad['tipo_propiedad'] ?></p>
            <p class="text-muted small">
              <i class="fas fa-map-marker-alt me-1 iconos"></i> <?= ucfirst($propiedad['zona']) . ', ' . ucfirst($propiedad['localidad']) ?>
            </p>
            <div class="d-flex justify-content-between small">
              <span class="text-dark"><i class="fas fa-ruler-combined me-1 iconos"></i> <?= $propiedad['superficie_cubierta'] ?> m²</span>
              <span><strong><?= $propiedad['moneda'] == 1 ? '$' : 'u$s' ?> <?= number_format($propiedad['precio'], 2, ',', '.') ?> </strong></span>
            </div>
          </div>
        </a>
      </div>
    <?php endforeach; ?>

    <?php foreach ($propiedades as $propiedad): ?>

      <div class="col-lg-4 col-md-6 col-12">
        <a href="/propiedadDetalle.php?id=<?= $propiedad['id'] ?>" class="property-card text-decoration-none text-dark d-block">
          <span class="badge bg-danger badge-custom"><?= strtoupper($propiedad['tipo_publicacion']) ?></span>
          <img src="assets/img/propiedades/<?= $propiedad['imagen_portada'] ?>" class="property-image" alt="Imagen propiedad">
          <div class="p-3">
            <h5><?= $propiedad['titulo'] ?></h5>
            <p class="mb-1"><?= $propiedad['tipo_propiedad'] ?></p>
            <p class="text-muted small">
              <i class="fas fa-map-marker-alt me-1 iconos"></i> <?= ucfirst($propiedad['zona']) . ', ' . ucfirst($propiedad['localidad']) ?>
            </p>
            <div class="d-flex justify-content-between small">
              <span class="text-dark"><i class="fas fa-ruler-combined me-1 iconos"></i> <?= $propiedad['superficie_cubierta'] ?> m²</span>
              <span><strong><?= $propiedad['moneda'] == 1 ? '$' : 'u$s' ?> <?= number_format($propiedad['precio'], 2, ',', '.') ?> </strong></span>
            </div>
          </div>
        </a>
      </div>
    <?php endforeach; ?>

    <?php if (empty($propiedades) && empty($propiedadesDestacadas)): ?>
      <div class="col-12">
        <h4 class="text-center">No se encontraron resultados</h4>
      </div>
    <?php endif; ?>



  </div>
</div>
<?php if (!empty($propiedades)) : ?>

  <nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
      <?php if ($totalPaginas > 1) {
        for ($i = 1; $i <= $totalPaginas; $i++) {
          echo '<li class="page-item"><a class="page-link bg-dark text-white" href="propiedades.php?pagina=' . $i . '&tipo_propiedad=' . $_GET['tipo_propiedad'] . '&localidad=' . $_GET['localidad']  . '">' . $i . '</a></li>';
        }
      } ?>
    </ul>
  </nav>
<?php endif; ?>


<!-- Filtros -->
<div class="mt-5 p-4 bg-danger text-white text-center">
  <h5>Encontrá tu próxima inversión</h5>
  <form class="d-flex justify-content-center gap-2 mt-3 flex-wrap" action="propiedades.php" method="get">
    <select class="form-select w-auto" name="tipo_propiedad">
      <option selected disabled>Seleccione un tipo de propiedad...</option>
      <?php foreach ($tiposPropiedad as $tipo): ?>
        <option value="<?= $tipo['id'] ?>"><?= $tipo['descripcion'] ?></option>
      <?php endforeach; ?>
    </select>
    <select class="form-select w-auto" name="localidad">
      <option selected disabled>Seleccione una localidad...</option>
      <?php foreach ($localidades as $localidad): ?>
        <option value="<?= $localidad['id'] ?>"><?= $localidad['descripcion'] ?></option>
      <?php endforeach; ?>
    </select>
    <button type="submit" class="btn btn-marron">Buscar</button>
  </form>
</div>