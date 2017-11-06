<?php

 include_once('conexion.php');
$idProducto=$_POST['txtIdproducto'];
$producto=$_POST['txtproducto'];
$precioCompra=(float)$_POST['txtPrecioCompra'];
$precioVenta=(float)$_POST['txtPrecioVenta'];
$descripcion=$_POST['txtDescripcion'];
$idCategoria=(int)$_POST['comboCategoria'];
$idProvedor=(int)$_POST['comboProvedor'];


$sql = "CALL updateProducto('$producto', $precioCompra,$precioVenta, '$descripcion', $idCategoria,$idProvedor,$idProducto);";

$result = $conn->query($sql) or die("error: " . mysqli_error($conn));






header("Location: searchProducto.php");

?>
