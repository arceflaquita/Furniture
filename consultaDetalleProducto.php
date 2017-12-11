<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login | Furniture</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/furniture.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>

  <?php
include_once('conexion.php');
$idProducto=$_GET['idProducto'];
$producto="";
$precioCom="";
$precioVenta="";
$description="";
$idCategoria="";
$idProvedor="";
$imagen="";
$sql="select producto, precio_compra, precio_venta, descripcion, id_categoria, id_provedor, imagen  from pv_producto p "
. "inner join pv_imagen i on p.id_producto = i.id_producto where p.id_producto=". $idProducto ."";
$result = $conn->query($sql) or die("error: " . mysqli_error($conn));
while($row=$result->fetch_assoc()){
  $producto=$row['producto'];
  $precioCom=$row['precio_compra'];
  $precioVenta=$row['precio_venta'];
  $description=$row['descripcion'];
  $idCategoria=$row['id_categoria'];
  $idProvedor=$row['id_provedor'];
  $imagen=$row['imagen'];
}
$resultado="";

$sql="select * from pv_categoria";
$resulta = $conn->query($sql) or die("error: " . mysqli_error($conn));
while($row=$resulta->fetch_assoc()){
  if($idCategoria=$row['id_categoria']){
    $resultado.=" <option value='".$row['id_categoria']."' selected>".$row['categoria']."</option>";
  }else{
   $resultado.=" <option value='".$row['id_categoria']."' >".$row['categoria']."</option>";
  }
}
$resultado2="";
$sql="select * from pv_provedor";
$resulte = $conn->query($sql) or die("error: " . mysqli_error($conn));
while($row=$resulte->fetch_assoc()){
 if($idProvedor=$row['id_provedor']){
    $resultado2.=" <option value='".$row['id_provedor']."' selected>".$row['provedor']."</option>";
  }else{
    $resultado2.=" <option value='".$row['id_provedor']."' >".$row['provedor']."</option>";
  }
}
?>
  <header id="header"><!--header-->
    <?php include_once('header.php'); ?>
  </header><!--/header-->
  <section id="form"><!--form-->
    <div class="container">
      <div class="header-top"><!--header-bottom-->
        <div class="container">
          <div class="row">
            <div class="col-sm-9">
              <div class="mainmenu" id="mainmenu">
              </div>
            </div>
          </div>
        </div>
      </div><!--/header-bottom-->
      <div id="search">
      </div>

        <div class="col-md-12">
          <div class="signup-form"><!--sign up form-->
            <h2>Detalle del Producto</h2>
            <form action="updateProducto.php" method="post" id="formA" enctype="multipart/form-data">
              <input type='text' style='display:none;' name='txtIdproducto' id='txtIdproducto'  value=<?php echo $idProducto?> />
            <div class="col-md-7" >
            <?php echo "<img src='files/".$imagen."' style='width: 100%;'>" ?>
            </div>
             </br>
            <div class="col-md-4">
             <h2><?php echo 'Nombre del Producto: '.$producto ?></h2>
             <h2><?php echo 'Descripción: '.$description ?></h2>
             <h2><?php echo 'Precio: $'.$precioVenta ?></h2>
              </div>
              <a class="btn btn-warning btn-sm" href="agregarCarrito.php?id=<?php echo $idProducto?>" ><span class="glyphicon glyphicon-plus-sign"></span><?php echo utf8_decode(' AÃ±adir a la Cesta') ?></a>
            </form>
          </div><!--/sign up form-->
        </div>
    </div>
  </section><!--/form-->

  <footer id="footer"><!--Footer-->
    <?php include_once('footer.php'); ?>
  </footer><!--/Footer-->

  <script src="js/jquery.js"></script>
  <script src="js/price-range.js"></script>
  <script src="js/jquery.scrollUp.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.prettyPhoto.js"></script>
  <script src="js/main.js"></script>
  <script src="js/index.js"></script>
</body>
</html>
