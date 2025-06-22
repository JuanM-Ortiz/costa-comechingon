<div class="container py-5">
  <div class="row g-4">
    <?php foreach ($propiedadesDestacadas as $propiedad): ?>

      <div class="col-lg-4 col-md-6 col-12">
        <a href="/propiedadDetalle.php" class="property-card text-decoration-none text-dark d-block">
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

    <!-- Tarjeta 2 -->
    <div class="col-lg-4 col-md-6 col-12">
      <a href="/propiedadDetalle.php" class="property-card text-decoration-none text-dark d-block">
        <span class="badge bg-danger badge-custom">VENTA</span>
        <img src="assets/img/casa2.jpg" class="property-image" alt="Imagen propiedad">
        <div class="p-3">
          <h5>Costa del Molino</h5>
          <p class="mb-1">Contado</p>
          <p class="text-muted small">
            <i class="fas fa-map-marker-alt me-1 iconos"></i> Rincón del Este, Merlo, San Luis
          </p>
          <div class="d-flex justify-content-between small">
            <span><i class="fas fa-ruler-combined me-1 iconos"></i> 90 m²</span>
            <span><strong>u$s 110.000</strong></span>
          </div>
        </div>
      </a>
    </div>


    <!-- Tarjeta 3 -->
    <div class="col-lg-4 col-md-6 col-12">
      <a href="/propiedadDetalle.php" class="property-card text-decoration-none text-dark d-block">
        <span class="badge bg-danger badge-custom">VENTA</span>
        <img src="assets/img/casa1.jpg" class="property-image" alt="Imagen propiedad">
        <div class="p-3">
          <h5>Costa del Molino</h5>
          <p class="mb-1">Contado</p>
          <p class="text-muted small">
            <i class="fas fa-map-marker-alt me-1 iconos"></i> Rincón del Este, Merlo, San Luis
          </p>
          <div class="d-flex justify-content-between small">
            <span><i class="fas fa-ruler-combined me-1 iconos"></i> 90 m²</span>
            <span><strong>u$s 110.000</strong></span>
          </div>
        </div>
      </a>
    </div>


    <!-- Tarjeta 4 -->
    <div class="col-lg-4 col-md-6 col-12">
      <a href="/propiedadDetalle.php" class="property-card text-decoration-none text-dark d-block">
        <span class="badge bg-danger badge-custom">VENTA</span>
        <img src="assets/img/casa3.jpg" class="property-image" alt="Imagen propiedad">
        <div class="p-3">
          <h5>Costa del Molino</h5>
          <p class="mb-1">Contado</p>
          <p class="text-muted small">
            <i class="fas fa-map-marker-alt me-1 iconos"></i> Rincón del Este, Merlo, San Luis
          </p>
          <div class="d-flex justify-content-between small">
            <span><i class="fas fa-ruler-combined me-1 iconos"></i> 90 m²</span>
            <span><strong>u$s 110.000</strong></span>
          </div>
        </div>
      </a>
    </div>


    <!-- Tarjeta 5 -->
    <div class="col-lg-4 col-md-6 col-12">
      <a href="/propiedadDetalle.php" class="property-card text-decoration-none text-dark d-block">
        <span class="badge bg-danger badge-custom">VENTA</span>
        <img src="assets/img/casa2.jpg" class="property-image" alt="Imagen propiedad">
        <div class="p-3">
          <h5>Costa del Molino</h5>
          <p class="mb-1">Contado</p>
          <p class="text-muted small">
            <i class="fas fa-map-marker-alt me-1 iconos"></i> Rincón del Este, Merlo, San Luis
          </p>
          <div class="d-flex justify-content-between small">
            <span><i class="fas fa-ruler-combined me-1 iconos"></i> 90 m²</span>
            <span><strong>u$s 110.000</strong></span>
          </div>
        </div>
      </a>
    </div>


    <!-- Tarjeta 6 -->
    <div class="col-lg-4 col-md-6 col-12">
      <a href="/propiedadDetalle.php" class="property-card text-decoration-none text-dark d-block">
        <span class="badge bg-danger badge-custom">VENTA</span>
        <img src="assets/img/casa1.jpg" class="property-image" alt="Imagen propiedad">
        <div class="p-3">
          <h5>Costa del Molino</h5>
          <p class="mb-1">Contado</p>
          <p class="text-muted small">
            <i class="fas fa-map-marker-alt me-1 iconos"></i> Rincón del Este, Merlo, San Luis
          </p>
          <div class="d-flex justify-content-between small">
            <span><i class="fas fa-ruler-combined me-1 iconos"></i> 90 m²</span>
            <span><strong>u$s 110.000</strong></span>
          </div>
        </div>
      </a>
    </div>




  </div>
</div>
<div class="text-center mt-4">
  <a href="#" class="btn btn-verde px-4 py-2 mt-3 shadow fw-bold rounded-pill">
    Ver Lotes Disponibles
  </a>
</div>


<!-- Filtros -->
<div class="mt-5 p-4 bg-danger text-white text-center">
  <h5>Encontrá tu próxima inversión</h5>
  <form class="d-flex justify-content-center gap-2 mt-3 flex-wrap">
    <select class="form-select w-auto">
      <option selected>Tipo de Inmueble</option>
      <option>Casa</option>
      <option>Departamento</option>
      <option>Cabaña</option>
    </select>
    <select class="form-select w-auto">
      <option selected>Localidad</option>
      <option>Merlo</option>
      <option>Rincón del Este</option>
    </select>
    <button type="submit" class="btn btn-marron">Buscar</button>
  </form>
</div>