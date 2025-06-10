<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Costa Comechingón</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>


<body class="bg-light">
    <?php include_once "modules/nav.php"; ?>

    <section class="container section-bajo-navbar">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-verde-oscuro display-5">Contactanos</h2>
            <p class="text-verde-oscuro">¿Interesado en conocer más sobre nuestros desarrollos? Completá el formulario y un asesor especializado se pondrá en contacto contigo a la brevedad.</p>
        </div>

        <div class="row g-4">
            <!-- Formulario -->
            <div class="col-lg-8">
                <div class="bg-white p-4 rounded shadow-sm">
                    <h5 class="fw-bold mb-4 text-verde-oscuro">Solicitar Información</h5>
                    <form>
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3">
                                <input type="text" class="form-control" placeholder="Nombre completo *" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="email" class="form-control" placeholder="Email *" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="tel" class="form-control" placeholder="Teléfono *" required>
                            </div>
                            <div class="col-12 mb-3">
                                <textarea class="form-control" rows="5" placeholder="Cuéntanos más sobre tu proyecto o consulta..." required></textarea>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center">
                            <a href="https://wa.me/549XXXXXXXXXX" class="btn btn-verde-claro fw-bold px-4 py-2 rounded-pill">
                                <i></i>Enviar Consulta
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Información de contacto -->
            <div class="col-lg-4">
                <div class="bg-white p-4 rounded shadow-sm mb-4">
                    <h6 class="fw-bold mb-3 text-verde-oscuro">Información de Contacto</h6>
                    <p><i class="bi bi-telephone-fill me-2"></i>+54 9 266 123-4567 <br><small class="text-muted">Lun a Vie: 9:00 - 18:00</small></p>
                    <p><i class="bi bi-envelope-fill me-2"></i>info@costacomechingon.com <br><small class="text-muted">Respuesta en 24hs</small></p>
                    <p><i class="bi bi-geo-alt-fill me-2"></i>Av. del Sol 123, <br>Villa de Merlo, San Luis</p>
                    <p><i class="bi bi-clock-fill me-2"></i>
                        <strong>Horarios de atención</strong><br>
                        Lun a Vie: 9:00 - 18:00<br>
                        Sábados: 9:00 - 13:00<br>
                        Domingos: Cerrado
                    </p>
                </div>

                <div class="whatsapp-floating-box hidden">
                    <p class="mb-2 fw-semibold">¿Necesitás respuesta inmediata?<br>
                        <span class="fw-normal">Chateá con nosotros por WhatsApp y obtené información al instante</span>
                    </p>
                    <a href="https://wa.me/549XXXXXXXXXX" target="_blank" class="btn btn-verde-claro w-100 fw-bold">
                        <i class="bi bi-whatsapp me-2"></i>Abrir WhatsApp
                    </a>
                </div>
            </div>
        </div>

        <!-- Mapa -->
        <div class="mt-5">
            <h4 class="fw-bold mb-3 text-center text-verde-oscuro">Nuestra Ubicación</h4>
            <div class="ratio ratio-16x9">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d708.4270719360266!2d-65.01625867945259!3d-32.36913851087354!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95d2e3eefc633565%3A0xb1ecbc477aea83d2!2sCOSTA%20COMECHING%C3%93N!5e0!3m2!1ses-419!2sar!4v1749139440808!5m2!1ses-419!2sar" width="600" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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