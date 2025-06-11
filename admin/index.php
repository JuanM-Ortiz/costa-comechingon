<?php

if ($_POST['userName'] && $_POST['password']) {

  include_once '../src/db/conn.php';
  include_once '../src/models/usuarios.php';
  $conexion = Conexion::conectar();
  $hash = md5($_POST['password']);
  $userModel = new Usuarios($conexion);
  session_start();

  if (!$_SESSION['user'] = $userModel->getUser($_POST['userName'], $hash)) {
    header("Location: index.php?e=1");
    die;
  }
  header("Location: listado-propiedades.php");
  die;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Costa Comechingón - Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<style>
  form-control {
    border-color: #244210 !important;
  }

  .form-control:focus {
    border-color: #25a55f !important;
    outline: 0;
    box-shadow: 0 0 0 .25rem rgba(37, 165, 95, .25) !important;
  }
</style>

<body>
  <div class="vh-100 d-flex align-items-center justify-content-center" style="background-color: #244210;">
    <div class="card p-4 bg-gray border-0 ">
      <div class="card-body">
        <form class="form-login " action="index.php" method="POST">
          <div class="mb-3">
            <label for="userName" class="form-label fs-5">Nombre de usuario</label>
            <input type="text" class="form-control label bg-light" name="userName" id="userName" aria-describedby="userName">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label label fs-5">Contraseña</label>
            <input type="password" name="password" class="form-control label" id="password">
          </div>
          <?php if ($_GET['e'] == 1) : ?>
            <div class="mb-3">
              <span class="badge text-bg-danger fs-5"><i class="fa fa-warning"></i> Usuario o clave incorrecto!</span>
            </div>
          <?php endif; ?>
          <div class="text-center">
            <button type="submit" class="btn btn-success btn-lg border-0 mt-4">Iniciar Sesión</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="assets/js/jquery.min.js"></script>
</body>