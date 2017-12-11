<?php
	session_start();
	include_once('conexion.php');
	//var_dump($_SESSION['carrito']);
?>
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
    <link href="css/estilos2.css" rel="stylesheet">

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
			<div class="col-md-12">
			<div class="producto">
			<h2>Carrito de compras</h2>
		<?php
			$total=0;
			if(isset($_SESSION['carrito'])){
			$datos=$_SESSION['carrito'];
			echo "<table class='table'>";
				echo "<tr>";
				echo "<th>Imagen</th>";
				echo "<th>Nombre producto</th>";
				echo "<th>Precio</th>";
				echo "<th>Cantidad</th>";
				echo "<th>Subtotal</th>";
				echo "<th>Eliminar</th>";
				echo "</tr>";
				for($i=0;$i<count($datos);$i++){
				?>
				<tr>
					<td><img src="./files/<?php echo $datos[$i]['Imagen'];?>" width="120px"></td>
					<td><span><?php echo $datos[$i]['Nombre'];?></span></td>
					<td><span>$ <?php echo $datos[$i]['Precio'];?></span></td>
					<td>
					<span>
						<input type="text" value="<?php echo $datos[$i]['Cantidad'];?>"
						data-precio="<?php echo $datos[$i]['Precio'];?>"
						data-id="<?php echo $datos[$i]['Id'];?>"
						class="form-control cantidad" width="20px">
					</span></td>
					<td><span class="subtotal">$ <?php echo $datos[$i]['Cantidad']*$datos[$i]['Precio'];?></span></td>
					<td><a href="#" class="eliminar" data-id="<?php echo $datos[$i]['Id']; ?>">Eliminar</a></td>
				</tr>
				<?php
					$total=($datos[$i]['Cantidad']*$datos[$i]['Precio'])+$total;
				}
				echo "</tr>";
				echo "</table>";
			}else{
				echo '<center><h2>No has añadido ningun producto</h2></center>';
			}
			echo '<center><h2 id="total">Total: $ '.$total.'</h2></center>';
			if($total!=0 ){
				if(isset($_SESSION['id_cliente'])){
					//echo '<center><a href="./compras/compras.php" class="aceptar">Comprar</a></center>';
			?>
				<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="formulario">
					<input type="hidden" name="cmd" value="_cart">
					<input type="hidden" name="upload" value="1">
					<input type="hidden" name="business" value="furniture_test@gmail.com">
					<input type="hidden" name="currency_code" value="MXN">
					<!--
					<input type="hidden" name="return" value="http://localhost/Furniture/ipn_success.php">
					<input type="hidden" name="cancel_return" value="http://localhost/Furniture/ipn_error.php">
				  -->

					<input type="hidden" name="return" value="http://alfaweb.com.mx/planes/alumndb2/Furniture/ipn_success.php">
          <input type="hidden" name="cancel_return" value="http://alfaweb.com.mx/planes/alumndb2/Furniture/ipn_error.php">

					<?php
						for($i=0;$i<count($datos);$i++){
					?>
						<input type="hidden" name="item_name_<?php echo $i+1;?>" value="<?php echo $datos[$i]['Nombre'];?>">
						<input type="hidden" name="amount_<?php echo $i+1;?>" value="<?php echo $datos[$i]['Precio'];?>">
						<input	type="hidden" name="quantity_<?php echo $i+1;?>" value="<?php echo $datos[$i]['Cantidad'];?>">
					<?php
						}
					?>
					<center><input type="submit" value="comprar" class="aceptar" style="width:200px"></center>
				</br>
			</form>
			<?php
			}else{
				echo '<center><h5><a href="login.php">Inicie sesion </a>para continuar con su compra.</h5></center>';
			}
		}
		?>
		<center><a href="./">Ver catalogo</a></center>
	</br>
	</div>
	</div>
	</div>
	</section>
  <footer id="footer"><!--Footer-->
    <?php include_once('footer.php'); ?>
  </footer><!--/Footer-->
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
  <script src="scripts.js"></script>
  <script src="js/jquery.js"></script>
  <script src="js/price-range.js"></script>
  <script src="js/jquery.scrollUp.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.prettyPhoto.js"></script>
  <script src="js/main.js"></script>
	<script src="js/index.js"></script>
</body>
</html>
