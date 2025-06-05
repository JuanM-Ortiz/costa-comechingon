<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Costa Comechingón</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <?php include_once "modules/nav.php"; ?>

    <section class="text-center bg-light section-bajo-navbar">
        <div class="container">
            <h2 class="display-5 fw-bold">Nuestras Propiedades</h2>
            <p class="lead text-muted">
                Explora nuestra selección de propiedades en Merlo, San Luis y encuentra la que mejor se adapte a tus necesidades.
            </p>
        </div>
    </section>

    <?php include_once 'modules/propiedadesMuestrario.html'; ?>

    <?php include_once 'modules/footer.html'; ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>