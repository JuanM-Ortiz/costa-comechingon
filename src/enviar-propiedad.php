<?php
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


function cumpleRequisitos($postData)
{
  return !empty($postData['nombre']) && !empty($postData['celular']) && !empty($postData['mensaje']) && !empty($postData['email']) && !empty($postData['ciudad']);
}

if ($_POST['nombre'] && cumpleRequisitos($_POST)) {
  $idPropiedad = $_POST['idPropiedad'];
  $nombre = htmlspecialchars($_POST['nombre']);
  $telefono = htmlspecialchars($_POST['celular']);
  $email = htmlspecialchars($_POST['email']);
  $ciudad = htmlspecialchars($_POST['ciudad']);
  $mensaje = htmlspecialchars($_POST['mensaje']);

  $asunto = "CONSULTA WEB de {$nombre} - {$asunto} ";

  $contenido = "{$nombre} ha realizado una consulta via web:<br>
    Telefono: {$telefono} <br>
    Email: {$email} <br>
    Mensaje: {$mensaje} <br>
    <b>Codigo de la propiedad: {$_POST['codigo']}</b>";

  try {

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->setLanguage('es');
    $mail->charSet = 'UTF-8';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Username = 'ayfdesarrollosinmobiliarios@gmail.com';
    $mail->Password = 'erku znal vlyo wbaf';
    $mail->Subject = $asunto;
    $mail->Body = $contenido;
    $mail->setFrom($email, $nombre);
    $mail->addReplyTo($email);
    $mail->addAddress('ayfdesarrollosinmobiliarios@gmail.com');
    $mail->isHTML(true);

    $mail->send();
    header("Location: ../detalle-propiedad.php?id=$idPropiedad&e=0");
  } catch (Exception $e) {
    header("Location: ../detalle-propiedad.php?id=$idPropiedad&e=1");
  }
} else {
  header("Location: ../detalle-propiedad.php?id=$idPropiedad&e=1");
}
