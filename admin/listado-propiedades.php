<?php
session_start();

if (!$_SESSION['user']) {
  header("Location: index.php");
}

include_once '../src/db/conn.php';
include_once '../src/models/propiedades.php';

$conexion = Conexion::conectar();

$propiedadesModel = new Propiedades($conexion);

$propiedades = $propiedadesModel->getPropiedades(true);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Costa Comechingón - Admin</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
      <h5>Listado de Propiedades</h5>
      <a class="btn btn-success fw-bold" href="alta-propiedad.php"><i class="fa fa-plus"></i> Nueva Propiedad</a>
    </div>

    <table class="table table-primary" id="datatable">
      <thead class="table-dark">
        <tr>
          <th class="text-center">Código</th>
          <th class="text-center">Título</th>
          <th class="text-center">Descripción</th>
          <th class="text-center">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php /* foreach ($propiedades as $propiedad) :
          echo '<tr>
                  <td class="text-center">' . $propiedad['codigo'] . '</th>
                  <td class="text-center">' . $propiedad['titulo'] . '</th>
                  <td class="text-center">' . $propiedad['descripcion'] . '</th>';

          if ($propiedad['deleted_at'] == null) {
            echo '
                  <td class="text-center">
                    <button class="btn btn-warning" title="Editar" type="button" id="editarPropiedad">
                      <i class="fa fa-pencil"></i>
                    </button>
                    <button class="btn btn-danger" title="Eliminar" type="button" onclick="borrarPropiedad(' . $propiedad['id'] . ')">
                      <i class="fa fa-trash"></i>
                    </button>
                  </td>';
          } else {
            echo '<td class="text-center">
                    <button class="btn btn-success" title="Reactivar" type="button" onclick="restaurarPropiedad(' . $propiedad['id'] . ')">
                      <i class="fa fa-undo"></i>
                    </button>
                  </td>';
          };
          echo '</tr>';
        endforeach; */
        ?>
      </tbody>
    </table>
  </div>
  <?php include_once 'modales/abm-listado-propiedades.html'; ?>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
<script src="../assets/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.6/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.6/js/dataTables.bootstrap5.js"></script>

<script>
  $(document).ready(function() {
    tablaStock = $('#datatable').DataTable({
      "destroy": true,
      "ajax": {
        "url": "controllers/propiedad.php",
        "method": "POST",
        "data": {
          loadDatatable: 1,
        },
        "dataSrc": ""
      },
      "columns": [{
          "data": "id",
          "visible": false,
          "searchable": false
        },
        {
          "data": "codigo"
        },
        {
          "data": "titulo"
        },
        {
          "data": "descripcion"
        },
        {
          "defaultContent": "<div class='text-center d-flex'> <button class='btn btn-warning me-2' title='Editar' type='button' onclick='editarPropiedad($(this))'><i class='fa fa-pencil'></i></button><button class='btn btn-danger' title='Eliminar' type='button' onclick='borrarPropiedad($(this))'><i class='fa fa-trash'></i></button></div>"
        }
      ],
      "pageLength": 15,
      "language": {
        "url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
      },

    });


  });

  function borrarPropiedad(element) {
    fila = element.closest("tr");
    var data = $('#datatable').DataTable().row(fila).data();
    idPropiedad = data['id'];
    if (confirm("¿Está seguro que desea eliminar la propiedad?") == true) {
      $.post("controllers/propiedad.php", {
        eliminar: idPropiedad
      }, function(result) {
        if (!result) {
          window.alert('Ocurrio un error.');
          return;
        }
        if (result) {
          window.alert('Propiedad eliminada correctamente!');
          window.location.reload();
        }
      });
    }
  }

  function editarPropiedad(element) {
    fila = element.closest("tr");
    var data = $('#datatable').DataTable().row(fila).data();
    idPropiedad = data['id'];
    window.location.href = 'alta-propiedad.php?id=' + idPropiedad;
  }
</script>

</html>