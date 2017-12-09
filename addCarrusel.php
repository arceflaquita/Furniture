<?php
include_once('conexion.php');
$id_prod=(int)$_POST['comboProducto'];
$imagen="";
if ($_POST['action'] == 'upload') {
    //Obtener datos del archivo
    $tamaño = $_FILES["archivo"]['size'];
    $tipo = $_FILES["archivo"]['type'];
    $archivo = $_FILES["archivo"]['name'];
    $prefijo = substr(md5(uniqid(rand())), 0, 6);
    if ($archivo != "") {
    //Guardamos el archivo en la carpeta files
        $destino = "images/carrusel/" . $prefijo . "_" . $archivo;
        if (copy($_FILES["archivo"]['tmp_name'], $destino)) {
        	$imagen= $prefijo . "_" . $archivo;
            $status = "Archivo subido: <b>". $archivo ."</b>";
        } else {
            $status="Error al subir el archivo";
        }
    }else{
       $imagen="sinImagen.jpg";
    }
}
$sql = "CALL spAddCarrusel('$imagen', $id_prod);";
$result = $conn->query($sql) or die("error: " . mysqli_error($conn));
header("Location: carrusel.php");
?>
