<?php

 include_once('conexion.php');
$idProducto=$_GET['idProducto'];


$resultado="";
              
              $sql="select * from pv_imagen where id_producto=".$idProducto;
            $resulta = $conn->query($sql) or die("error: " . mysqli_error($conn));
            while($row=$resulta->fetch_assoc()){
             unlink("files/".$row['imagen']."");
            } 



$sql = "CALL deleteProducto($idProducto);";

$result = $conn->query($sql) or die("error: " . mysqli_error($conn));







header("Location: searchProducto.php");

?>