<?php
session_start();

if (!$_SESSION['user']) {
  header("Location: index.php");
}

include_once '../src/db/conn.php';
include_once '../src/models/tiposPropiedad.php';

$conexion = Conexion::conectar();

$tiposPropiedadModel = new TiposPropiedad($conexion);

$tiposPropiedad = $tiposPropiedadModel->getTiposPropiedad(false);


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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<?php include_once 'modules/navbar.html'; ?>
<style>
  input,
  textarea {
    color: black !important;
  }

  .form-control {
    border: var(--bs-border-width) solid var(--bs-border-color) !important;
  }
</style>

<body class="bg-grays-color">

  <div class="container vh-100 mt-5">
    <div class="d-flex mt-5 justify-content-between mb-3">
      <h5>Tipos de Propiedades</h5>
      <button class="btn btn-success fw-bold" id="agregarTiposPropiedad"><i class="fa fa-plus"></i> Nueva</button>
    </div>

    <table class="table table-primary">
      <thead class="table-dark">
        <tr>
          <th class="text-center">#</th>
          <th class="text-center">Descripción</th>
          <th class="text-center">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($tiposPropiedad as $tiposPropiedad) :
          echo '<tr>
                  <td class="text-center">' . $tiposPropiedad['id'] . '</th>
                  <td class="text-center">' . $tiposPropiedad['descripcion'] . '</th>';

          if ($tiposPropiedad['deleted_at'] == null) {
            echo '
                  <td class="text-center">
                    <button class="btn btn-warning" title="Editar" type="button" id="editarTiposPropiedad">
                      <i class="fa fa-pencil"></i>
                    </button>
                    <button class="btn btn-danger" title="Eliminar" type="button" onclick="borrarTiposPropiedad(' . $tiposPropiedad['id'] . ')">
                      <i class="fa fa-trash"></i>
                    </button>
                  </td>';
          } else {
            echo '<td class="text-center">
                    <button class="btn btn-success" title="Reactivar" type="button" onclick="restaurarTiposPropiedad(' . $tiposPropiedad['id'] . ')">
                      <i class="fa fa-undo"></i>
                    </button>
                  </td>';
          };
          echo '</tr>';
        endforeach;
        ?>
      </tbody>
    </table>
  </div>
  <?php include_once 'modales/abm-tiposPropiedad.html'; ?>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="assets/js/jquery.min.js"></script>

<script>
  function borrarTiposPropiedad(idTiposPropiedad) {
    $.post("controllers/tiposPropiedad.php", {
      eliminar: idTiposPropiedad
    }, function(result) {
      if (!result) {
        window.alert('Ocurrio un error.');
        return;
      }
      if (result) {
        window.alert('Tipo de Propiedad eliminado correctamente!');
        window.location.reload();
      }
    });
  }

  function restaurarTiposPropiedad(idTiposPropiedad) {
    $.post("controllers/tiposPropiedad.php", {
      restaurar: idTiposPropiedad
    }, function(result) {
      if (!result) {
        window.alert('Ocurrio un error.');
        return;
      }
      if (result) {
        window.alert('Tipo de Propiedad restaurado correctamente!');
        window.location.reload();
      }
    });
  }

  $(document).ready(function() {
    $(document).on("click", "#agregarTiposPropiedad", function() {
      $("#tiposPropiedadModal").modal("show");
      $("#formTiposPropiedad").trigger("reset");
    })

    $(document).on("click", "#guardarTiposPropiedad", function() {
      var fd = new FormData();

      let tiposPropiedadId = $("#tiposPropiedadId").val() ?? null;
      let descripcion = $("#descripcion").val();

      if (!descripcion) {
        alert("Complete todos los campos...");
        return;
      }
      fd.append('tiposPropiedadId', tiposPropiedadId);
      fd.append('descripcion', descripcion);

      $.ajax({
        url: 'controllers/tiposPropiedad.php',
        type: 'post',
        data: fd,
        contentType: false,
        processData: false,
        success: function(response) {
          if (!response) {
            window.alert('Ocurrio un error.');
            return;
          }
          if (response) {
            window.alert('Tipo de Propiedad guardado correctamente!');
            window.location.reload();
          }
        },
      });
    })

    $(document).on("click", "#editarTiposPropiedad", function() {
      $("#tiposPropiedadModal").modal("show");
      let row = $(this).closest("tr");
      let tiposPropiedadId = row.find("td:nth-child(1)").text().trim();
      let descripcion = row.find("td:nth-child(2)").text();
      $("#tiposPropiedadId").val(tiposPropiedadId);
      $("#descripcion").val(descripcion.trim());
    })
  })
</script>