<?php $pagina = basename($_SERVER['PHP_SELF']); ?>

<nav class="navbar navbar-expand-lg bg-light fixed-top w-100 z-3 px-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <img src="assets/img/logo.png" alt="Costa Comechingón" height="60">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end ps-5" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?= $pagina == 'index.php' ? 'active-link' : '' ?> text-verde fw-bold fs-5" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $pagina == 'propiedades.php' ? 'active-link' : '' ?> text-verde fw-bold fs-5" href="propiedades.php">Propiedades</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $pagina == 'nosotros.php' ? 'active-link' : '' ?> text-verde fw-bold fs-5" href="nosotros.php">Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $pagina == 'contacto.php' ? 'active-link' : '' ?> text-verde fw-bold fs-5" href="contacto.php">Contacto</a>
                </li>
            </ul>
        </div>

        <div class="d-none d-lg-flex align-items-center">
            <!-- <a href="#" class="btn btn-light bg-bordo px-4 py-2 shadow fw-bold rounded-pill">Contáctanos</a> -->
        </div>
    </div>
</nav>