<?php

 include_once('conexion.php');
$idProducto=$_GET['idProducto'];



$sql = "CALL deleteProducto($idProducto);";

$result = $conn->query($sql) or die("error: " . mysqli_error($conn));






header("Location: searchProducto.php");

?>