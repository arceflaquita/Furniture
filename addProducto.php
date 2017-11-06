<?php

 include_once('conexion.php');
$producto=$_POST['txtproducto'];
$precioCompra=(float)$_POST['txtPrecioCompra'];
$precioVenta=(float)$_POST['txtPrecioVenta'];
$descripcion=$_POST['txtDescripcion'];
$idCategoria=(int)$_POST['comboCategoria'];
$idProvedor=(int)$_POST['comboProvedor'];


$sql = "CALL addArticulo('$producto', $precioCompra,$precioVenta, '$descripcion', $idCategoria,$idProvedor);";

$result = $conn->query($sql) or die("error: " . mysqli_error($conn));






header("Location: index.php");

?>
