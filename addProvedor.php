<?php

include_once('conexion.php');
$provedor=$_POST['txtProvedor'];
$contacto=$_POST['txtContacto'];
$telefono=$_POST['txtTelefono'];
$correo=$_POST['txtCorreo'];
$calle=$_POST['txtCalle'];
$numExterior=$_POST['txtNumExterior'];
$numInterior=$_POST['txtNumInterior'];
$estado=$_POST['estado'];
$municipio=$_POST['municipio'];
$colonia=$_POST['colonia'];
$codigoPostal=$_POST['codigoPostal'];

$sql = "CALL addProvedor('$provedor','$contacto','$telefono','$correo','$calle',$numExterior,$numInterior,$estado,$municipio,'$colonia',$codigoPostal);";

$result = $conn->query($sql) or die("error: " . mysqli_error($conn));

header("Location: searchProvedor.php");

?>
