<?php
session_start(); 
include_once('conexion.php');
$arreglo=$_SESSION['carrito'];
$idUsuario=$_SESSION['id_cliente'];
$total=0;
for($i=0; $i<count($arreglo);$i++){
  $total=($arreglo[$i]['Cantidad']*$arreglo[$i]['Precio'])+$total;
}
//$sql = "CALL addVentaArticulo($total,$idUsuario);";
$sql = "INSERT INTO pv_venta(feha, monto, id_cliente, id_proceso) VALUES (curdate(),$total,$idUsuario,1)";
$result = $conn->query($sql) or die("error: " . mysqli_error($conn));

$sql = "Select max(folio) as folio from pv_venta;";
$result = $conn->query($sql) or die("error: " . mysqli_error($conn));
$row = mysqli_fetch_array($result);
$folio = $row['folio'];
for($i=0; $i<count($arreglo);$i++){
  //$sql = "CALL addDestalleVenta(".$arreglo[$i]['Precio'].",".$arreglo[$i]['Cantidad'].",".$arreglo[$i]['Id'].");";
  $sql = "INSERT INTO pv_detalle_venta( fecha, precio_venta, cantidad, folio, id_producto)
  VALUES (curdate(),".$arreglo[$i]['Precio'].",".$arreglo[$i]['Cantidad'].", " . $folio . ",".$arreglo[$i]['Id'].");";
  $result = $conn->query($sql) or die("error: " . mysqli_error($conn));
}
header("Location: generarReportePdf.php?folio=" . $folio);
//echo "<div class='col-md-8'><a class='btn btn-warning btn-sm' href='generarReportePdf.php' ><span class='glyphicon glyphicon-pencil'></span>Generar Comprobante</a></div>";
?>
