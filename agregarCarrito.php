<?php
session_start();
include_once('conexion.php');
if(isset($_SESSION['carrito'])){
  if(isset($_GET['id'])){
        $arreglo=$_SESSION['carrito'];
        $encontro=false;
        $numero=0;
        for($i=0;$i<count($arreglo);$i++){
          if($arreglo[$i]['Id']==$_GET['id']){
            $encontro=true;
            $numero=$i;
            break;
          }
        }
        if($encontro==true){
          $arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
          $_SESSION['carrito']=$arreglo;
        }else{
          $nombre="";
          $precio=0;
          $imagen="";
          $sql="select producto, precio_venta, imagen  from pv_producto p "
          . "inner join pv_imagen i on p.id_producto = i.id_producto where p.id_producto=".$_GET['id']."";
          $result = $conn->query($sql) or die("error: " . mysqli_error($conn));
                   while($row=$result->fetch_assoc()){
            $nombre=$row['producto'];
            $precio=$row['precio_venta'];
            $imagen=$row['imagen'];
          }
          $datosNuevos=array('Id'=>$_GET['id'],
                  'Nombre'=>$nombre,
                  'Precio'=>$precio,
                  'Imagen'=>$imagen,
                  'Cantidad'=>1);
          array_push($arreglo, $datosNuevos);
          $_SESSION['carrito']=$arreglo;
        }
  }
}else{
  if(isset($_GET['id'])){
    $nombre="";
    $precio=0;
    $imagen="";
    $sql="select producto, precio_venta, imagen  from pv_producto p "
    . "inner join pv_imagen i on p.id_producto = i.id_producto where p.id_producto=".$_GET['id']."";
    $result = $conn->query($sql) or die("error: " . mysqli_error($conn));
             while($row=$result->fetch_assoc()){
            $nombre=$row['producto'];
      $precio=$row['precio_venta'];
      $imagen=$row['imagen'];
    }
    $arreglo[]=array('Id'=>$_GET['id'],
            'Nombre'=>$nombre,
            'Precio'=>$precio,
            'Imagen'=>$imagen,
            'Cantidad'=>1);
    $_SESSION['carrito']=$arreglo;
  }
}
//var_dump($_SESSION['carrito']);
header("Location: carritodecompras.php");
 ?>
