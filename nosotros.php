<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Costa Comechingón</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <?php include_once "modules/nav.php"; ?>

    <!-- <div class="historia-fondo">
        <section class="section-bajo-navbar">
            <div class="container text-center">
                <h2 class="fw-bold mb-4">Nuestra historia, tu futuro</h2>
                <p class="mx-auto mb-3" style="max-width: 800px;">
                    En Costa Comechingón creemos que invertir en tierra es invertir en futuro.
                    Desde 2015 desarrollamos proyectos inmobiliarios que respetan el entorno natural de las Sierras de Comechingones,
                    ofreciendo oportunidades únicas para quienes buscan conectar con la naturaleza sin renunciar a la seguridad de una inversión sólida.
                </p>
                <p class="mx-auto mb-3" style="max-width: 800px;">
                    Nacimos con la visión de transformar la manera en que se conciben los desarrollos inmobiliarios en la región,
                    priorizando la sustentabilidad, la transparencia y el respeto por el paisaje serrano que nos rodea.
                    Cada proyecto que emprendemos es una oportunidad de crear espacios donde las familias puedan construir sus sueños en armonía con la naturaleza.
                </p>
                <p class="mx-auto" style="max-width: 800px;">
                    Con más de 8 años en el mercado, hemos consolidado nuestra presencia en Villa de Merlo como referentes
                    en desarrollo inmobiliario responsable, habiendo entregado más de 200 lotes a familias de toda Argentina
                    que eligieron las sierras como su lugar de inversión y descanso.
                </p>
            </div>
        </section>

        <section class="py-5">
            <div class="container">
                <h2 class="fw-bold text-center mb-5">Nuestros valores</h2>
                <div class="row g-4 text-center">

                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm p-4 h-100">
                            <div class="mb-3">
                                <i class="fas fa-seedling fa-2x text-success"></i>
                            </div>
                            <h5 class="fw-bold">Sustentabilidad</h5>
                            <p class="text-muted mb-0">
                                Cuidamos el entorno natural en cada desarrollo, integrando la naturaleza con responsabilidad.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm p-4 h-100">
                            <div class="mb-3">
                                <i class="fas fa-handshake fa-2x text-primary"></i>
                            </div>
                            <h5 class="fw-bold">Transparencia</h5>
                            <p class="text-muted mb-0">
                                Brindamos toda la información clara y precisa para que tomes decisiones con confianza.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm p-4 h-100">
                            <div class="mb-3">
                                <i class="fas fa-users fa-2x text-warning"></i>
                            </div>
                            <h5 class="fw-bold">Compromiso</h5>
                            <p class="text-muted mb-0">
                                Estamos presentes en cada etapa del proceso, acompañando a quienes confían en nosotros.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div> -->

    <section class="equipo">
        <h2 class="text-verde-oscuro display-5 fw-bold">Nuestro equipo profesional</h2>
        <p class="text-verde-oscuro">
            Contamos con un equipo multidisciplinario de profesionales matriculados y con amplia
            experiencia en el sector inmobiliario y de desarrollo urbano.
        </p>

        <div class="equipo-grid">
            <!-- Card 1 -->
            <div class="card-profesional">
                <div class="foto">
                    <img src="assets/img/ema.png" alt="Carlos Mendoza">
                </div>
                <h3>Ing. Carlos Mendoza</h3>
                <p class="cargo">Director General</p>
                <div class="info-extra">
                    <span>📎 CPIC N° 12.345</span>
                    <span>🕒 15 años</span>
                </div>
                <p class="area">Desarrollo Inmobiliario</p>
                <p class="especialidad">
                    Especialista en planificación urbana y desarrollo sustentable.
                </p>
            </div>

            <div class="card-profesional">
                <div class="foto">
                    <img src="imagenes/maria.jpg" alt="María Elena Vásquez">
                </div>
                <h3>Arq. María Elena Vásquez</h3>
                <p class="cargo">Directora de Proyectos</p>
                <div class="info-extra">
                    <span>📎 CAPSL N° 6.789</span>
                    <span>🕒 12 años</span>
                </div>
                <p class="area">Arquitectura y Urbanismo</p>
                <p class="especialidad">
                    Experta en diseño urbano y planificación territorial.
                </p>
            </div>

            <div class="card-profesional">
                <div class="foto">
                    <img src="imagenes/roberto.jpg" alt="Roberto Silva">
                </div>
                <h3>Dr. Roberto Silva</h3>
                <p class="cargo">Asesor Legal</p>
                <div class="info-extra">
                    <span>📎 CASL N° 3.456</span>
                    <span>🕒 20 años</span>
                </div>
                <p class="area">Derecho Inmobiliario</p>
                <p class="especialidad">
                    Especialista en derecho inmobiliario y contratos de inversión.
                </p>
            </div>

            <div class="card-profesional">
                <div class="foto">
                    <img src="imagenes/ana.jpg" alt="Ana Morales">
                </div>
                <h3>Lic. Ana Morales</h3>
                <p class="cargo">Gerente Comercial</p>
                <div class="info-extra">
                    <span>📎 CPCE N° 9.012</span>
                    <span>🕒 10 años</span>
                </div>
                <p class="area">Administración y Finanzas</p>
                <p class="especialidad">
                    Experta en análisis financiero y estructuración de inversiones.
                </p>
            </div>

        </div>
    </section>

    <section class="border-top border-dark-subtle">
        <?php include_once "modules/footer.html"; ?>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>

</html>