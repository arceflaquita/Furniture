<?php

include_once('conexion.php');

$arreglo=$_SESSION['carrito'];
$idUsuario=$_SESSION['id_cliente'];

$total=0;

for($i=0; $i<count($arreglo);$i++){
$total=($arreglo[$i]['Cantidad']*$arreglo[$i]['Precio'])+$total;
}
$sql = "CALL addVentaArticulo($total,$idUsuario);";
$result = $conn->query($sql) or die("error: " . mysqli_error($conn));

for($i=0; $i<count($arreglo);$i++){

$sql = "CALL addDestalleVenta(".$arreglo[$i]['Precio'].",".$arreglo[$i]['Cantidad'].",".$arreglo[$i]['Id'].");";
$result = $conn->query($sql) or die("error: " . mysqli_error($conn));
}

echo "<div class='col-md-8'><a class='btn btn-warning btn-sm' href='generarReportePdf.php' ><span class='glyphicon glyphicon-pencil'></span>Generar Comprobante</a></div>";


?>
