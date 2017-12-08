<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Furniture</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
  	<link href="css/main.css" rel="stylesheet">
  	<link href="css/responsive.css" rel="stylesheet">

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
	<header id="header"><!--header-->
    <?php include_once('header.php'); ?>
	</header><!--/header-->

	<section id="slider"><!--slider-->

	</section><!--/slider-->

	<section>
		<div id="container" class="container" style="background:white; border-radius:15px;">
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

      <?php include_once('slider.php'); ?>
			<div class="row">
				<div id="slider" class="col-3" style="margin-top: 5px;">
					<div class="left-sidebar">
						<h2>Especiales</h2>
            <div class="panel-group category-products" id="accordian">
						<?php
					 include_once('conexion.php');
             $producto="";
            $precioCom="";
            $precioVenta="";
            $description="";
            $idCategoria="";
            $idProvedor="";
            $imagen="";
            $contador=0;
            $sql="CALL searchProductos();";
            $result = $conn->query($sql) or die("error: " . mysqli_error($conn));
            while($row=$result->fetch_assoc()){
            echo "<div class='panel panel-default'>
                  <div class='img-special1'><a href='consultaDatellaProducto.php?idProducto=".$row['id_producto']."'><img class='img-special' src='files/".$row['imagen']."' alt=''  /></a></div>
                  <div class='details-spe'>
                    <a class='' style='color:orange;' href='consultaDatellaProducto.php?idProducto=".$row['id_producto']."'>".$row['producto']."</a>
                    </br>
                    <label id='precio'>$".$row['precio_venta']."</label>
                  </div>
							</div>";
            }
            ?>
						</div><!--/category-products-->
					</div>
				</div>

				<div id="products" class="padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Nuevos Productos en Diciembre</h2>
            <hr style="color: red; border-top: 3px solid #eee;">
					  <?php
            mysqli_data_seek($result,0);
            while($row=$result->fetch_assoc()){
            echo "<div class='col-sm-4'>
							<div class='product-image-wrapper'>
								<div class='single-products'>
										<div class='productinfo text-center'>
											<img src='files/".$row['imagen']."' style='height: 139px;'  />
											<h2>$".$row['precio_venta']."</h2>
											<p>".$row['producto']."</p>
                      <p style='color:gray;'>".$row['descripcion']."</p>
										</div>
										<div class='product-overlay'>
											<div class='overlay-content'>
												<h2>$".$row['precio_venta']."</h2>
												<p>".$row['producto']."</p>
											</div>
										</div>
								</div>
								<div class='choose'>
									<ul class='nav nav-pills nav-justified'>
                    <li class='añadir'><a href='carritodecompras.php?id=".$row['id_producto']."' style='color:white;'>Añadir a la Cesta</a></li>
										<li class='detalles'><a href='consultaDatellaProducto.php?idProducto=".$row['id_producto']."' style='color:black;'></i>Detalles</a></li>
									</ul>
								</div>
							</div>
						</div>";
            }
            if($result) mysqli_free_result($result);
            ?>
					</div><!--features_items-->

				</div>
			</div>
		</div>
	</section>

	<footer id="footer"><!--Footer-->

    <?php include_once('footer.php'); ?>

	</footer><!--/Footer-->

  <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
  <script src="js/jquery.prettyPhoto.js"></script>
  <script src="js/main.js"></script>
  <script src="js/index.js"></script>
</body>
</html>
