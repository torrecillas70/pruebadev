<?php
require_once('db.php');

$nombre = $_POST['nombre'];
$alias = $_POST['alias'];
$rut = $_POST['rut'];
$email = $_POST['email'];
$region = $_POST['region'];
$comuna = $_POST['comuna'];
$comoSeEntero = $_POST['comoSeEntero'];
if(isset($_POST['web'])) $web = 1; else $web = 0;
if(isset($_POST['tv'])) $tv = 1; else $tv = 0;
if(isset($_POST['redes'])) $redes = 1; else $redes = 0;
if(isset($_POST['amigo'])) $amigo = 1; else $amigo = 0;

if(empty($nombre) || empty($alias) || empty($rut) || empty($email) || empty($region) || empty($comuna) || empty($comoSeEntero)) {
  echo "Por favor, complete todos los campos obligatorios.";
} else {

  $query = "INSERT INTO votos (nombre, alias, rut, email, region, comuna, como_se_entero, web, tv, redes_sociales, amigo) VALUES ('$nombre', '$apellido', '$region', '$comoSeEntero', '$web', '$tv', '$redes', '$amigo')";
  $result = mysqli_query($con, $query);
  
  if($result) {
    echo "Gracias por votar!";
  } else {
    echo "Error al guardar los datos. Por favor, intente de nuevo.";
  }
}

mysqli_close($con);
?>