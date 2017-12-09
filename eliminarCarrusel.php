<?php
include_once('conexion.php');
$idImagen=$_GET['idImagen'];
$resultado="";
$sql="select id_imagen, imagen from pv_carrusel where id_imagen=".$idImagen;
$resulta = $conn->query($sql) or die("error: " . mysqli_error($conn));
while($row=$resulta->fetch_assoc()){
  $oldPath = getcwd() . "/images/carrusel/" . $row['imagen'];
  //echo $oldPath;
  unlink($oldPath);
}
$sql = "CALL spDelCarrusel($idImagen);";
$result = $conn->query($sql) or die("error: " . mysqli_error($conn));
header("Location: carrusel.php");
?>
