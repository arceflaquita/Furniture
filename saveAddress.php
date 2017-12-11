<?php
session_start();
include_once('conexion.php');
$email = $_SESSION['email'];
$nombre_contacto = $_POST['txtnombre_contacto'];
$calle = $_POST['txtcalle'];
$numero_exterior = $_POST['txtnumero_exterior'];
$numero_interior = $_POST['txtnumero_interior'];
$colonia = $_POST['txtcolonia'];
$entre_calles = $_POST['txtentre_calles'];
$referencias = $_POST['txtreferencias'];
$codigo_postal = $_POST['txtcodigo_postal'];
$telefono = $_POST['txttelefono'];
$estado = (int)$_POST['estado'];
$municipio = (int)$_POST['municipio'];

$sql = "CALL spSaveAddress ('" . $email ."', '" . $nombre_contacto."', '" .
  $calle."', '" . $numero_exterior."', '" . $numero_interior."', '" .
  $colonia."', '" . $entre_calles."', '" . $referencias."', " .
  $codigo_postal.", " . $telefono.", $estado, $municipio);";
//echo $sql;
$result = $conn->query($sql) or die ("Error: " . mysqli_error($conn));
//var_dump($result);
header("location:profileCustomer.php");
return;
?>
