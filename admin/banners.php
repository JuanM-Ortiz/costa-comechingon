<?php
session_start();

if (!$_SESSION['user']) {
  header("Location: index.php");
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
      <h5>Banners</h5>
      <button class="btn btn-success fw-bold" id="agregarAmbiente"><i class="fa fa-plus"></i> Nuevo banner</button>
    </div>

    <table class="table table-primary" id="datatable">
      <thead class="table-dark">
        <tr>
          <th class="text-center">#</th>
          <th class="text-center">Titulo</th>
          <th class="text-center">Descripción</th>
          <th class="text-center">Imagen</th>
          <th class="text-center">Acciones</th>
        </tr>
      </thead>
      <tbody class="text-center">
      </tbody>
    </table>
  </div>
  <?php include_once 'modales/abm-ambientes.html'; ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="assets/js/jquery.min.js"></script>
<script src="https://cdn.datatables.net/2.0.6/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.6/js/dataTables.bootstrap5.js"></script>

<script>
  $(document).ready(function() {
    tablaStock = $('#datatable').DataTable({
      "destroy": true,
      "ajax": {
        "url": "controllers/banner.php",
        "method": "POST",
        "data": {
          getBanners: 1,
        },
        "dataSrc": ""
      },
      "columns": [{
          "data": "id",
          "visible": false,
          "searchable": false
        },
        {
          "data": "titulo"
        },
        {
          "data": "descripcion"
        },
        {
          "data": "img",
          "width": "10%",
          "render": function(data) {
            return "<img src='../assets/img/" + data + "' height='75px'>";
          }
        },
        {
          "width": "8%",
          "defaultContent": "<div class='text-center'> <button class='btn btn-warning' title='Editar' type='button' id='editarBanner'><i class='fa fa-pencil'></i></button><button class='btn btn-danger' title='Eliminar' type='button' onclick='borrarBanner($(this))'><i class='fa fa-trash'></i></button></div>"
        }
      ],
      "pageLength": 15,
      "language": {
        "url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
      },

    });
  });

  function borrarBanner(element) {
    fila = element.closest("tr");
    var data = $('#datatable').DataTable().row(fila).data();
    idBanner = data['id'];
    if (confirm("¿Está seguro que desea eliminar el banner seleccionado?") == true) {
      $.post("controllers/bannerProductos.php", {
        eliminar: idBanner
      }, function(result) {
        if (!result) {
          window.alert('Ocurrio un error.');
          return;
        }
        if (result) {
          window.alert('Banner eliminado correctamente!');
          window.location.reload();
        }
      });
    }
  }

  $(document).on("click", "#agregarBanner", function() {
    $("#bannersModal").modal("show");
    $("#formBanners").trigger("reset");
  })

  $(document).on("click", "#editarBanner", function() {
    $("#bannersModal").modal("show");
    let row = $(this).closest("tr");
    var data = $('#datatable').DataTable().row(row).data();
    let id = data['id'];
    let titulo = row.find("td:nth-child(1)").text();
    let descripcion = row.find("td:nth-child(2)").text();
    $("#bannerId").val(id);
    $("#titulo").val(titulo.trim());
    $("#descripcion").val(descripcion.trim());
  })

  $(document).on("click", "#guardarBanner", function() {
    var fd = new FormData();
    var file1 = $('#img1')[0].files[0];
    var file2 = $('#img2')[0].files[0];
    let id = $("#bannerId").val() ?? null;
    let titulo = $("#titulo").val();
    let descripcion = $("#descripcion").val();

    if (!titulo || !descripcion) {
      alert("Complete todos los campos...");
      return;
    }

    if (!id && !file1 && !file2) {
      alert("Complete todos los campos...");
      return;
    }

    fd.append('img1', file1);
    fd.append('img2', file2);
    fd.append('bannerId', id);
    fd.append('titulo', titulo);
    fd.append('descripcion', descripcion);

    $.ajax({
      url: 'controllers/bannerProductos.php',
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
          window.alert('Banner guardado correctamente!');
          window.location.reload();
        }
      },
    });
  })
</script>