<?php
include_once('conexion.php');
$idProducto=$_POST['txtIdproducto'];
$producto=$_POST['txtproducto'];
$precioCompra=(float)$_POST['txtPrecioCompra'];
$precioVenta=(float)$_POST['txtPrecioVenta'];
$descripcion=$_POST['txtDescripcion'];
$idCategoria=(int)$_POST['comboCategoria'];
$idProvedor=(int)$_POST['comboProvedor'];
$imagen="";
if ($_POST['action'] == 'upload') {
  //Obtener datos del archivo
  $tamaño = $_FILES["archivo"]['size'];
  $tipo = $_FILES["archivo"]['type'];
  $archivo = $_FILES["archivo"]['name'];
  $prefijo = substr(md5(uniqid(rand())), 0, 6);
  if ($archivo != "") {
  //Guardamos el archivo en la carpeta files
    $destino = "files/" . $prefijo . "_" . $archivo;
    if (copy($_FILES["archivo"]['tmp_name'], $destino)) {

    	$imagen= $prefijo . "_" . $archivo;
        $status = "Archivo subido: <b>". $archivo ."</b>";
        unlink("files/".$_POST['txtimagen']."");
    } else {
        $status="Error al subir el archivo";
    }
  }else{
    $imagen=$_POST['txtimagen'];
  }
}
$sql = "CALL updateProducto('$producto', $precioCompra,$precioVenta, '$descripcion', $idCategoria,$idProvedor,$idProducto,'$imagen');";
$result = $conn->query($sql) or die("error: " . mysqli_error($conn));
header("Location: searchProducto.php");
?>
