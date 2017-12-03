<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login | E-Shopper</title>
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
$sql="select p.id_producto, producto, precio_venta, descripcion, imagen, precio_compra, id_categoria, id_provedor
from pv_producto p inner join pv_imagen i on p.id_producto = i.id_producto
where p.id_producto=".$idProducto;
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

        <div class="col-md-10">
          <div class="signup-form"><!--sign up form-->
            <h2>Actualizar Producto</h2>
            <form action="updateProducto.php" method="post" id="formA" enctype="multipart/form-data">
              <input type='text' style='display:none;' name='txtIdproducto' id='txtIdproducto'  value=<?php echo $idProducto?> />
               <input type='text' style='display:none;' name='txtimagen' id='txtimagen'  value=<?php echo $imagen?> />
              <div class="col-md-5">
              <input type="text" name="txtproducto"  class="form-control" placeholder="Nombre del producto" required="required" value=<?php echo $producto?> />
               <div class="input-group">
                 <span class="input-group-addon">$</span>
              <input type="text" name="txtPrecioCompra" class="form-control" placeholder="Precio Compra" required="required" value=<?php echo $precioCom?> />
            </div>
          </br>
            <div class="input-group">
                 <span class="input-group-addon">$</span>
              <input type="text" name="txtPrecioVenta" class="form-control" placeholder="Precio Venta" required="required" value=<?php echo $precioVenta?> />
            </div>
          </br>
            <div class="input-group" >
            <td>Imagen Guardada:</td>

            <?php echo "<img src='files/".$imagen."' style='width: 30%'>" ?>
            </div>
             </br>
            <div>
             <td>Modificar:</td>
            <td><input type="file" name="archivo" id="archivo"  size="35" accept="image/png, .jpeg, .jpg, image/gif" ><input type="hidden" name="action" value="upload" ></div>


            </div>
            <div class="col-md-5">

              <select name='comboCategoria' id='comboCategoria' required='required'  >
                  <option value='' selected="selected">Selecciona una Categoria</option>

                  <?php echo $resultado;?>
                  </select>
</br></br>
                   <select name='comboProvedor' id='comboProvedor' required='required'>
                  <option value=''>Selecciona una Provedor</option>

                  <?php echo $resultado2;?>
                  </select>


              </br></br>
             <textarea class="form-control" name="txtDescripcion" placeholder="Descripción" rows="5" required="required" ><?php echo $description?></textarea>

              </div>
              <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> ACTUALIZAR</button>



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
</body>
</html>
